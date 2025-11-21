 @vite(['resources/css/app.css', 'resources/js/app.js'])

 <!--footer section-->
 <section class="bg-[url('{{ asset('assets/greenbg.png') }}')] bg-cover bg-center h-screen" >
    <div class=" max-w-6xl mx-auto py-5 px-5 ">
<div class="grid grid-cols-12 gap-3">
    <div class="col-span-12 md:col-span-5  ">
        <img src="/assets/greeninklogo.png" class="w-50" alt="logo"/>
        <p class="text-justify text-sm text-black w-80 py-2">Transform your career with world-class education. Learn industry experts and gain skills that matter.</p>
        <h2 class="text-lg text-black font-semibold py-2">FOLLOW US</h2>
         links
    </div>
    <div class="col-span-12 md:col-span-3">
       <h2 class="text-lg text-black font-semibold py-2">Platform</h2>
        <nav id="navbar-menu">
            <ul>
                 <li>
                    <a href="{{ route('home') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('home') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-black' }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('about') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-black' }}">
                        About
                    </a>
                </li>

                <li>
                    <a href="{{ route('Courses') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('Courses') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-black' }}">
                        Courses
                    </a>
                </li>

                <li>
                    <a href="{{ route('Features') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('Features') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-black' }}">
                        Features
                    </a>
                </li>

                <li>
                    <a href="{{ route('Contact') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('Contact') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-black' }}">
                        Contact
                    </a>
                </li>
            </ul>
            </ul>
        </nav>
    </div>
    <div class="col-span-12 md:col-span-4">
       <h2 class="text-lg text-black font-semibold py-2">Top Courses</h2>
       <nav id="navbar-menu">
            <ul>
                 <li>
                    <a href="{{ route('WebDevelopment') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('WebDevelopment') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-black' }}">
                       Web Development
                    </a>
                </li>

                <li>
                    <a href="{{ route('DataScience') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('DataScience') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-black' }}">
                        Data Science
                    </a>
                </li>

                <li>
                    <a href="{{ route('Business') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('Business') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-black' }}">
                       Business
                    </a>
                </li>

                <li>
                    <a href="{{ route('Design') }}"
                        class="px-3 py-2 rounded-md {{ request()->routeIs('Design') ? 'bg-[rgba(0,131,87,1)] text-white' : 'text-black' }}">
                        Design
                    </a>
                </li>

            </ul>
            </ul>
        </nav>
    </div>
</div>
<div class="flex justify-between py-5">
    <p class="text-sm text-black text-justify font-light">@ 2025 Greenlink Academy. All rights reserved.</p>
    <p class="text-sm text-black text-justify font-light ">Privacy Policy       Terms of Service</p>

</div>
    </div>


 </section>