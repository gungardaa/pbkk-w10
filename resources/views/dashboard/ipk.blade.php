@extends('layouts.app')

@section('title', 'GPA Form, Dashboard')

@section('content')
<section class="mx-auto max-w-3xl pt-12">
  <a href="{{ route('dashboard') }}" class="btn-ghost inline-block rounded-xl px-4 py-2 text-sm">Back to dashboard</a>
  <div class="card mt-6 p-8 md:p-10">
    <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">INTERACTIVE GPA FORM</p>
    <h1 class="font-display mt-3 text-4xl font-bold">Type two scores, get the link</h1>
    <p class="mt-3 text-sm leading-relaxed text-[var(--body)]">Scores must stay inside 0 to 4. The button below builds a real named route link as you type.</p>
    <div class="mt-7 grid gap-4 md:grid-cols-2">
      <div>
        <label for="score1" class="text-sm text-[var(--ink)]">First semester score</label>
        <input id="score1" value="3.50" inputmode="decimal" class="mt-2 w-full rounded-xl border border-cyan-200/20 bg-[var(--canvas)] px-4 py-3 text-sm text-[var(--ink)]" placeholder="Try 3.50">
      </div>
      <div>
        <label for="score2" class="text-sm text-[var(--ink)]">Second semester score</label>
        <input id="score2" value="3.80" inputmode="decimal" class="mt-2 w-full rounded-xl border border-cyan-200/20 bg-[var(--canvas)] px-4 py-3 text-sm text-[var(--ink)]" placeholder="Try 3.80">
      </div>
    </div>
    <p id="gpaHint" class="mt-4 text-sm text-[var(--acc2)]">Looks good. Ready to calculate.</p>
    <div class="mt-4 flex flex-wrap gap-3">
      <a id="gpaGo" href="{{ route('ipk.hitung', ['ip1' => '3.50', 'ip2' => '3.80']) }}" class="btn-glow rounded-xl px-5 py-3 text-sm font-bold">Calculate now</a>
      <button id="gpaFill" type="button" class="btn-ghost rounded-xl px-5 py-3 text-sm">Fill sample scores</button>
    </div>
    <p class="font-mono2 mt-6 break-all text-xs text-[var(--muted)]" id="gpaPreview"></p>
  </div>
</section>
@endsection

@push('scripts')
<script>
  const s1 = document.getElementById('score1');
  const s2 = document.getElementById('score2');
  const go = document.getElementById('gpaGo');
  const hint = document.getElementById('gpaHint');
  const prev = document.getElementById('gpaPreview');
  const fill = document.getElementById('gpaFill');
  const base = @json(route('ipk.hitung', ['ip1' => '0', 'ip2' => '0'])).replace('/0/0', '');
  const good = (v) => v !== '' && !isNaN(Number(v)) && Number(v) >= 0 && Number(v) <= 4;
  function sync() {
    const a = s1.value.trim(); const b = s2.value.trim();
    if (good(a) && good(b)) {
      go.setAttribute('href', base + '/' + a + '/' + b);
      go.style.opacity = '1'; go.style.pointerEvents = 'auto';
      hint.textContent = 'Looks good. Ready to calculate.';
      hint.style.color = 'var(--acc2)';
      prev.textContent = 'Preview link ' + base + '/' + a + '/' + b;
    } else {
      hint.textContent = 'Scores must be numbers inside 0 to 4.';
      hint.style.color = 'var(--danger)';
      go.style.opacity = '.45'; go.style.pointerEvents = 'none';
      prev.textContent = '';
    }
  }
  s1.addEventListener('input', sync); s2.addEventListener('input', sync);
  fill.addEventListener('click', () => { s1.value = '3.50'; s2.value = '3.80'; sync(); });
  sync();
</script>
@endpush
