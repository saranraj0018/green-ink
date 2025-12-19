<aside class="fixed top-0 left-0 h-full w-64 overflow-y-auto " style="background:#006400;">
    <!-- Brand Logo -->
    <x-app-logo />

    <ul class="flex flex-col gap-3 mt-4 text-sm font-medium text-[#e4c094] ">
        <x-menu.item route="admin.dashboard" name="Dashboard" icon="fa-home"/>
        <x-menu.item route="view.category" name="Category" icon="fa-layer-group"/>
        <x-menu.item route="course_list" name="Course" icon="fa-book-open"/>
        <x-menu.item route="view.event" name="Event" icon="fa-calendar-days"/>
        <x-menu.item route="view.career" name="Career" icon="fa-briefcase"/>
        <x-menu.item route="event.registrations" name="Event Registrations" icon="fa-users"/>
        <x-menu.item route="career.applications" name="Career Applications" icon="fa-file-alt"/>
    </ul>
</aside>
