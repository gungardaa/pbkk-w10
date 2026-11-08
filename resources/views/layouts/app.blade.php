<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Arda Nareswara, ITS Academic Profile')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen antialiased" data-theme="{{ $theme ?? 'dark' }}">
<div class="fixed inset-0 -z-10">
    <div class="absolute inset-0 bg-grid"></div>
    <div class="glow-orb w-[480px] h-[480px] -top-40 left-1/2 -translate-x-1/2" style="background:rgba(36,96,173,.28)"></div>
    <div class="glow-orb w-[320px] h-[320px] top-1/3 -left-24" style="background:rgba(77,243,255,.10)"></div>
    <div class="glow-orb w-[300px] h-[300px] bottom-0 right-0" style="background:rgba(107,228,210,.08)"></div>
</div>

<header class="sticky top-0 z-40 border-b border-cyan-200/10" style="background:var(--header);backdrop-filter:blur(14px)">
  <div class="mx-auto flex max-w-6xl items-center justify-between px-5 py-4">
    <a href="{{ route('home') }}" class="flex items-center gap-3">
      <span class="font-display grid h-10 w-10 place-items-center rounded-xl text-sm font-bold text-[var(--on-accent)]" style="background:var(--hairline);box-shadow:0 0 18px rgba(77,243,255,.5)">AN</span>
      <span class="leading-tight">
        <span class="font-display block text-sm font-bold">ARDA NARESWARA</span>
        <span class="font-mono2 block text-[11px] text-[var(--body)]">ITS sandbox routes</span>
      </span>
    </a>
    <nav class="hidden items-center gap-7 text-sm md:flex" aria-label="Main">
      <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
      <a href="{{ route('profil') }}" class="nav-link {{ request()->routeIs('profil') ? 'active' : '' }}">Profil</a>
      <a href="{{ route('agent.show') }}" class="nav-link {{ request()->routeIs('agent.show', 'ide-agent') ? 'active' : '' }}">Agents</a>
      <a href="{{ route('ipk.hitung', ['ip1' => '3.50', 'ip2' => '3.80']) }}" class="nav-link {{ request()->routeIs('ipk.hitung') ? 'active' : '' }}">GPA Calc</a>
      <a href="{{ request()->fullUrlWithQuery(['mode' => $theme === 'dark' ? 'light' : 'dark']) }}" class="btn-ghost rounded-xl px-4 py-2 text-sm font-bold" aria-label="Toggle color theme">{{ $theme === 'dark' ? '☀ Light' : '🌙 Dark' }}</a>
      @auth
        @if (app()->environment('local') || app()->environment('testing'))
          <a href="{{ route('dashboard.index') }}" class="btn-glow rounded-xl px-4 py-2 text-sm font-bold">Dashboard</a>
        @else
          <a href="{{ route('dashboard.index') }}" class="btn-glow rounded-xl px-4 py-2 text-sm font-bold" aria-disabled="true" style="opacity: .6;">Dashboard</a>
        @endif
        <form method="POST" action="{{ route('logout') }}" class="inline" @csrf>
          <button type="submit" class="btn-ghost rounded-xl px-4 py-2 text-sm font-bold">Logout</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="btn-glow rounded-xl px-4 py-2 text-sm font-bold">Login</a>
      @endauth
    </nav>
    <button id="menuBtn" class="btn-ghost rounded-xl px-4 py-2 text-sm md:hidden" aria-expanded="false" aria-controls="mobileMenu">Menu</button>
  </div>
  <div id="mobileMenu" class="hidden border-t border-cyan-200/10 px-5 py-4 md:hidden">
    <div class="grid gap-3 text-sm">
      <a href="{{ route('home') }}" class="nav-link">Home</a>
      <a href="{{ route('profil') }}" class="nav-link">Profil</a>
      <a href="{{ route('agent.show') }}" class="nav-link">Agents</a>
      <a href="{{ route('ipk.hitung', ['ip1' => '3.50', 'ip2' => '3.80']) }}" class="nav-link">GPA Calc</a>
      @auth
        @if (app()->environment('local') || app()->environment('testing'))
          <a href="{{ route('dashboard.index') }}" class="btn-glow rounded-xl px-4 py-2 text-center text-sm font-bold">Dashboard</a>
        @else
          <a href="{{ route('dashboard.index') }}" class="btn-glow rounded-xl px-4 py-2 text-center text-sm font-bold" aria-disabled="true" style="opacity: .6;">Dashboard</a>
        @endif
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
          <button type="submit" class="btn-ghost rounded-xl px-4 py-2 text-center text-sm font-bold">Logout</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="btn-glow rounded-xl px-4 py-2 text-center text-sm font-bold">Login</a>
      @endauth
    </div>
  </div>
</header>

<main class="mx-auto w-full max-w-6xl px-5 pb-24">
  @yield('content')
  @if (! empty($slot ?? null))
    <div class="mt-8">{{ $slot }}</div>
  @endif
</main>

<footer class="border-t border-cyan-200/10">
  <div class="mx-auto max-w-6xl px-5 py-8 text-left text-sm text-[var(--body)]">
    <p>© 2026 Arda Nareswara, Institut Teknologi Sepuluh Nopember (ITS)</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/adminlte@4.5.1/dist/js/adminlte.min.js"></script>
@stack('scripts')
</body>
</html>