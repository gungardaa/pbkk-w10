@extends('layouts.app')

@section('title', 'Dashboard, Arda Nareswara')

@section('content')
<section class="pt-12">
  <span class="badge">Dashboard group under /dashboard</span>
  <h1 class="font-display mt-4 text-4xl font-bold md:text-5xl">One calm place<br>for all my routes</h1>
  <p class="mt-3 max-w-xl text-[15px] leading-relaxed text-[var(--body)]">
    This dashboard groups my academic pages under one prefix. Use it to jump fast between profile, agents and GPA tools.
  </p>

  <div class="mt-8 grid gap-4 md:grid-cols-3">
    <div class="card p-6">
      <p class="font-mono2 text-xs text-[var(--hairline)]">PROFILE</p>
      <p class="font-display mt-2 text-xl font-bold">{{ $student['short_name'] }}</p>
      <p class="font-mono2 mt-1 text-xs text-[var(--body)]">{{ $student['nrp'] }}</p>
      <a href="{{ route('dashboard.profil', ['nrp' => $student['nrp']]) }}" class="btn-glow mt-5 inline-block rounded-xl px-4 py-2 text-sm font-bold">Open dashboard profile</a>
    </div>
    <div class="card p-6">
      <p class="font-mono2 text-xs text-[var(--hairline)]">GPA TOOL</p>
      <p class="font-display mt-2 text-xl font-bold">Check your average</p>
      <p class="mt-1 text-sm text-[var(--body)]">Interactive form with live link builder.</p>
      <a href="{{ route('dashboard.ipk') }}" class="btn-glow mt-5 inline-block rounded-xl px-4 py-2 text-sm font-bold">Open GPA form</a>
    </div>
    <div class="card p-6">
      <p class="font-mono2 text-xs text-[var(--hairline)]">AGENTS</p>
      <p class="font-display mt-2 text-xl font-bold">One idea plus default</p>
      <p class="mt-1 text-sm text-[var(--body)]">Same agent pages under dashboard prefix.</p>
      <a href="{{ route('dashboard.agent') }}" class="btn-glow mt-5 inline-block rounded-xl px-4 py-2 text-sm font-bold">Open agents</a>
    </div>
  </div>

  <div class="mt-8 grid gap-4 lg:grid-cols-1">
    @php($a = $agents['magentic'])
    <a href="{{ route('dashboard.agent', ['tema' => 'magentic']) }}" class="card block p-7">
      <p class="font-mono2 text-xs text-[var(--hairline)]">DASHBOARD AGENT</p>
      <h3 class="font-display mt-2 text-2xl font-bold">{{ $a['name'] }}</h3>
      <p class="mt-2 text-sm text-[var(--body)]">{{ $a['short'] }}</p>
      <p class="font-mono2 mt-4 text-xs text-[var(--acc2)]">/dashboard/agent/magentic</p>
    </a>
  </div>

  <div class="card mt-8 p-7">
    <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">ALL NAMED ROUTES</p>
    <div class="mt-4 grid gap-3 text-sm md:grid-cols-2">
      <a href="{{ route('home') }}" class="btn-ghost rounded-xl px-4 py-3">Home root</a>
      <a href="{{ route('mahasiswa.show', ['nrp' => $student['nrp']]) }}" class="btn-ghost rounded-xl px-4 py-3">Profile by NRP</a>
      <a href="{{ route('agent.show') }}" class="btn-ghost rounded-xl px-4 py-3">Agent default</a>
      <a href="{{ route('ipk.hitung', ['ip1' => '3.50', 'ip2' => '3.80']) }}" class="btn-ghost rounded-xl px-4 py-3">GPA example</a>
    </div>
  </div>
</section>
@endsection
