<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="my-container my-10 space-y-3">
    <h2 class="text-2xl text-center text-primary font-medium">
        OUR EVENTS
    </h2>
    <p class="text-lg text-center">
        Explore the latest insights and trends in education
    </p>

   <div class="grid grid-cols-12 gap-4 mt-6">
@foreach ($events as $index => $event)

    <div class="col-span-12 md:col-span-4 lg:col-span-3">
        <div class="rounded-xl shadow hover:shadow-lg transition overflow-hidden bg-white">

            <!-- EVENT IMAGE -->
            <img
                src="{{ $event->image
                        ? asset('storage/'.$event->image)
                        : asset('images/event-placeholder.jpg') }}"
                alt="{{ $event->title }}"
                class="w-full h-48 object-cover">

            <!-- EVENT CONTENT -->
            <div class="p-3 md:p-4 space-y-2 bg-[#f4f4f4]">

                <!-- TITLE -->
                <h3 class="font-semibold text-sm md:text-lg line-clamp-1">
                    {{ $event->title }}
                </h3>

                <!-- DESCRIPTION -->
                <p class="text-xs md:text-sm text-gray-600 line-clamp-2">
                    {{ $event->description }}
                </p>

                <!-- DATE + TIME -->
                <div class="flex flex-wrap gap-3 text-[11px] text-gray-600 mt-2">

                    <div class="flex items-center gap-1">
                        <span class="dateIcon"></span>
                        {{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}
                    </div>

                    <div class="flex items-center gap-1">
                        <span class="timeIcon"></span>
                        {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                        –
                        {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                    </div>

                </div>

                <!-- MODE -->
                <div class="text-xs text-gray-600">
                    Mode: <span class="font-medium">{{ ucfirst($event->mode) }}</span>
                </div>

                <!-- PRICE -->
                <div class="text-sm font-semibold mt-1">
                    @if ($event->fee_type === 'free')
                        <span class="text-green-600">Free Event</span>
                    @else
                        <span class="text-red-600">Paid Event
                            ₹{{ number_format($event->amount, 2) }}
                        </span>
                    @endif
                </div>

                <!-- REGISTER BUTTON -->
                <button
                    class="register-btn mt-3 w-full text-white py-1.5 rounded-full text-xs md:text-sm transition"
                    style="background: linear-gradient(180deg, #009468 0%, #1B4D3E 100%);"
                    data-event-id="{{ $event->id }}"
                    data-fee-type="{{ $event->fee_type }}"
                    data-event-index="{{ $index }}"
                >
                    Register Now
                </button>

            </div>
        </div>
    </div>

@endforeach
</div>


    <!-- Registration Modals -->
    @foreach ($events as $index => $event)
        <div id="registerModal{{ $index }}"
            class="fixed inset-0 hidden flex justify-center items-start z-50 bg-black/50 overflow-y-auto">

            <div
                class="bg-white rounded-2xl p-4 md:p-8 max-w-md w-full mt-20 mb-10 max-h-[90vh] overflow-y-auto border border-gray-300">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg md:text-2xl font-bold">
                        {{ $event->title }}
                    </h3>
                    <button class="close-modal text-2xl text-gray-500">&times;</button>
                </div>

                <div class="space-y-3 mb-6">
                    <span class="text-sm font-medium">
                        {{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}
                    </span>,
                    <span class="text-sm font-medium">
                        {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                        -
                        {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                    </span>

                    <div>
                        <strong>Mode:</strong> {{ ucfirst($event->mode) }}
                    </div>
                    <div class="text-sm font-medium">
                        @if ($event->fee_type === 'free')
                            <span class="text-green-600">🎉 Free Event</span>
                        @else
                            <span class="text-red-600">
                                💰 Paid Event — ₹{{ number_format($event->amount, 2) }}
                            </span>
                        @endif
                    </div>
                </div>

                <form id="registerForm{{ $index }}" class="space-y-4">
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" name="event_index" value="{{ $index }}">
                    <div>
                        <label class="block text-sm font-medium mb-2">Full Name</label>
                        <input type="text" name="name" required
                            class="w-full p-2 border border-gray-300 rounded-lg text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Email Address</label>
                        <input type="email" name="email" required
                            class="w-full p-2 border border-gray-300 rounded-lg text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-2">Phone Number</label>
                        <input type="tel" name="phone" required
                            class="w-full p-2 border border-gray-300 rounded-lg text-sm">
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-b from-[#009468] to-[#1B4D3E] text-white py-2 rounded-full">
                        Register Now
                    </button>
                </form>

                <div id="formMessage{{ $index }}" class="mt-4 hidden p-3 rounded-lg text-center"></div>
            </div>
        </div>
    @endforeach

    <!-- Paid Event Payment Modal -->
    <div id="paymentModal" class="fixed inset-0 hidden bg-[#0000008f] items-center justify-center z-50">
        <div class="bg-white w-96 p-6 rounded-xl space-y-4">
            <h2 class="text-lg font-semibold text-center">Enter Your Details</h2>

            <div>
                <label class="text-sm">Full Name</label>
                <input id="pay_name" name="pay_name" class="w-full border rounded px-3 py-2">
                <p class="text-red-500 text-xs mt-1 nameError"></p>
            </div>
            <div>
                <label class="text-sm">Email</label>
                <input id="pay_email" type="email" class="w-full border rounded px-3 py-2">
                <p class="text-red-500 text-xs mt-1 emailError"></p>
            </div>
            <div>
                <label class="text-sm">Phone</label>
                <input id="pay_phone" class="w-full border rounded px-3 py-2">
                <p class="text-red-500 text-xs mt-1 mobileError"></p>
            </div>

            <div class="flex gap-3 pt-3">
                <button id="closeModal" class="w-1/2 border py-2 rounded">Cancel</button>
                <button id="confirmPay" class="w-1/2 bg-[#FFB100] text-white py-2 rounded">Pay Now</button>
            </div>
        </div>
    </div>

    <!-- Hidden Cashfree form -->
    <form id="cashfreeForm" action="{{ route('cashfree.payment') }}" method="POST" class="hidden">
        @csrf
        <input type="hidden" name="event_id" id="cf_event_id">
        <input type="hidden" name="name" id="cf_name">
        <input type="hidden" name="email" id="cf_email">
        <input type="hidden" name="phone" id="cf_phone">
    </form>

    <div class="p-5 md:p-10 rounded-3xl my-10 space-y-3"
        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.20) 0%, rgba(0, 0, 0, 0.20) 100%), linear-gradient(83deg, #009468 1.56%, #1B4D3E 91.85%);">
        <h2 class="text-xl md:text-4xl font-medium text-white text-center">
            Join Our Reading Community
        </h2>
        <p class="text-sm md:text-lg text-center text-white">
            Subscribe to our newsletter for exclusive book recommendations,<br> author interviews, and special offers
            delivered to your inbox.
        </p>
        <form class="flex flex-col md:flex-row gap-2 justify-center mt-5 md:mt-10">
            <input type="email" class="w-full md:w-1/3 p-2 text-sm rounded-lg bg-white"
                placeholder="Enter your email" />
            <input type="submit" class="p-2 text-sm rounded-lg bg-[#FAE0BF] px-10" value="Submit" />
        </form>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function closeAllModals() {
        document.querySelectorAll('[id^="registerModal"], #paymentModal')
            .forEach(modal => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });

        document.body.style.overflow = 'auto';
    }
    document.addEventListener("DOMContentLoaded", () => {
        // Icons setup
        const dateIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22 22" fill="none">
       <rect x="3" y="4" width="18" height="18" rx="2" ry="2" stroke="#6B7280" stroke-width="2"/>
        <line x1="16" y1="2" x2="16" y2="6" stroke="#6B7280" stroke-width="2"/>
        <line x1="8" y1="2" x2="8" y2="6" stroke="#6B7280" stroke-width="2"/>
        <line x1="3" y1="10" x2="21" y2="10" stroke="#6B7280" stroke-width="2"/>
    </svg>`;

        const timeIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22 22" fill="none">
      <circle cx="12" cy="12" r="9" stroke="#6B7280" stroke-width="2"/>
        <line x1="12" y1="7" x2="12" y2="12" stroke="#6B7280" stroke-width="2"/>
        <line x1="12" y1="12" x2="16" y2="14" stroke="#6B7280" stroke-width="2"/>
    </svg>`;

        // Add icons to all elements
        document.querySelectorAll('.dateIcon').forEach(el => el.innerHTML = dateIcon);
        document.querySelectorAll('.timeIcon').forEach(el => el.innerHTML = timeIcon);

        // Modal functionality
        document.querySelectorAll('.register-btn').forEach(button => {
            button.addEventListener('click', () => {

                closeAllModals(); // always close others first

                const eventIndex = button.dataset.eventIndex;
                const feeType = button.dataset.feeType;
                const eventId = button.dataset.eventId;

                if (feeType === 'free') {
                    const modal = document.getElementById(`registerModal${eventIndex}`);
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                } else {
                    const modal = document.getElementById('paymentModal');
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');

                    $('#cf_event_id, #pay_name, #pay_email, #pay_phone').val('');
                    $('#cf_event_id').val(eventId);
                }

                document.body.style.overflow = 'hidden';
            });
        });

        // Close modals
        document.querySelectorAll('.close-modal, #closeModal').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('[id^="registerModal"], #paymentModal').forEach(
                    modal => {
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                    });
                document.body.style.overflow = 'auto';
            });
        });

        // Free registration form submission
        document.querySelectorAll('[id^="registerForm"]').forEach(form => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(form);
                const eventIndex = formData.get('event_index');
                const messageEl = document.getElementById(`formMessage${eventIndex}`);
                const modal = document.getElementById(`registerModal${eventIndex}`);
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;

                submitBtn.innerHTML = 'Registering...';
                submitBtn.disabled = true;

                try {
                    const response = await fetch("{{ route('event.register') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]').content
                        },
                        body: formData
                    });
                    const result = await response.json();
                    if (!result.success) {
                        messageEl.className =
                            'mt-4 p-3 rounded-lg text-center bg-yellow-100 text-yellow-800';
                        messageEl.innerHTML = result.message;
                        messageEl.classList.remove('hidden');
                        return;
                    }
                    messageEl.className =
                        'mt-4 p-3 rounded-lg text-center bg-green-100 text-green-800';
                    messageEl.innerHTML = '✅ Registration successful!';
                    messageEl.classList.remove('hidden');
                    form.reset();
                    setTimeout(() => {
                        modal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }, 1500);
                } catch (error) {
                    messageEl.className =
                        'mt-4 p-3 rounded-lg text-center bg-red-100 text-red-800';
                    messageEl.innerHTML = '❌ Something went wrong';
                    messageEl.classList.remove('hidden');
                } finally {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    setTimeout(() => {
                        messageEl.classList.add('hidden');
                    }, 4000);
                }
            });
        });

        // Paid payment form
        $('#confirmPay').on('click', function() {
            $('.nameError, .emailError, .mobileError').text('');
            const name = $('#pay_name').val().trim();
            const email = $('#pay_email').val().trim();
            const phone = $('#pay_phone').val().trim();
            let hasError = false;

            if (!name) {
                $('.nameError').text('Name is required');
                hasError = true;
            }
            if (!email || !/^\S+@\S+\.\S+$/.test(email)) {
                $('.emailError').text('Valid email required');
                hasError = true;
            }
            if (!phone || !/^\d{10}$/.test(phone)) {
                $('.mobileError').text('Valid 10-digit phone');
                hasError = true;
            }
            if (hasError) return;

            $('#cf_name').val(name);
            $('#cf_email').val(email);
            $('#cf_phone').val(phone);
            $('#cashfreeForm').submit();
        });

        // Close modal on Escape
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                document.querySelectorAll('[id^="registerModal"], #paymentModal').forEach(modal => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
                document.body.style.overflow = 'auto';
            }
        });

    });
</script>
