@props(['type' => 'info'])

@php($styles = [
  'success' => 'border-[var(--hairline)] bg-[var(--panel)] text-[var(--ink)]',
  'info' => 'border-cyan-200/15 bg-[var(--panel)] text-[var(--body)]',
  'error' => 'border-rose-300/30 bg-rose-300/5 text-rose-400',
][$type] ?? 'border-cyan-200/15 bg-[var(--panel)] text-[var(--body)]')

<div {{ $attributes->merge(['class' => 'rounded-xl border p-4 text-sm leading-relaxed '.$styles]) }} role="status">
  {{ $slot }}
</div>
