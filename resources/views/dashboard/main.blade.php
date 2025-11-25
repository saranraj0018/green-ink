 @vite(['resources/css/app.css', 'resources/js/app.js'])

 <section>
     <div class="grid grid-cols-12  p-0">
         <div class="col-span-2 bg-[#1B4D3E] py-10 px-3">
             <img src="./assets/greeninklogo.png" class="" alt="logo"/>

         </div>
         <div class="col-span-10">


             <!-- NAVBAR -->
             <section class="bg-white/50 ">
                 <div class=" mx-auto px-4 md:px-30 py-4 flex items-center justify-between">




                     <!-- Mobile Menu Button -->
                     <button id="menu-toggle" class="md:hidden text-green-700 text-3xl font-bold">
                         ☰
                     </button>

                     <!-- Center: Navigation -->
                     <nav id="navbar-menu" class="hidden md:flex">
                         <ul class="w-full flex flex-col md:flex-row items-center gap-3 md:gap-5 text-sm font-semibold
                      border border-green-600 px-4 py-2 md:px-10 md:py-3 bg-white rounded-full ">

                             @php
                             $menus = [
                             'home' => 'Home',
                             'about' => 'About',
                             'Courses' => 'Courses',
                             'Features' => 'Features',
                             'Events' => 'Events',
                             'Career' => 'Career',
                             'Store' => 'Store',
                             'Blogs' => 'Blogs',
                             'ContactUs' => 'Contact Us',
                             ];

                             @endphp

                             @foreach ($menus as $route => $label)
                             <li>
                                 <a href="{{ route($route) }}"
                                     class="px-3 py-2 rounded-md transition 
                            {{ request()->routeIs($route) ?
                                ' text-green-700' :
                                'text-green-700 hover:bg-green-50' }}">
                                     {{ $label }}
                                 </a>
                             </li>
                             @endforeach
                         </ul>
                     </nav>
                 </div>
         </div>
 </section>