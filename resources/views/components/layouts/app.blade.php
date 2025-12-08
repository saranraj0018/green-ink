 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-partials.header/>
            @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
    
    @yield('content')

    </body>
    <x-partials.footer/>
</html>