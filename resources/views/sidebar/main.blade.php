  @vite(['resources/css/app.css', 'resources/js/app.js'])

 <section>
     <div class="grid grid-cols-12  p-0">
         <div class="col-span-2 bg-[#1B4D3E] py-3 px-3">
             <div class="bg-white py-2 px-3 rounded-lg">
                 <img src="./assets/greeninklogo.png" class="" alt="logo" />
             </div>
             <div class="flex">
                 <!-- Sidebar -->
                 <aside class="w-64 shadow h-screen pt-5">
                     <nav class="space-y-2">
                         <a href="/dashboard" class="block p-3 rounded-lg text-white text-sm font-normal hover:bg-[#FFB100]">Dashboard</a>
                         <a href="#" class="block p-3 rounded-lg text-white text-sm font-normal hover:bg-[#FFB100]">My Courses</a>
                         <a href="#" class="block p-3 rounded-lg  text-white text-sm font-normal hover:bg-[#FFB100]">Weekly Reports</a>
                         <a href="#" class="block p-3 rounded-lg  text-white text-sm font-normal hover:bg-[#FFB100]">Certificates</a>
                         <a href="#" class="block p-3 rounded-lg text-sm  text-white font-normal hover:bg-[#FFB100]">Resources</a>
                        <a href="#" class="block p-3 rounded-lg text-sm  text-white font-normal hover:bg-[#FFB100]">Test</a>
                        <a href="#" class="block p-3 rounded-lg text-sm  text-white font-normal hover:bg-[#FFB100]">Notification</a>
                        <a href="#" class="block p-3 rounded-lg text-sm  text-white font-normal hover:bg-[#FFB100]">Profile</a>

                     </nav>
                 </aside>
             </div>
         </div>
         <div class="col-span-10">


             <!-- NAVBAR -->
             <section class="bg-white/50 ">
                 <div class=" mx-auto px-4 md:px-5 py-4 flex items-center justify-between">
                     <!-- Mobile Menu Button -->
                     <button id="menu-toggle" class="md:hidden text-green-700 text-3xl font-bold">
                         ☰
                     </button>

                     <!-- Center: Navigation -->
                     <nav id="navbar-menu" class="hidden md:flex">
                         <ul class="w-full flex flex-col md:flex-row items-center gap-3 md:gap-2 text-sm  font-semibold
                      border border-green-600 px-4 py-2 md:px-10 lg:px-20 md:py-3 lg:gap-8 bg-white rounded-full ">

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
