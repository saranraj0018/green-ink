<section class="my-container my-10 space-y-3">
    <h2 class="text-2xl text-center text-primary font-medium">
        OUR EVENTS
    </h2>
    <p class="text-lg text-center">
        Explore the latest insights and trends in education
    </p>

    <div class="grid grid-cols-12 gap-3">
        @foreach ($events as $index => $event)
            <div class="col-span-12 md:col-span-4 p-3 md:p-5 rounded-3xl shadow space-y-3 border border-gray-300"
                data-event-index="{{ $index }}">

                <h2 class="text-[16px] font-medium">
                    {{ $event->title }}
                </h2>

                <p class="text-gray-600 text-sm">
                    {{ $event->description }}
                </p>

                <hr class="text-zinc-300">

                <div class="flex flex-wrap gap-2">
                    <div class="flex gap-2">
                        <span class="my-auto dateIcon"></span>
                        <div class="text-[11px] font-medium text-gray-600">
                            {{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <span class="my-auto timeIcon"></span>
                        <div class="text-[11px] font-medium text-gray-600">
                            {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                            -
                            {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                        </div>
                    </div>
                </div>

                <div class="text-sm text-gray-600">
                    Mode: {{ ucfirst($event->mode) }}
                </div>

                <button
                    class="register-btn w-full px-4 py-2 text-white rounded-full text-sm"
                    style="background: linear-gradient(180deg, #009468 0%, #1B4D3E 100%);"
                    data-event-index="{{ $index }}">
                    Register Now
                </button>
            </div>
        @endforeach
    </div>

    <!-- Registration Modals -->
    @foreach ($events as $index => $event)
        <div id="registerModal{{ $index }}"
            class="fixed inset-0 hidden flex items-center justify-center z-1000 p-4 bg-black/50">

            <div
                class="bg-white rounded-2xl p-4 md:p-8 max-w-md w-full max-h-[90vh] overflow-y-auto border border-gray-300">

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

<script>
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
        const registerButtons = document.querySelectorAll('.register-btn');
        registerButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                const eventIndex = e.currentTarget.getAttribute('data-event-index');
                const modal = document.getElementById(`registerModal${eventIndex}`);
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent background scroll
            });
        });

        // Close modals
        document.querySelectorAll('.close-modal, .fixed.inset-0').forEach(closeBtn => {
            closeBtn.addEventListener('click', (e) => {
                if (e.target.classList.contains('close-modal') || e.target.classList.contains(
                        'fixed')) {
                    document.querySelectorAll('[id^="registerModal"]').forEach(modal => {
                        modal.classList.add('hidden');
                    });
                    document.body.style.overflow = 'auto';
                }
            });
        });

        // Form submissions
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
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .content
                },
                body: formData
            });

            const result = await response.json();

            // ❌ Duplicate case
            if (!result.success) {
                messageEl.className =
                    'mt-4 p-3 rounded-lg text-center bg-yellow-100 text-yellow-800';
                messageEl.innerHTML = result.message;
                messageEl.classList.remove('hidden');
                return;
            }

            // ✅ Success
            messageEl.className =
                'mt-4 p-3 rounded-lg text-center bg-green-100 text-green-800';
            messageEl.innerHTML = '✅ Registration successful!';
            messageEl.classList.remove('hidden');

            form.reset();

            // 🔥 Auto close modal after 1.5 sec
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

        // Close modal on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.querySelectorAll('[id^="registerModal"]').forEach(modal => {
                    modal.classList.add('hidden');
                });
                document.body.style.overflow = 'auto';
            }
        });
    });
</script>
