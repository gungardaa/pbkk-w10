@extends('layouts.app')

@section('title', 'Student Profile, Arda Nareswara')

@section('content')
<section class="pt-12">
  <a href="{{ isset($fromDashboard) ? route('dashboard.index') : route('home') }}" class="btn-ghost inline-block rounded-xl px-4 py-2 text-sm">Back {{ isset($fromDashboard) ? 'to dashboard' : 'to home' }}</a>
  <div class="mt-6 grid gap-6 lg:grid-cols-[.9fr_1.1fr]">
    <div class="card reveal visible p-8 lg:sticky lg:top-24 lg:self-start">
      <div class="font-display grid h-20 w-20 place-items-center rounded-2xl text-2xl font-bold text-[var(--on-accent)]" style="background:linear-gradient(135deg,var(--hairline),#76A8FF);box-shadow:0 0 30px rgba(77,243,255,.35)">AN</div>
      <h1 class="font-display mt-5 text-4xl font-bold leading-tight">{{ $student['full_name'] }}</h1>
      <p class="mt-2 text-sm text-[var(--body)]">Call me {{ $student['short_name'] }}. Informatics student in Surabaya.</p>
      <div class="mt-6 space-y-3 text-sm">
        <div class="flex justify-between gap-4 border-b border-cyan-200/10 pb-3">
          <span class="text-[var(--muted)]">NRP</span><span class="font-mono2">{{ $student['nrp'] }}</span>
        </div>
        <div class="flex justify-between gap-4 border-b border-cyan-200/10 pb-3">
          <span class="text-[var(--muted)]">Department</span><span class="text-right">{{ $student['department'] }}</span>
        </div>
        <div class="flex justify-between gap-4 border-b border-cyan-200/10 pb-3">
          <span class="text-[var(--muted)]">Campus</span><span class="text-right">{{ $student['faculty'] }}</span>
        </div>
        <div class="flex justify-between gap-4 border-b border-cyan-200/10 pb-3">
          <span class="text-[var(--muted)]">Batch</span><span>{{ $student['batch'] }}</span>
        </div>
        <div class="flex justify-between gap-4 border-b border-cyan-200/10 pb-3">
          <span class="text-[var(--muted)]">Email</span><span class="font-mono2 break-all text-right text-[13px]">{{ $student['email'] }}</span>
        </div>
        <div class="flex justify-between gap-4">
          <span class="text-[var(--muted)]">Base</span><span>{{ $student['location'] }}</span>
        </div>
      </div>
      <div class="mt-6 flex flex-wrap gap-2">
        @foreach ($student['skills'] as $skill)
          <span class="badge">{{ $skill }}</span>
        @endforeach
      </div>
    </div>

    <div class="space-y-5">
      <x-info-card kicker="ABOUT ME" class="reveal visible">
        <p class="leading-relaxed text-[var(--ink)]">{{ $student['bio'] }}</p>
        <div class="mt-5 flex flex-wrap gap-2">
          @foreach ($student['interests'] as $item)
            <span class="rounded-full border border-cyan-200/20 px-3 py-1 text-xs text-[var(--body)]">{{ $item }}</span>
          @endforeach
        </div>
      </x-info-card>
      <x-info-card kicker="STUDY PATH AND EXPERIENCES" class="reveal visible">
        <div class="space-y-5">
          @foreach ($student['history'] as $h)
            <div class="flex gap-4">
              <div class="flex flex-col items-center">
                <span class="h-3 w-3 rounded-full" style="background:var(--hairline);box-shadow:0 0 12px var(--hairline)"></span>
                <span class="w-px flex-1 bg-cyan-200/15"></span>
              </div>
              <div class="pb-1">
                <p class="font-mono2 text-xs text-[var(--acc2)]">{{ $h['period'] }}</p>
                <p class="font-display mt-1 font-bold">{{ $h['title'] }}</p>
                <p class="mt-1 text-sm leading-relaxed text-[var(--body)]">{{ $h['detail'] }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </x-info-card>
      <x-info-card kicker="ORGANIZATION" class="reveal visible">
        <div class="space-y-5">
          @foreach ($student['organizations'] as $o)
            <div class="flex gap-4">
              <div class="flex flex-col items-center">
                <span class="h-3 w-3 rounded-full" style="background:var(--acc2);box-shadow:0 0 12px var(--acc2)"></span>
                <span class="w-px flex-1 bg-cyan-200/15"></span>
              </div>
              <div class="pb-1">
                <p class="font-mono2 text-xs text-[var(--acc2)]">{{ $o['period'] }}</p>
                <p class="font-display mt-1 font-bold">{{ $o['title'] }}</p>
                <p class="mt-1 text-sm leading-relaxed text-[var(--body)]">{{ $o['detail'] }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </x-info-card>
      <x-info-card kicker="LANGUAGES AND STRENGTHS" class="reveal visible">
        <div class="space-y-2 text-sm text-[var(--ink)]">
          @foreach ($student['languages'] as $lang)
            <p class="flex gap-3"><span class="mt-1 grid h-5 w-5 shrink-0 place-items-center rounded-full text-[11px] font-bold text-[var(--on-accent)]" style="background:var(--hairline)">✓</span><span>{{ $lang }}</span></p>
          @endforeach
        </div>
        <div class="mt-4 flex flex-wrap gap-2">
          @foreach ($student['soft_skills'] as $soft)
            <span class="rounded-full border border-cyan-200/20 px-3 py-1 text-xs text-[var(--body)]">{{ $soft }}</span>
          @endforeach
        </div>
      </x-info-card>
      <div class="flex flex-wrap gap-3">
        <a href="{{ route('agent.show') }}" class="btn-glow rounded-xl px-5 py-3 text-sm font-bold">See agent ideas</a>
        <a href="{{ route('ipk.hitung', ['ip1' => '3.50', 'ip2' => '3.80']) }}" class="btn-ghost rounded-xl px-5 py-3 text-sm">Try GPA calc</a>
      </div>
    </div>
  </div>
</section>
@endsection
