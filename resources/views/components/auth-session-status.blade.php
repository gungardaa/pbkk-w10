<div {{ $attributes->merge(['class' => 'rounded-xl border p-4 text-sm leading-relaxed text-[var(--ink)] bg-[var(--panel)] border-t border-cyan-200/15 border-b border-cyan-200/15', $attributes->except('class')]) }}>
    {{ $slot }}
</div>