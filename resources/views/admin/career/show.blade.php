<x-layouts.admin>
    <div class="p-6 max-w-5xl mx-auto bg-white rounded-xl shadow">

        <h2 class="text-2xl font-bold mb-6 text-green-700">
            Career Application Details
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

            <p><b>Name:</b> {{ $application->name }}</p>
            <p><b>Email:</b> {{ $application->email }}</p>
            <p><b>Phone:</b> {{ $application->phone }}</p>
            <p><b>Address:</b> {{ $application->address }}</p>

            <p><b>Position Applied:</b> {{ $application->position_applied }}</p>
            <p><b>Years Experience:</b> {{ $application->years_experience }}</p>
            <p><b>Working Mode:</b> {{ $application->working_mode }}</p>
            <p><b>Joining Availability:</b> {{ $application->joining_availability }}</p>

            <p><b>Highest Qualification:</b> {{ $application->highest_qualification }}</p>
            <p><b>Degree Details:</b> {{ $application->degree_details }}</p>

            <p class="md:col-span-2"><b>Previous Work:</b><br>{{ $application->previous_work }}</p>
            <p class="md:col-span-2"><b>Key Responsibilities:</b><br>{{ $application->key_responsibilities }}</p>
            <p class="md:col-span-2"><b>Expertise:</b><br>{{ $application->expertise }}</p>
            <p class="md:col-span-2"><b>Extra Skills:</b><br>{{ $application->extra_skills }}</p>

          <p>
    <b>Achievements:</b>
    @if($application->achievements)
        <a href="{{ asset('storage/'.$application->achievements) }}"
           target="_blank"
           class="text-blue-600 underline">
            View Achievements
        </a>
    @else
        —
    @endif
</p>
            <p class="md:col-span-2"><b>Other Details:</b><br>{{ $application->other_details }}</p>

            <p>
                <b>Roles:</b>
                {{ implode(', ', json_decode($application->roles ?? '[]')) }}
            </p>

            <p>
                <b>Skills:</b>
                {{ implode(', ', json_decode($application->skills ?? '[]')) }}
            </p>

            <p>
                <b>Resume:</b>
                @if($application->resume)
                    <a href="{{ asset('storage/'.$application->resume) }}"
                       target="_blank"
                       class="text-blue-600 underline">
                        View Resume
                    </a>
                @else
                    —
                @endif
            </p>

            <p><b>Applied At:</b> {{ $application->created_at->format('d M Y, h:i A') }}</p>

        </div>

        <div class="mt-6">
            <a href="{{ route('career.applications') }}"
               class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                ← Back
            </a>
        </div>

    </div>
</x-layouts.admin>
