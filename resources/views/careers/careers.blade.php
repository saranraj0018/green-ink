@php
    $data = [
        [
            'department' => 'Engineering',
            'title' => 'Product Engineer',
            'description' =>
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'mode' => 'Offline',
            'experience' => '1–3 yrs',
            'skills' => 'HTML, CSS & JavaScript',
            'location' => 'Coimbatore',
            'apply_now' => '#',
        ],
    ];
@endphp

<section class="my-container my-10 space-y-3">
    <h2 class="text-2xl text-center text-primary font-medium">Current Openings</h2>
    <p class="text-lg text-center">Discover your next career opportunity and growth with us</p>

    <div class="grid grid-cols-12 gap-4 mt-8">
        @foreach ($data as $index => $item)
            <div class="col-span-12 md:col-span-4 p-3 md:p-4 rounded-3xl shadow border border-gray-300 space-y-3">
                <span
                    class="text-xs text-primary font-medium bg-gray-200 rounded-full py-1 px-2">{{ $item['department'] }}</span>
                <h2 class="text-[16px] font-semibold mt-3">{{ $item['title'] }}</h2>
                <hr class="text-gray-300">
                <p class="text-sm text-gray-600">{{ $item['description'] }}</p>


                <div class="space-y-2  bg-[#F4F4F4] p-3 rounded-lg">
                    <div class="text-sm font-medium"><strong class="text-primary-light">Mode:</strong>
                        {{ $item['mode'] }}</div>
                    <div class="text-sm font-medium"><strong class="text-primary-light">Experience:</strong>
                        {{ $item['experience'] }}</div>
                    <div class="text-sm font-medium"><strong class="text-primary-light">Skills:</strong>
                        {{ $item['skills'] }}</div>
                    <div class="text-sm font-medium"><strong class="text-primary-light">Location:</strong>
                        {{ $item['location'] }}</div>
                </div>

                <button class="register-btn w-full px-4 py-2 text-white rounded-full text-sm"
                    style="background: linear-gradient(180deg, #009468 0%, #1B4D3E 100%);"
                    data-index="{{ $index }}">
                    Apply Now
                </button>
            </div>
        @endforeach
    </div>

    @foreach ($data as $index => $item)
        <div id="applyModal{{ $index }}"
            class="fixed inset-0 hidden flex items-center justify-center z-1000 bg-black/50 p-4">
            <div class="bg-white rounded-2xl p-6 max-w-md w-full space-y-4">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">{{ $item['title'] }}</h3>
                    <button class="close-modal text-2xl">&times;</button>
                </div>

                <div class="text-sm space-y-1">
                    <div><strong>Department:</strong> {{ $item['department'] }}</div>
                    <div><strong>Experience:</strong> {{ $item['experience'] }}</div>
                    <div><strong>Location:</strong> {{ $item['location'] }}</div>
                    <div><strong>Mode:</strong> {{ $item['mode'] }}</div>
                </div>

                <form class="space-y-4">

                    <div class="grid grid-cols-12 gap-3">

                        <div class="col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium mb-1">Full Name</label>
                            <input type="text" class="w-full p-2 border rounded-lg text-sm"
                                placeholder="Enter full name" required>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium mb-1">Email Address</label>
                            <input type="email" class="w-full p-2 border rounded-lg text-sm"
                                placeholder="Enter email address" required>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium mb-1">Phone Number</label>
                            <input type="tel" class="w-full p-2 border rounded-lg text-sm"
                                placeholder="Enter phone number" required>
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium mb-1">Years of Experience</label>
                            <input type="text" class="w-full p-2 border rounded-lg text-sm"
                                placeholder="e.g. 2 Years" required>
                        </div>

                    </div>

                    <div class="border border-dashed rounded-lg p-3 space-y-2">
                        <label class="block text-sm font-medium">Upload Resume</label>
                        <input type="file" id="resumeInput" class="hidden" accept=".pdf,.doc,.docx">

                        <div class="flex items-center gap-3">
                            <button type="button" onclick="document.getElementById('resumeInput').click()"
                                class="px-4 py-2 text-sm rounded-lg bg-gray-200 hover:bg-gray-300">
                                Choose File
                            </button>

                            <span id="fileName" class="text-sm text-gray-600 truncate"></span>

                            <button type="button" id="viewFile" class="hidden text-sm text-blue-600 underline">
                                View
                            </button>

                            <button type="button" id="removeFile" class="hidden text-sm text-red-600 underline">
                                Cancel
                            </button>
                        </div>
                    </div>

                    <button
                        class="w-full bg-gradient-to-b from-[#009468] to-[#1B4D3E] text-white py-2 rounded-full text-sm">
                        Submit Application
                    </button>
                </form>



            </div>
        </div>
    @endforeach
</section>

<script>
    document.querySelectorAll('.register-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById(`applyModal${btn.dataset.index}`).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
    });

    document.querySelectorAll('.close-modal').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('[id^="applyModal"]').forEach(m => m.classList.add('hidden'));
            document.body.style.overflow = 'auto';
        });
    });

    document.addEventListener('click', e => {
        if (e.target.classList.contains('fixed')) {
            document.querySelectorAll('[id^="applyModal"]').forEach(m => m.classList.add('hidden'));
            document.body.style.overflow = 'auto';
        }
    });
</script>

<script>
    const input = document.getElementById('resumeInput');
    const fileName = document.getElementById('fileName');
    const viewBtn = document.getElementById('viewFile');
    const removeBtn = document.getElementById('removeFile');

    let fileURL = null;

    input.addEventListener('change', () => {
        if (input.files.length) {
            const file = input.files[0];
            fileName.textContent = file.name;
            fileURL = URL.createObjectURL(file);
            viewBtn.classList.remove('hidden');
            removeBtn.classList.remove('hidden');
        }
    });

    viewBtn.addEventListener('click', () => {
        if (fileURL) window.open(fileURL, '_blank');
    });

    removeBtn.addEventListener('click', () => {
        input.value = '';
        fileName.textContent = '';
        viewBtn.classList.add('hidden');
        removeBtn.classList.add('hidden');
        if (fileURL) URL.revokeObjectURL(fileURL);
    });
</script>
