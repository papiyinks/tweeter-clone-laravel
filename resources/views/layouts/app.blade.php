<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <section class="px-8 py-4 mb-6">
                @livewire('navigation-dropdown')
            </section>

            <!-- Page Heading -->

            <!-- Page Content -->
            <section class="px-8">
                <main class="container mx-auto">
                    <div class="lg:flex lg:justify-between">
                        <div class="lg:w-32">
                            @auth
                                @include ('_sidebar-links')
                            @endauth
                        </div>

                        <div class="lg:flex-1 lg:mx-10" style="max-width: 700px;">
                            {{ $slot }}
                        </div>

                        <div class="lg:w-1/6 bg-blue-100 rounded-lg p-4">
                            @auth
                                @include ('_friends-list')
                            @endauth
                        </div>
                    </div>
                </main>
            </section>
        </div>

        @stack('modals')

        @livewireScripts

        <script src="http://unpkg.com/turbolinks"></script>
    </body>
</html>
