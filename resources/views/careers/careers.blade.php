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

            <div class="bg-white rounded-2xl p-6 max-w-6xl w-full space-y-4">

                <div class="flex justify-between items-center sticky top-0 bg-white z-20 pb-3">
                    <h3 class="text-xl font-bold">
                        {{ $career->title }}
                    </h3>
                    <button class="close-modal text-2xl">&times;</button>
                </div>

                <!-- JOB INFO -->
                <div class="grid grid-cols-12 gap-3 text-sm border-b pb-3 mb-3">
                    <div class="col-span-6"><strong>Experience:</strong> {{ $career->experience }}</div>
                    <div class="col-span-6"><strong>Location:</strong> {{ $career->location }}</div>
                    <div class="col-span-6"><strong>Mode:</strong> {{ ucfirst($career->mode) }}</div>
                    <div class="col-span-6"><strong>Skills:</strong> {{ $career->skills }}</div>
                </div>
                <div class="overflow-y-auto pr-2" style="max-height: calc(90vh - 180px);">
                    <form class="careerForm space-y-4" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="career_id" value="{{ $career->id }}">
                        <input type="hidden" name="career_index" value="{{ $index }}">

                        <!-- 1. Personal Details -->
                        <div class="grid grid-cols-12 gap-3">
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium mb-1">Full Name</label>
                                <input type="text" name="name" required
                                    class="w-full p-2 border rounded-lg text-sm">
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium mb-1">Email Address</label>
                                <input type="email" name="email" required
                                    class="w-full p-2 border rounded-lg text-sm">
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium mb-1">Phone Number</label>
                                <input type="tel" name="phone" required
                                    class="w-full p-2 border rounded-lg text-sm">
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium mb-1">Address</label>
                                <input type="text" name="address" class="w-full p-2 border rounded-lg text-sm">
                            </div>
                        </div>

                        <!-- 2. Position Applied For -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Position Applied For</label>
                            <select name="position_applied" required class="w-full p-2 border rounded-lg text-sm">
                                <option value="">Select Position</option>
                                <option value="Academic Counselor">Academic Counselor</option>
                                <option value="TNPSC R&D Team">TNPSC R&D Team</option>
                                <option value="Faculty – TNPSC">Faculty – TNPSC</option>
                                <option value="Faculty – Central Exams">Faculty – Central Exams (Banking, SSC, Railways,
                                    Technical)</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- 3. Professional Profile -->
                        <div class="grid grid-cols-12 gap-3">
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium mb-1">Years of Experience</label>
                                <select name="years_experience" required class="w-full p-2 border rounded-lg text-sm">
                                    <option value="">Select</option>
                                    <option value="0-2">0-2</option>
                                    <option value="3-5">3-5</option>
                                    <option value="5-10">5-10</option>
                                    <option value="10+">10+</option>
                                </select>
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium mb-1">Previous Work Experience (Organization &
                                    Role)</label>
                                <input type="text" name="previous_work" class="w-full p-2 border rounded-lg text-sm">
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium mb-1">Key Responsibilities in Previous
                                    Roles</label>
                                <textarea name="key_responsibilities" rows="2" class="w-full p-2 border rounded-lg text-sm"></textarea>
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium mb-1">Area of Expertise / Specialization</label>
                                <input type="text" name="expertise" placeholder="Subjects, Topics, Exam Types"
                                    class="w-full p-2 border rounded-lg text-sm">
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium mb-1">Extra Skills / Certifications</label>
                                <input type="text" name="extra_skills"
                                    placeholder="LMS handling, teaching software, mentoring, languages"
                                    class="w-full p-2 border rounded-lg text-sm">
                            </div>
                        </div>

                        <!-- 4. Education & Qualification -->
                        <div class="grid grid-cols-12 gap-3">
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium mb-1">Highest Qualification</label>
                                <input type="text" name="highest_qualification"
                                    class="w-full p-2 border rounded-lg text-sm">
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium mb-1">Specialization / Degree Details</label>
                                <input type="text" name="degree_details"
                                    class="w-full p-2 border rounded-lg text-sm">
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium mb-1">Other Relevant Certifications</label>
                                <input type="text" name="other_certifications"
                                    class="w-full p-2 border rounded-lg text-sm">
                            </div>
                        </div>

                        <!-- 5. Availability & Joining -->
                        <div class="grid grid-cols-12 gap-3">
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium mb-1">Notice Period / When Can Join</label>
                                <input type="text" name="joining_availability"
                                    class="w-full p-2 border rounded-lg text-sm">
                            </div>
                            <div class="col-span-12 md:col-span-6">
                                <label class="block text-sm font-medium mb-1">Preferred Working Mode</label>
                                <select name="working_mode" class="w-full p-2 border rounded-lg text-sm">
                                    <option value="">Select Mode</option>
                                    <option value="Full-time">Full-time</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Online">Online</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                            </div>
                        </div>

                        <!-- 6. Additional Information -->
                        <div class="grid grid-cols-12 gap-3">
                            <div class="col-span-12">
                                <label class="block text-sm font-medium mb-1">Preferred Exams / Subjects to
                                    Teach</label>
                                <input type="text" name="preferred_exams"
                                    placeholder="TNPSC, Banking, SSC, Railways, Technical"
                                    class="w-full p-2 border rounded-lg text-sm">
                            </div>
                            <div class="col-span-12">
                                <label class="block text-sm font-medium mb-1">
                                    Achievements / Any levels cleared (upload if any)
                                </label>

                                <input type="file" id="achievementInput" name="achievements"
                                    accept=".pdf,.doc,.docx,.jpg,.png" class="w-full text-sm">

                                <div class="flex items-center gap-3 mt-2">
                                    <span class="achievementFileName text-sm text-gray-600 truncate"></span>
                                    <button type="button"
                                        class="achievementView hidden text-sm text-blue-600 underline">
                                        View
                                    </button>
                                    <button type="button"
                                        class="achievementRemove hidden text-sm text-red-600 underline">
                                        Cancel
                                    </button>
                                </div>
                            </div>

                            <div class="col-span-12">
                                <label class="block text-sm font-medium mb-1">Any other relevant details</label>
                                <textarea name="other_details" rows="2" class="w-full p-2 border rounded-lg text-sm"></textarea>
                            </div>
                        </div>

                        <!-- Optional: Roles checkboxes -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Roles Interested In</label>
                            <div class="flex flex-wrap gap-3 text-sm">
                                <label><input type="checkbox" name="roles[]" value="Academic Counselor"> Academic
                                    Counselor</label>
                                <label><input type="checkbox" name="roles[]" value="R&D"> R&D</label>
                                <label><input type="checkbox" name="roles[]" value="Faculty – TNPSC"> Faculty –
                                    TNPSC</label>
                                <label><input type="checkbox" name="roles[]" value="Faculty – Banking"> Faculty –
                                    Banking</label>
                                <label><input type="checkbox" name="roles[]" value="Faculty – SSC"> Faculty –
                                    SSC</label>
                                <label><input type="checkbox" name="roles[]" value="Faculty – Railways"> Faculty –
                                    Railways</label>
                                <label><input type="checkbox" name="roles[]" value="Faculty – Technical"> Faculty –
                                    Technical</label>
                            </div>
                        </div>

                        <!-- Optional: Multi-select Skills -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Skills</label>
                            <select name="skills[]" multiple class="w-full p-2 border rounded-lg text-sm">
                                <option value="Teaching">Teaching</option>
                                <option value="Question Paper Design">Question Paper Design</option>
                                <option value="LMS Handling">LMS Handling</option>
                                <option value="Mentorship">Mentorship</option>
                                <option value="Subject Expertise">Subject Expertise</option>
                                <option value="Exam Research">Exam Research</option>
                            </select>
                        </div>

                        <!-- Resume Upload -->
                        <div class="border border-dashed rounded-lg p-3">
                            <label class="block text-sm font-medium mb-2">Upload Resume</label>

                            <input type="file" id="resumeInput" name="resume" required accept=".pdf,.doc,.docx"
                                class="w-full text-sm">

                            <div class="flex items-center gap-3 mt-2">
                                <span class="resumeFileName text-sm text-gray-600 truncate"></span>
                                <button type="button" class="resumeView hidden text-sm text-blue-600 underline">
                                    View
                                </button>
                                <button type="button" class="resumeRemove hidden text-sm text-red-600 underline">
                                    Cancel
                                </button>
                            </div>
                        </div>


                        <div class="sticky bottom-0 bg-white pt-4 mt-4">
                            <button type="submit"
                                class="w-full bg-gradient-to-b from-[#009468] to-[#1B4D3E] text-white py-2 rounded-full text-sm">
                                Submit Application
                            </button>
                        </div>
                    </form>
                </div>

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

        // 🔹 Forms
        document.querySelectorAll('.careerForm').forEach(form => {

            /* ================= RESUME ================= */
            const resumeInput = form.querySelector('#resumeInput');
            const resumeName = form.querySelector('.resumeFileName');
            const resumeView = form.querySelector('.resumeView');
            const resumeRemove = form.querySelector('.resumeRemove');
            let resumeURL = null;

            resumeInput?.addEventListener('change', () => {
                const file = resumeInput.files[0];
                if (!file) return;

                resumeName.textContent = file.name;
                resumeURL = URL.createObjectURL(file);
                resumeView.classList.remove('hidden');
                resumeRemove.classList.remove('hidden');
            });

            resumeView?.addEventListener('click', () => {
                if (resumeURL) window.open(resumeURL, '_blank');
            });

            resumeRemove?.addEventListener('click', () => {
                resumeInput.value = '';
                resumeName.textContent = '';
                resumeView.classList.add('hidden');
                resumeRemove.classList.add('hidden');
                if (resumeURL) URL.revokeObjectURL(resumeURL);
                resumeURL = null;
            });

            /* ================= ACHIEVEMENT ================= */
            const achInput = form.querySelector('#achievementInput');
            const achName = form.querySelector('.achievementFileName');
            const achView = form.querySelector('.achievementView');
            const achRemove = form.querySelector('.achievementRemove');
            let achURL = null;

            achInput?.addEventListener('change', () => {
                const file = achInput.files[0];
                if (!file) return;

                achName.textContent = file.name;
                achURL = URL.createObjectURL(file);
                achView.classList.remove('hidden');
                achRemove.classList.remove('hidden');
            });

            achView?.addEventListener('click', () => {
                if (achURL) window.open(achURL, '_blank');
            });

            achRemove?.addEventListener('click', () => {
                achInput.value = '';
                achName.textContent = '';
                achView.classList.add('hidden');
                achRemove.classList.add('hidden');
                if (achURL) URL.revokeObjectURL(achURL);
                achURL = null;
            });

            /* ================= SUBMIT ================= */
            form.addEventListener('submit', async e => {
                e.preventDefault();

                const formData = new FormData(form);
                const index = formData.get('career_index');

                const msg = document.getElementById(`careerMessage${index}`);
                const modal = document.getElementById(`applyModal${index}`);
                const submitBtn = form.querySelector('button[type="submit"]');

                submitBtn.innerHTML = 'Submitting...';
                submitBtn.disabled = true;

                try {
                    const response = await fetch("{{ route('career.apply') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector(
                                'meta[name="csrf-token"]').content
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
                    resumeRemove?.click();
                    achRemove?.click();

                    setTimeout(() => {
                        modal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }, 1500);

                } catch (err) {
                    msg.className =
                        'mt-4 p-3 rounded-lg text-center bg-red-100 text-red-800';
                    msg.innerHTML = '❌ Something went wrong';
                    msg.classList.remove('hidden');
                } finally {
                    submitBtn.innerHTML = 'Submit Application';
                    submitBtn.disabled = false;
                }
            });
        });
    });
</script>
