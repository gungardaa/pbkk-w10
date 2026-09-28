@extends('layouts.app')

@section('title', $agent['name'] . ', Agentic AI Idea')

@section('content')
@if ($agent['slug'] === 'magentic')
  @include('agent.magentic')
@else
<section class="pt-12">
  <div class="flex flex-wrap items-center gap-3">
    <a href="{{ isset($fromDashboard) ? route('dashboard.index') : route('home') }}" class="btn-ghost rounded-xl px-4 py-2 text-sm">Back {{ isset($fromDashboard) ? 'to dashboard' : 'to home' }}</a>
    @if ($isFallback && ! empty($requested))
      <span class="badge">Fallback active, showing default</span>
    @endif
    @if (empty($requested))
      <span class="badge">Default theme</span>
    @endif
  </div>

  <div class="mt-6 grid gap-6 lg:grid-cols-[1.1fr_.9fr]">
    <div class="card rise rise-1 p-8">
      <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">AGENTIC AI IDEA</p>
      <h1 class="font-display mt-3 text-4xl font-bold leading-tight md:text-5xl">{{ $agent['name'] }}</h1>
      <p class="mt-3 text-[15px] text-[var(--body)]">{{ $agent['short'] }}</p>
      @if ($isFallback && ! empty($requested))
        <p class="mt-4 rounded-xl border border-amber-200/20 bg-amber-200/5 p-4 text-sm leading-relaxed text-amber-100">
          I could not find anything called {{ $requested }}. So I show the general helper instead. Pick the magentic idea below.
        </p>
      @endif
      <div class="mt-6 space-y-5 text-sm leading-relaxed">
        <div>
          <p class="font-display font-bold text-[var(--ink)]">The problem it solves</p>
          <p class="mt-1 text-[var(--body)]">{{ $agent['problem'] }}</p>
        </div>
        <div>
          <p class="font-display font-bold text-[var(--ink)]">How it works step by step</p>
          <p class="mt-1 text-[var(--body)]">{{ $agent['how'] }}</p>
        </div>
        <div>
          <p class="font-display font-bold text-[var(--ink)]">Why a plain chatbot cannot do this</p>
          <p class="mt-1 text-[var(--body)]">{{ $agent['why_agentic'] }}</p>
        </div>
      </div>
    </div>

    <div class="space-y-5">
      <div class="card rise rise-2 p-7">
        <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">WHAT IT DOES</p>
        <ul class="mt-4 space-y-3 text-sm text-[var(--ink)]">
          @foreach ($agent['features'] as $f)
            <li class="flex gap-3">
              <span class="mt-1 grid h-5 w-5 shrink-0 place-items-center rounded-full text-[11px] font-bold text-[var(--on-accent)]" style="background:var(--hairline)">✓</span>
              <span>{{ $f }}</span>
            </li>
          @endforeach
        </ul>
        <p class="font-mono2 mt-5 text-xs tracking-widest text-[var(--muted)]">LIKELY STACK</p>
        <div class="mt-2 flex flex-wrap gap-2">
          @foreach ($agent['stack'] as $s)
            <span class="badge">{{ $s }}</span>
          @endforeach
        </div>
      </div>
      <div class="card rise rise-3 p-7">
        <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">TRY ANOTHER THEME</p>
        <div class="mt-4 grid gap-3">
          @foreach ($agents as $slug => $a)
            @if ($slug !== $agent['slug'])
            <a href="{{ isset($fromDashboard) ? route('dashboard.agent', ['tema' => $slug]) : route('agent.show', ['tema' => $slug]) }}"
              class="btn-ghost flex items-center justify-between rounded-xl px-4 py-3 text-sm">
              <span>{{ $a['name'] }}</span>
              <span class="font-mono2 text-xs text-[var(--acc2)]">/agent/{{ $slug }}</span>
            </a>
            @endif
          @endforeach
          <a href="{{ isset($fromDashboard) ? route('dashboard.agent') : route('agent.show') }}" class="btn-glow rounded-xl px-4 py-3 text-center text-sm font-bold">Open with empty theme</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endif
@endsection
