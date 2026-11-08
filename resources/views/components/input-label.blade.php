@props(['value' => null])

<label {{ $attributes->merge(['class' => 'block font-mono2 text-xs uppercase tracking-wider text-[var(--body)] mb-2 font-medium']) }}>
    {{ $value ?? $slot }}
</label>
