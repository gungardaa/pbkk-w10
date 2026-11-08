<a {{ $attributes->merge(['class' => 'nav-link inline-flex items-center gap-1 text-sm font-medium text-[var(--body)] hover:text-[var(--hairline)] dark:hover:text-[var(--hairline)] focus:outline-none focus:ring-2 focus:ring-[var(--hairline)] focus:ring-offset-2 transition ease-in-out duration-150', $attributes->except('class')]) }}>
    {{ $slot }}
</a>