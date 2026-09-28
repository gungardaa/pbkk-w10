<?php

namespace App\Support;

/**
 * Central dummy data for the academic profile sandbox.
 *
 * Keeps route closures slim and readable.
 */
class AcademicData
{
    /**
     * Main student profile shown on home and detail pages.
     *
     * @return array<string, mixed>
     */
    public static function student(): array
    {
        return [
            'short_name' => 'Arda Nareswara',
            'full_name' => 'Anak Agung Putu Arda Nareswara',
            'nrp' => '5025241074',
            'department' => 'Informatics Engineering',
            'faculty' => 'Institut Teknologi Sepuluh Nopember',
            'batch' => '2024',
            'semester' => 'Semester 5',
            'email' => '5025241074@student.its.ac.id',
            'location' => 'Sukolilo, Surabaya',
            'tagline' => 'Math minded builder. From math competitions to robots to web apps.',
            'bio' => 'I am an informatics student at ITS in semester 5. I started from math competitions in high school, then learned embedded programming through ITS Robocon. Now I focus on web routes, clean code and agentic AI ideas that do real work, not just chat.',
            'interests' => ['Laravel routing', 'Agentic AI', 'Embedded basics', 'Campus automation'],
            'skills' => ['C', 'C++', 'Python', 'Laravel', 'PHP', 'Linux', 'GitHub', 'Google Workspace'],
            'languages' => [
                'Indonesian native with UKBI score 670',
                'English intermediate with TEFL score 530',
            ],
            'soft_skills' => ['Problem solving', 'Time management', 'Teamwork', 'Attention to detail', 'Adaptability'],
            'history' => [
                [
                    'period' => '2024 to now',
                    'title' => 'Informatics ITS',
                    'detail' => 'Batch 2024, now in semester 5. Focus on programming, web framework lab and agentic AI study.',
                ],
                [
                    'period' => 'Sep 2024 to Oct 2024',
                    'title' => 'ITS Robocon, programming intern',
                    'detail' => 'Learned embedded programming and built robot control with C++ OOP on STM32. Worked on Linux with GitHub. Used ROS to simulate movement, create nodes and test basic navigation.',
                ],
                [
                    'period' => 'Jul 2021 to May 2024',
                    'title' => 'SMA Negeri 4 Denpasar',
                    'detail' => 'Science track with final score 91.53 out of 100. Chairman of the Mathematics Club who taught 20 plus members and kept neat activity records. Ranked 5th in OSN math at city level in 2022 and 7th in 2023.',
                ],
            ],
            'organizations' => [
                [
                    'period' => 'Dec 2025 to Jan 2026',
                    'title' => 'KPU PPU HMTC, admin staff',
                    'detail' => 'Handled docs for election candidates. Checked accuracy and format of official letters. Made reusable letter templates for the team.',
                ],
                [
                    'period' => 'Aug 2025 to Oct 2025',
                    'title' => 'GENICS, secretariat division',
                    'detail' => 'Ran forms for attendance and participant data. Kept records, docs and certificates tidy. Wrote meeting notes and sent broadcast updates.',
                ],
            ],
        ];
    }

    /**
     * Agentic AI ideas keyed by theme slug.
     *
     * @return array<string, array<string, mixed>>
     */
    public static function agents(): array
    {
        return [
            'magentic' => [
                'name' => 'MAGENTIC',
                'slug' => 'magentic',
                'short' => 'A collaborative web-based development environment powered by Agentic AI seamlessly integrated with GitHub.',
                'problem' => 'Code editor, GitHub, AI assistant, and collaboration tools live separately, constantly breaking developer focus and context.',
                'how' => 'One browser workspace combines code editing, GitHub repos, real-time collaboration, and autonomous AI agents. The agent analyzes the codebase, forms a plan, executes changes, and verifies the result.',
                'why_agentic' => 'Unlike a standard chat model that only responds, this agent reasons about project architecture, proposes solutions, and executes development tasks on its own.',
                'features' => [
                    'Agentic AI that analyzes code, detects bugs, and executes workflows',
                    'GitHub integration: visual clone, commit, branches, and pull requests',
                    'Real-time collaboration with multiple cursors and live presence',
                    'VS Code-like environment with Monaco Editor and web terminal',
                ],
                'stack' => ['Monaco Editor', 'Laravel', 'Custom Agent + LLM API', 'GitHub REST & GraphQL', 'WebSockets / Reverb'],
            ],
            'general-assistant-agent' => [
                'name' => 'General Assistant Agent',
                'slug' => 'general-assistant-agent',
                'short' => 'Concierge that reads your goal and sends you to the right specialist.',
                'problem' => 'Students face many agents and tools. They waste time asking the wrong one. Context gets lost between chats.',
                'how' => 'This concierge reads your goal in plain words. It picks the best specialist for the job. It passes your context along so you never repeat yourself. It watches stuck tasks and nudges you before deadlines.',
                'why_agentic' => 'A normal chatbot waits and forgets. This concierge keeps memory across weeks. It routes work on its own. It follows up without being asked.',
                'features' => [
                    'Reads your goal and picks the right specialist',
                    'Passes context along with zero retyping',
                    'One memory across your work',
                    'Nudges you when a task gets stuck',
                ],
                'stack' => ['Laravel', 'Agent router', 'Memory store', 'Reminder worker'],
            ],
        ];
    }

    /**
     * Find one agent by theme slug with fallback to general.
     */
    public static function findAgent(?string $theme): array
    {
        $agents = self::agents();

        if ($theme === null || $theme === '') {
            return $agents['general-assistant-agent'];
        }

        $key = strtolower(trim($theme));

        return $agents[$key] ?? $agents['general-assistant-agent'];
    }

    /**
     * Check if a theme slug is a real agent or a fallback.
     */
    public static function isFallbackTheme(?string $theme): bool
    {
        if ($theme === null || $theme === '') {
            return true;
        }

        return ! isset(self::agents()[strtolower(trim($theme))]);
    }
}
