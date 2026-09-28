@props(['title' => null, 'kicker' => null])

<div {{ $attributes->merge(['class' => 'card p-8']) }}>
  @if ($kicker)
    <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">{{ $kicker }}</p>
  @endif
  @if ($title)
    <h3 class="font-display mt-2 text-2xl font-bold">{{ $title }}</h3>
  @endif
  <div class="mt-4">{{ $slot }}</div>
</div>
