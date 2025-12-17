@php
    $data = [
        [
            'title' => 'UPSC Master Strategy Workshop 2025 - 2026',
            'description' =>
                'Learn advanced study strategies, answer-writing skills, and scoring techniques for UPSC CSE.',
            'date' => '18 December 2025',
            'time' => '10:00 AM - 1:00 PM',
            'mode' => 'Offline (Main Campus Hall)',
            'RegisterLink' => '#',
        ],
        [
            'title' => 'CSAT Intensive Crash Course',
            'description' => 'Master quantitative aptitude, reasoning, and comprehension for UPSC Prelims CSAT paper.',
            'date' => '22 December 2025',
            'time' => '9:00 AM - 4:00 PM',
            'mode' => 'Online (Zoom)',
            'RegisterLink' => '#',
        ],
        [
            'title' => 'Current Affairs Mega Revision 2025',
            'description' =>
                'Complete coverage of national & international events from Jan-Dec 2025 with MCQ practice.',
            'date' => '28 December 2025',
            'time' => '2:00 PM - 6:00 PM',
            'mode' => 'Hybrid (Campus + Live Stream)',
            'RegisterLink' => '#',
        ],
    ];
@endphp

<section class="my-container my-10 space-y-3">
    <h2 class="text-2xl text-center text-primary font-medium">
        OUR EVENTS
    </h2>
    <p class="text-lg text-center">
        Explore the latest insights and trends in education
    </p>

    <div class="grid grid-cols-12 gap-3">
        @foreach ($data as $index => $item)
            <div class="col-span-12 md:col-span-4 p-3 md:p-5 rounded-3xl shadow space-y-3 border border-gray-300"
                data-event-index="{{ $index }}">
                <h2 class="text-[16px] font-medium">{{ $item['title'] }}</h2>
                <p class="text-gray-600 text-sm">{{ $item['description'] }}</p>
                <hr class="text-zinc-300">
                <div class="flex flex-wrap gap-2">
                    <div class="flex gap-2">
                        <span class="my-auto dateIcon"></span>
                        <div class="text-[11px] font-medium text-gray-600">{{ $item['date'] }}</div>
                    </div>
                    <div class="flex gap-2">
                        <span class="my-auto timeIcon"></span>
                        <div class="text-[11px] font-medium text-gray-600">{{ $item['time'] }}</div>
                    </div>
                </div>
                <div class="text-sm text-gray-600">Mode: {{ $item['mode'] }}</div>
                <button
                    class="register-btn w-full px-4 py-2 text-white rounded-full hover:bg-green-700 transition text-sm block text-center"
                    style="background: linear-gradient(180deg, #009468 0%, #1B4D3E 100%);"
                    data-event-index="{{ $index }}">
                    Register Now
                </button>
            </div>
        @endforeach
    </div>

    <!-- Registration Modals -->
    @foreach ($data as $index => $item)
        <div id="registerModal{{ $index }}"
            class="fixed inset-0 hidden flex items-center justify-center z-1000 p-4 bg-black/50">
            <div
                class="bg-white rounded-2xl p-4 md:p-8 max-w-md w-full max-h-[90vh] overflow-y-auto border border-gray-300">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg md:text-2xl font-bold">{{ $item['title'] }}</h3>
                    <button class="close-modal text-2xl text-gray-500 hover:text-gray-700">&times;</button>
                </div>
                <div class="space-y-3 mb-6">
                    <span class="text-sm font-medium">{{ $item['date'] }}</span>,
                    <span class="text-sm font-medium">{{ $item['time'] }}</span>
                    <div><strong>Mode:</strong> {{ $item['mode'] }}</div>
                </div>
                <form id="registerForm{{ $index }}" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">Full Name</label>
                        <input type="text" name="name" required
                            class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                            placeholder="Enter your full name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Email Address</label>
                        <input type="email" name="email" required
                            class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                            placeholder="Enter your email">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Phone Number</label>
                        <input type="tel" name="phone" required
                            class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                            placeholder="Enter your phone number">
                    </div>
                    <input type="hidden" name="event_title" value="{{ $item['title'] }}">
                    <input type="hidden" name="event_index" value="{{ $index }}">
                    <button type="submit"
                        class="w-full bg-gradient-to-b from-[#009468] to-[#1B4D3E] text-white py-1 md:py-3 px-6 rounded-full font-medium hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
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
        <!-- Your date icon path data here -->
    </svg>`;

        const timeIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 22 22" fill="none">
        <!-- Your time icon path data here -->
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

                // Show loading
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = 'Registering...';
                submitBtn.disabled = true;

                try {
                    // Here you can send to your backend
                    console.log('Form data:', Object.fromEntries(formData));

                    // Simulate API call
                    await new Promise(resolve => setTimeout(resolve, 1500));

                    messageEl.className =
                        'mt-4 p-3 rounded-lg text-center bg-green-100 text-green-800 border border-green-200';
                    messageEl.innerHTML =
                        '✅ Registration successful! We\'ll contact you soon.';
                    messageEl.classList.remove('hidden');
                    form.reset();
                } catch (error) {
                    messageEl.className =
                        'mt-4 p-3 rounded-lg text-center bg-red-100 text-red-800 border border-red-200';
                    messageEl.innerHTML = '❌ Something went wrong. Please try again.';
                    messageEl.classList.remove('hidden');
                } finally {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    setTimeout(() => messageEl.classList.add('hidden'), 5000);
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
