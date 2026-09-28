@extends('layouts.app')

@section('title', 'GPA Calculator Result')

@section('content')
<section class="mx-auto max-w-3xl pt-12">
  <a href="{{ route('dashboard.ipk') }}" class="btn-ghost inline-block rounded-xl px-4 py-2 text-sm">Back to GPA form</a>

  <div class="card mt-6 p-8 text-center md:p-10">
    <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">GPA CALCULATOR</p>
    @if (! empty($error))
      <h1 class="font-display mt-3 text-4xl font-bold">Hmm, that input needs a fix</h1>
      <p class="mx-auto mt-3 max-w-md text-sm leading-relaxed text-[var(--body)]">{{ $error }}</p>
      <p class="font-mono2 mt-4 text-xs text-[var(--muted)]">You sent {{ $ip1 }} and {{ $ip2 }}</p>
      <div class="mt-6 flex flex-wrap justify-center gap-3">
        <a href="{{ route('ipk.hitung', ['ip1' => '3.50', 'ip2' => '3.80']) }}" class="btn-glow rounded-xl px-5 py-3 text-sm font-bold">Try a good example</a>
        <a href="{{ route('dashboard.ipk') }}" class="btn-ghost rounded-xl px-5 py-3 text-sm">Open the form</a>
      </div>
    @else
      <h1 class="font-display mt-3 text-4xl font-bold md:text-5xl">Your average is {{ $average }}</h1>
      <p class="mt-3 text-sm text-[var(--body)]">{{ $predicate }}</p>
      <div class="mx-auto mt-8 grid max-w-lg grid-cols-3 gap-3">
        <div class="rounded-2xl border border-cyan-200/15 bg-[var(--panel)] p-5">
          <p class="font-mono2 text-xs text-[var(--muted)]">FIRST</p>
          <p class="font-display mt-1 text-3xl font-bold">{{ $ip1 }}</p>
        </div>
        <div class="rounded-2xl border border-cyan-200/15 bg-[var(--panel)] p-5">
          <p class="font-mono2 text-xs text-[var(--muted)]">SECOND</p>
          <p class="font-display mt-1 text-3xl font-bold">{{ $ip2 }}</p>
        </div>
        <div class="rounded-2xl border p-5" style="border-color:rgba(77,243,255,.4);background:rgba(77,243,255,.07)">
          <p class="font-mono2 text-xs text-[var(--hairline)]">TOTAL</p>
          <p class="font-display mt-1 text-3xl font-bold">{{ $total }}</p>
        </div>
      </div>
      <div class="mt-6 overflow-x-auto">
        <p class="font-mono2 whitespace-nowrap text-xs text-[var(--muted)]">Math used here is total divided by 2. Scores stay inside 0 to 4.</p>
      </div>
      <div class="mt-6 flex flex-wrap justify-center gap-3">
        <a href="{{ route('dashboard.ipk') }}" class="btn-glow rounded-xl px-5 py-3 text-sm font-bold">Calculate again</a>
        <a href="{{ route('mahasiswa.show', ['nrp' => $student['nrp']]) }}" class="btn-ghost rounded-xl px-5 py-3 text-sm">Back to profile</a>
      </div>
    @endif
  </div>
</section>
@endsection
