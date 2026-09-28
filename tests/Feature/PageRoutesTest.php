<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageRoutesTest extends TestCase
{
    public function test_beranda_greets_user_param(): void
    {
        $this->get('/beranda?user=Andi')->assertOk()->assertSee('Selamat datang, Andi!');
        $this->get('/?user=Andi')->assertOk()->assertSee('Selamat datang, Andi!');
        $this->get('/')->assertOk()->assertDontSee('Selamat datang,');
    }

    public function test_profil_mahasiswa_renders(): void
    {
        $this->get('/profil-mahasiswa')->assertOk()->assertSee('Anak Agung Putu Arda Nareswara');
    }

    public function test_ide_agent_shows_magentic(): void
    {
        $ide = $this->get('/ide-agent')->assertOk()->assertSee('MAGENTIC');
        $magentic = $this->get('/agent/magentic')->assertOk();

        // Same body; only the header differs (active nav item, toggle URL).
        $strip = fn (string $h): string => (string) preg_replace('#<header.*?</header>#s', '', $h);
        $this->assertSame($strip($magentic->getContent()), $strip($ide->getContent()));
    }

    public function test_theme_toggle_and_persistence(): void
    {
        $this->get('/ide-agent')->assertSee('data-theme="dark"', false);
        $this->get('/ide-agent?mode=light')->assertSee('data-theme="light"', false);

        // Persists through the session across pages.
        $this->get('/ide-agent?mode=light');
        $this->get('/profil-mahasiswa')->assertSee('data-theme="light"', false);
        $this->get('/agent')->assertSee('data-theme="light"', false);

        $this->get('/agent/magentic?mode=dark')->assertSee('data-theme="dark"', false);
    }

    public function test_navbar_has_no_ide_agent_link_and_agents_stays_active(): void
    {
        $html = $this->get('/ide-agent')->getContent();

        $this->assertStringNotContainsString('>Ide Agent<', $html);
        preg_match('#<a href="[^"]*" class="nav-link active">([^<]*)</a>#', $html, $m);
        $this->assertSame('Agents', $m[1] ?? null);
    }

    public function test_legacy_routes_still_work(): void
    {
        $this->get('/mahasiswa/5025241074')->assertOk();
        $this->get('/agent')->assertOk();
        $this->get('/agent/magentic')->assertOk();
    }
}
