@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
<section class="mx-auto max-w-2xl pt-16 text-center">
  <div class="terminal mx-auto overflow-hidden text-left" data-theme="dark">
    <div class="flex items-center gap-2 border-b border-cyan-200/10 px-5 py-3">
      <span class="terminal-dot" style="background:#FF5F57"></span>
      <span class="terminal-dot" style="background:#FEBC2E"></span>
      <span class="terminal-dot" style="background:#28C840"></span>
      <span class="font-mono2 ml-3 text-xs text-[var(--body)]">fallback route</span>
    </div>
    <div class="font-mono2 space-y-2 px-6 py-6 text-[13px]">
      <p><span style="color:var(--hairline)">$</span> <span class="text-[var(--ink)]">route lookup</span></p>
      <p class="break-all text-[var(--danger)]">404 {{ $missing ?? 'unknown path' }}</p>
      <p class="text-[var(--muted)]">No match in the route table. Showing a friendly page instead.</p>
    </div>
  </div>
  <h1 class="font-display mt-8 text-5xl font-bold">Lost in the routes</h1>
  <p class="mx-auto mt-3 max-w-md text-[15px] leading-relaxed text-[var(--body)]">That address does not exist here. Let us take you back to safe ground.</p>
  <div class="mt-7 flex flex-wrap justify-center gap-3">
    <a href="{{ route('home') }}" class="btn-glow rounded-xl px-5 py-3 text-sm font-bold">Back to home</a>
    <a href="{{ route('dashboard') }}" class="btn-ghost rounded-xl px-5 py-3 text-sm">Open dashboard</a>
    <a href="{{ route('mahasiswa.show', ['nrp' => $student['nrp']]) }}" class="btn-ghost rounded-xl px-5 py-3 text-sm">See my profile</a>
  </div>
</section>
@endsection
