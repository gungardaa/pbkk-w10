@extends('layouts.app')

@section('title', 'Arda Nareswara, Warm Welcome from ITS')

@section('content')
@if (! empty($user ?? null))
  <x-status-banner type="success" class="mt-8">Selamat datang, {{ $user }}!</x-status-banner>
@endif
<section class="grid items-start gap-6 pt-12 lg:grid-cols-[1.15fr_.85fr]">
  <div class="rise rise-1">
    <span class="badge">ITS routing sandbox</span>
    <h1 class="font-display mt-5 text-5xl font-bold leading-[1.02] tracking-tight md:text-6xl">
      Warm welcome<br>
      <span style="color:var(--hairline);text-shadow:0 0 24px rgba(77,243,255,.4)">from ITS Surabaya</span>
    </h1>
    <p class="mt-5 max-w-xl text-[15px] leading-relaxed text-[var(--body)]">
      I am {{ $student['short_name'] }}. I study {{ $student['department'] }} at {{ $student['faculty'] }}.
      This tiny site is my routing playground. Every button here moves through a named Laravel route.
      No link is hardcoded. Everything goes through the route table.
    </p>
    <div class="mt-7 flex flex-wrap gap-3">
      <a href="{{ route('mahasiswa.show', ['nrp' => $student['nrp']]) }}" class="btn-glow rounded-xl px-5 py-3 text-sm font-bold">See my full profile</a>
      <a href="{{ route('agent.show') }}" class="btn-ghost rounded-xl px-5 py-3 text-sm">Meet my agent ideas</a>
      <a href="{{ route('dashboard.index') }}" class="btn-ghost rounded-xl px-5 py-3 text-sm">Open dashboard</a>
    </div>
    <div class="mt-8 grid max-w-xl grid-cols-3 gap-3 text-center">
      <div class="card p-4">
        <p class="font-display text-2xl font-bold">3</p>
        <p class="mt-1 text-xs text-[var(--body)]">Core routes live</p>
      </div>
      <div class="card p-4">
        <p class="font-display text-2xl font-bold">10</p>
        <p class="mt-1 text-xs text-[var(--body)]">Digits in each NRP</p>
      </div>
      <div class="card p-4">
        <p class="font-display text-2xl font-bold">1</p>
        <p class="mt-1 text-xs text-[var(--body)]">Agent idea plus default</p>
      </div>
    </div>
  </div>

  <div class="rise rise-2">
    <div class="terminal overflow-hidden" data-theme="dark">
      <div class="flex items-center gap-2 border-b border-cyan-200/10 px-5 py-3">
        <span class="terminal-dot" style="background:#FF5F57"></span>
        <span class="terminal-dot" style="background:#FEBC2E"></span>
        <span class="terminal-dot" style="background:#28C840"></span>
        <span class="font-mono2 ml-3 text-xs text-[var(--body)]">route console, live</span>
      </div>
      <div class="space-y-2 px-5 py-5 font-mono2 text-[13px] leading-relaxed">
        <p><span style="color:var(--hairline)">$</span> <span class="text-[var(--ink)]">php artisan route list</span></p>
        <p class="text-[var(--muted)]">GET / <span style="color:var(--acc2)">home</span></p>
        <p class="text-[var(--muted)]">GET /mahasiswa <span id="typedNrp">5025241074</span> <span style="color:var(--acc2)">mahasiswa.show</span></p>
        <p class="text-[var(--muted)]">GET /agent <span id="typedTema">magentic</span> <span style="color:var(--acc2)">agent.show</span></p>
        <p><span style="color:var(--hairline)">$</span> <span class="caret text-[var(--ink)]">try my NRP below</span></p>
        <div class="mt-3 rounded-xl border border-cyan-200/15 bg-[var(--panel)] p-3">
          <label for="nrpInput" class="text-xs text-[var(--body)]">Type an NRP to test the 10 digit guard</label>
          <input id="nrpInput" maxlength="12" inputmode="numeric" value="5025241074"
            class="font-mono2 mt-2 w-full rounded-lg border border-cyan-200/20 bg-[var(--canvas)] px-3 py-2 text-sm text-[var(--ink)] placeholder:text-slate-500"
            placeholder="Try 5025241074">
          <p id="nrpHint" class="mt-2 text-xs text-[var(--acc2)]">Valid NRP. The profile route will open.</p>
          <a id="nrpGo" href="{{ route('mahasiswa.show', ['nrp' => $student['nrp']]) }}" class="btn-glow mt-3 inline-block rounded-lg px-4 py-2 text-xs font-bold">Open profile route</a>
        </div>
      </div>
    </div>

    <div class="card mt-5 p-6">
      <div class="flex items-center gap-4">
        <div class="font-display grid h-14 w-14 shrink-0 place-items-center rounded-2xl text-lg font-bold text-[var(--on-accent)]" style="background:linear-gradient(135deg,var(--hairline),var(--acc2));box-shadow:0 0 24px rgba(77,243,255,.35)">AN</div>
        <div>
          <p class="font-display text-lg font-bold">{{ $student['full_name'] }}</p>
          <p class="font-mono2 text-xs text-[var(--body)]">{{ $student['nrp'] }} with {{ $student['department'] }}</p>
        </div>
      </div>
      <p class="mt-4 text-sm leading-relaxed text-[var(--body)]">{{ $student['tagline'] }}</p>
      <div class="mt-4 flex flex-wrap gap-2">
        @foreach (array_slice($student['skills'], 0, 4) as $skill)
          <span class="badge">{{ $skill }}</span>
        @endforeach
      </div>
    </div>
  </div>
</section>

<section class="reveal mt-14">
  <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">ROUTE MAP</p>
  <h2 class="font-display mt-2 text-3xl font-bold">Every required route in one glance</h2>
  <div class="mt-6 grid gap-4 md:grid-cols-3">
    <a href="{{ route('mahasiswa.show', ['nrp' => $student['nrp']]) }}" class="card block p-6">
      <p class="badge w-fit">Required</p>
      <h3 class="font-display mt-4 text-xl font-bold">Student profile</h3>
      <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">Opens my full story by NRP. Only a 10 digit number can pass the guard.</p>
      <p class="font-mono2 mt-4 text-xs text-[var(--acc2)]">/mahasiswa/{{ $student['nrp'] }}</p>
    </a>
    <a href="{{ route('agent.show') }}" class="card block p-6">
      <p class="badge w-fit">Start here</p>
      <h3 class="font-display mt-4 text-xl font-bold">Agent ideas</h3>
      <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">Open the agent index to meet every idea. Empty theme falls back to the general helper.</p>
      <p class="font-mono2 mt-4 text-xs text-[var(--acc2)]">/agent</p>
    </a>
    <a href="{{ route('ipk.hitung', ['ip1' => '3.50', 'ip2' => '3.80']) }}" class="card block p-6">
      <p class="badge w-fit">Challenge</p>
      <h3 class="font-display mt-4 text-xl font-bold">GPA calculator</h3>
      <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">Adds two semester scores and shows the average with a kind note.</p>
      <p class="font-mono2 mt-4 text-xs text-[var(--acc2)]">/hitung-ipk/3.50/3.80</p>
    </a>
  </div>
</section>

<section class="reveal mt-14 grid gap-4 lg:grid-cols-1">
  @php($a = $agents['magentic'])
  <a href="{{ route('agent.show', ['tema' => 'magentic']) }}" class="card block p-7">
    <p class="font-mono2 text-xs text-[var(--hairline)]">AGENT IDEA</p>
    <h3 class="font-display mt-2 text-2xl font-bold">{{ $a['name'] }}</h3>
    <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">{{ $a['short'] }}</p>
    <span class="btn-ghost mt-5 inline-block rounded-xl px-4 py-2 text-sm">Read the plan</span>
  </a>
</section>
@endsection

@push('scripts')
<script>
  const nrpInput = document.getElementById('nrpInput');
  const nrpHint = document.getElementById('nrpHint');
  const nrpGo = document.getElementById('nrpGo');
  const typedNrp = document.getElementById('typedNrp');
  const baseProfile = @json(route('mahasiswa.show', ['nrp' => '0000000000'])).replace('0000000000', '');
  const ok = (v) => /^[0-9]{10}$/.test(v);
  if (nrpInput) {
    nrpInput.addEventListener('input', () => {
      const v = nrpInput.value.trim();
      if (typedNrp) typedNrp.textContent = v || '----------';
      if (ok(v)) {
        nrpHint.textContent = 'Valid NRP. The profile route will open.';
        nrpHint.style.color = 'var(--acc2)';
        nrpGo.setAttribute('href', baseProfile + v);
        nrpGo.style.opacity = '1';
        nrpGo.style.pointerEvents = 'auto';
      } else {
        nrpHint.textContent = 'Needs exactly 10 digits. Try 5025241074.';
        nrpHint.style.color = 'var(--danger)';
        nrpGo.style.opacity = '.45';
        nrpGo.style.pointerEvents = 'none';
      }
    });
  }
  const temas = ['magentic', 'general-assistant-agent'];
  const typedTema = document.getElementById('typedTema');
  let ti = 0;
  if (typedTema && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    setInterval(() => { ti = (ti + 1) % temas.length; typedTema.textContent = temas[ti]; }, 2200);
  }
</script>
@endpush
