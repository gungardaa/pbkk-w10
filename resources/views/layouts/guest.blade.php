<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-[var(--ink)] antialiased bg-[var(--canvas)]">
        <div class="fixed inset-0 -z-10">
            <div class="absolute inset-0 bg-grid"></div>
            <div class="glow-orb w-[480px] h-[480px] -top-40 left-1/2 -translate-x-1/2" style="background:rgba(36,96,173,.28)"></div>
            <div class="glow-orb w-[320px] h-[320px] top-1/3 -left-24" style="background:rgba(77,243,255,.10)"></div>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/" class="flex items-center gap-3">
                    <span class="font-display grid h-12 w-12 place-items-center rounded-xl text-lg font-bold text-[var(--on-accent)]" style="background:var(--hairline);box-shadow:0 0 18px rgba(77,243,255,.5)">AN</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 card border-cyan-200/20 shadow-2xl">
                <div class="mb-8">
                   <div class="flex items-center gap-2 border-b border-cyan-200/10 pb-3 mb-4">
                        <span class="terminal-dot" style="background:#FF5F57"></span>
                        <span class="terminal-dot" style="background:#FEBC2E"></span>
                        <span class="terminal-dot" style="background:#28C840"></span>
                        <span class="font-mono2 ml-3 text-xs text-[var(--body)]">authentication console</span>
                    </div>
                    <p class="font-mono2 text-[var(--hairline)] text-sm">$ auth --login</p>
                </div>

                {{ $slot }}
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="text-sm text-[var(--body)] hover:text-[var(--hairline)] transition-colors">
                    &larr; Back to ITS sandbox routes
                </a>
            </div>
        </div>
    </body>
</html>