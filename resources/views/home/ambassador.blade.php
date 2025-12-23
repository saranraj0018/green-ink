@php
    $Profile = [
        ['image' => 'assets/A1.png', 'name' => 'Bharathi Baskar ', 'role' => 'Tamil Orator & Motivational Speaker'],
        ['image' => 'assets/A2.png', 'name' => 'Anandhi', 'role' => 'Popular Tamil RJ & Motivational Host'],
        ['image' => 'assets/A3.png', 'name' => 'Anandhi', 'role' => 'Lorem Ipsum era ofgh'],
        ['image' => 'assets/A4.png', 'name' => 'Shruthi', 'role' => 'Lorem Ipsum era ofgh'],
    ];
@endphp
<div class="my-container my-10">
    <h2 class="text-primary text-3xl text-center font-medium">
        Meet our Brand Ambassadors!
    </h2>
    <p class="text-lg font-medium text-center mb-8">
        Real voices. Remarkable journeys. Limitless inspiration.
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 my-4">
        @foreach ($Profile as $profile)
            <div class="space-y-2">
                <img src={{ asset($profile['image']) }} alt="">
                <p class="text-lg font-medium text-center">
                    {{ $profile['name'] }}
                </p>
                <p class="text-sm text-center">
                    {{ $profile['role'] }}
                </p>

            </div>
        @endforeach
    </div>

</div>
