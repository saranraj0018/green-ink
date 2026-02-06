<x-layouts.admin>
    <div class="p-6 max-w-4xl mx-auto bg-white rounded-xl shadow">

        <h2 class="text-xl font-bold mb-6 text-[#006400]">
            Course Registration Details
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

            <div><strong>Payment ID:</strong> {{ $registration->student_id }}</div>
            <div><strong>Name:</strong> {{ $registration->name }}</div>

            <div><strong>Email:</strong> {{ $registration->email }}</div>
            <div><strong>Phone:</strong> {{ $registration->phone }}</div>

            <div><strong>Alt Phone:</strong> {{ $registration->alt_phone }}</div>
            <div><strong>DOB:</strong> {{ $registration->dob }}</div>

            <div><strong>Roll No:</strong> {{ $registration->roll_no }}</div>
            <div><strong>Community:</strong> {{ $registration->community }}</div>

            <div><strong>Employed:</strong> {{ ucfirst($registration->employed) }}</div>
            <div><strong>Course:</strong> {{ $registration->course_type }}</div>

            <div>
                <strong>Aadhaar:</strong>
                <a href="{{ asset('storage/'.$registration->aadhaar_path) }}"
                   target="_blank"
                   class="text-green-700 underline">
                    View File
                </a>
            </div>

            <div><strong>Payment ID:</strong> {{ $registration->payment?->payment_id }}</div>
            <div><strong>Paid At:</strong> {{ $registration->payment?->created_at?->format('d M Y, h:i A') }}</div>

        </div>

        <div class="mt-6">
            <a href="{{ route('course.registrations') }}"
               class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                ← Back
            </a>
        </div>

    </div>
</x-layouts.admin>
