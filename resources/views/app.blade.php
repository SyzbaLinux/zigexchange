<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zig.Exchange</title>
        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

        <script>
            // window.addEventListener("load", function() {
            //     /* Preloader */
            //     var preloader = document.querySelector("#preloader");
            //     preloader.css('dsisplay','none');
            // });

        </script>
    </body>
</html>
