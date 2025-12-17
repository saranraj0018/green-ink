<section class="my-container my-10 space-y-3">
    <h2 class="text-2xl text-center text-primary font-medium">
        Current Openings
    </h2>

    <p class="text-lg text-center">
        Discover your next career opportunity and growth with us
    </p>

    <div class="grid grid-cols-12 gap-4 mt-8">
        @foreach ($careers as $index => $career)
            <div class="col-span-12 md:col-span-4 p-3 md:p-4 rounded-3xl shadow border border-gray-300 space-y-3">

                <span class="text-xs text-primary font-medium bg-gray-200 rounded-full py-1 px-2">
                    {{ ucfirst($career->department) }}
                </span>

                <h2 class="text-[16px] font-semibold mt-3">
                    {{ $career->title }}
                </h2>

                <hr class="text-gray-300">

                <p class="text-sm text-gray-600">
                    {{ $career->description }}
                </p>

                <div class="space-y-2 bg-[#F4F4F4] p-3 rounded-lg">
                    <div class="text-sm font-medium">
                        <strong class="text-primary-light">Mode:</strong>
                        {{ ucfirst($career->mode) }}
                    </div>

                    <div class="text-sm font-medium">
                        <strong class="text-primary-light">Experience:</strong>
                        {{ $career->experience }}
                    </div>

                    <div class="text-sm font-medium">
                        <strong class="text-primary-light">Skills:</strong>
                        {{ $career->skills }}
                    </div>

                    <div class="text-sm font-medium">
                        <strong class="text-primary-light">Location:</strong>
                        {{ ucfirst($career->location) }}
                    </div>
                </div>

                <button class="register-btn w-full px-4 py-2 text-white rounded-full text-sm"
                    style="background: linear-gradient(180deg, #009468 0%, #1B4D3E 100%);"
                    data-index="{{ $index }}">
                    Apply Now
                </button>
            </div>
        @endforeach
    </div>

    <!-- Apply Modals -->
    @foreach ($careers as $index => $career)
        <div id="applyModal{{ $index }}"
            class="fixed inset-0 hidden flex items-center justify-center z-1000 bg-black/50 p-4">

            <div class="bg-white rounded-2xl p-6 max-w-md w-full space-y-4">

                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-bold">
                        {{ $career->title }}
                    </h3>
                    <button class="close-modal text-2xl">&times;</button>
                </div>

                <div class="text-sm space-y-1">
                    <div><strong>Experience:</strong> {{ $career->experience }}</div>
                    <div><strong>Location:</strong> {{ $career->location }}</div>
                    <div><strong>Mode:</strong> {{ ucfirst($career->mode) }}</div>
                    <div><strong>Skills:</strong> {{ $career->skills }}</div>
                </div>

                <form class="careerForm space-y-4">
                    @csrf

                    <input type="hidden" name="career_id" value="{{ $career->id }}">
                    <input type="hidden" name="career_index" value="{{ $index }}">

                    <div class="grid grid-cols-12 gap-3">

                        <div class="col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium mb-1">Full Name</label>
                            <input type="text" name="name" required class="w-full p-2 border rounded-lg text-sm">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium mb-1">Email Address</label>
                            <input type="email" name="email" required class="w-full p-2 border rounded-lg text-sm">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium mb-1">Phone Number</label>
                            <input type="tel" name="phone" required class="w-full p-2 border rounded-lg text-sm">
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <label class="block text-sm font-medium mb-1">Years of Experience</label>
                            <input type="text" name="experience" required
                                class="w-full p-2 border rounded-lg text-sm">
                        </div>

                    </div>

                    <div class="border border-dashed rounded-lg p-3">
                        <label class="block text-sm font-medium mb-2">Upload Resume</label>
                        <input type="file" name="resume" required accept=".pdf,.doc,.docx" class="w-full text-sm">

                        <div class="flex items-center gap-3">
                            {{-- <button type="button" onclick="document.getElementById('resumeInput').click()"
                                class="px-4 py-2 text-sm rounded-lg bg-gray-200 hover:bg-gray-300">
                                Choose File
                            </button> --}}

                            <span class="fileName text-sm text-gray-600 truncate"></span>

                            <button type="button" class="viewFile hidden text-sm text-blue-600 underline">
                                View
                            </button>

                            <button type="button" class="removeFile hidden text-sm text-red-600 underline">
                                Cancel
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-b from-[#009468] to-[#1B4D3E] text-white py-2 rounded-full text-sm">
                        Submit Application
                    </button>
                </form>
                <div id="careerMessage{{ $index }}" class="mt-4 hidden p-3 rounded-lg text-center"></div>
            </div>
        </div>
    @endforeach
</section>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        // 🔹 Open modal
        document.querySelectorAll('.register-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const index = btn.dataset.index;
                const modal = document.getElementById(`applyModal${index}`);
                if (modal) {
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                }
            });
        });

        // 🔹 Close modal
        document.querySelectorAll('.close-modal').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('[id^="applyModal"]').forEach(m => m.classList.add(
                    'hidden'));
                document.body.style.overflow = 'auto';
            });
        });

        // 🔹 Career form submit
        document.querySelectorAll('.careerForm').forEach(form => {

            // 📎 Resume handling (FORM SCOPED)
            const fileInput = form.querySelector('input[type="file"]');
            const fileName = form.querySelector('.fileName');
            const viewBtn = form.querySelector('.viewFile');
            const removeBtn = form.querySelector('.removeFile');

            let fileURL = null;

            if (fileInput) {
                fileInput.addEventListener('change', () => {
                    if (fileInput.files.length) {
                        const file = fileInput.files[0];
                        fileName.textContent = file.name;
                        fileURL = URL.createObjectURL(file);
                        viewBtn.classList.remove('hidden');
                        removeBtn.classList.remove('hidden');
                    }
                });
            }

            viewBtn?.addEventListener('click', () => {
                if (fileURL) window.open(fileURL, '_blank');
            });

            removeBtn?.addEventListener('click', () => {
                fileInput.value = '';
                fileName.textContent = '';
                viewBtn.classList.add('hidden');
                removeBtn.classList.add('hidden');
                if (fileURL) URL.revokeObjectURL(fileURL);
            });

            // 🚀 Submit
            form.addEventListener('submit', async e => {
                e.preventDefault();

                const formData = new FormData(form);
                const index = formData.get('career_index');

                const msg = document.getElementById(`careerMessage${index}`);
                const modal = document.getElementById(`applyModal${index}`);

                if (!msg) {
                    console.error('❌ careerMessage missing for index:', index);
                    return;
                }

                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;

                submitBtn.innerHTML = 'Submitting...';
                submitBtn.disabled = true;

                try {
                    const response = await fetch("{{ route('career.apply') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document
                                .querySelector('meta[name="csrf-token"]').content
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (!result.success) {
                        msg.className =
                            'mt-4 p-3 rounded-lg text-center bg-yellow-100 text-yellow-800';
                        msg.innerHTML = result.message;
                        msg.classList.remove('hidden');
                        return;
                    }

                    msg.className =
                        'mt-4 p-3 rounded-lg text-center bg-green-100 text-green-800';
                    msg.innerHTML = '✅ Application submitted successfully!';
                    msg.classList.remove('hidden');

                    form.reset();

                    if (fileInput) {
                        fileInput.value = '';
                    }

                    if (fileName) {
                        fileName.textContent = '';
                    }

                    viewBtn?.classList.add('hidden');
                    removeBtn?.classList.add('hidden');

                    if (fileURL) {
                        URL.revokeObjectURL(fileURL);
                        fileURL = null;
                    }

                    setTimeout(() => {
                        modal?.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }, 1500);

                } catch (err) {
                    msg.className =
                        'mt-4 p-3 rounded-lg text-center bg-red-100 text-red-800';
                    msg.innerHTML = '❌ Something went wrong';
                    msg.classList.remove('hidden');
                } finally {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    setTimeout(() => msg.classList.add('hidden'), 4000);
                }
            });
        });
    });
</script>
