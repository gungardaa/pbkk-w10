{{-- MAGENTIC pitch, ported from Tugas-1 /project-idea and re-skinned to Tugas-3 tokens. --}}
<section class="pt-12">
  <div class="flex flex-wrap items-center gap-3">
    <a href="{{ isset($fromDashboard) ? route('dashboard.index') : route('home') }}" class="btn-ghost rounded-xl px-4 py-2 text-sm">Back {{ isset($fromDashboard) ? 'to dashboard' : 'to home' }}</a>
    <span class="badge">Magentic theme</span>
    <span class="font-mono2 text-xs text-[var(--acc2)]">/agent/magentic</span>
  </div>

  {{-- 1. HERO --}}
  <div class="relative mt-6 overflow-hidden px-2 py-16 text-center md:py-24">
    <div class="glow-orb left-1/2 top-1/3 h-[380px] w-[680px] -translate-x-1/2 -translate-y-1/2" style="background:rgba(77,243,255,.10)"></div>
    <div class="relative">
      <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">MAGENTIC</p>
      <h1 class="font-display mt-4 bg-gradient-to-b from-white to-gray-500 bg-clip-text text-6xl font-extrabold tracking-tighter text-transparent md:text-8xl">MAGENTIC</h1>
      <p class="mt-4 text-xl font-light tracking-wide text-[var(--body)] md:text-2xl">The Next Generation of Web-Based Development.</p>
      <h2 class="font-display mt-8 text-3xl font-bold text-[var(--hairline)] md:text-5xl" style="text-shadow:0 0 25px rgba(77,243,255,.6)">MAJESTIC IN EVERY LINE.</h2>
      <p class="mx-auto mt-6 max-w-3xl text-lg leading-relaxed text-[var(--ink)]">A collaborative web-based development environment powered by Agentic AI seamlessly integrated with GitHub.</p>
      <div class="mt-10 flex flex-col justify-center gap-4 sm:flex-row">
        <a href="#features" class="btn-glow rounded-full px-8 py-4 text-lg font-bold">Explore the Project</a>
        <a href="#architecture" class="btn-ghost rounded-full px-8 py-4 text-lg font-bold">View Architecture</a>
      </div>
    </div>
  </div>

  {{-- UI mockup: editor + agent chat side by side --}}
  <div class="terminal overflow-hidden text-left" data-theme="dark">
    <div class="flex items-center justify-between border-b border-cyan-200/10 px-4 py-3">
      <div class="flex gap-2">
        <span class="terminal-dot" style="background:#FF5F57"></span>
        <span class="terminal-dot" style="background:#FEBC2E"></span>
        <span class="terminal-dot" style="background:#28C840"></span>
      </div>
      <div class="font-mono2 flex gap-4 text-xs text-[var(--body)]">
        <span class="flex items-center gap-1"><span class="h-2 w-2 rounded-full bg-blue-400"></span> Arda</span>
        <span class="flex items-center gap-1"><span class="h-2 w-2 rounded-full bg-amber-500"></span> Aji</span>
        <span class="flex items-center gap-1"><span class="h-2 w-2 rounded-full" style="background:var(--hairline)"></span> Agent</span>
      </div>
    </div>
    <div class="flex flex-1 flex-col lg:flex-row">
      <div class="min-w-0 flex-1 overflow-x-auto p-6 font-mono text-sm leading-loose text-gray-300">
        <div><span class="text-pink-400">public</span> <span class="text-blue-400">function</span> <span class="text-yellow-200">authenticate</span>(<span class="text-orange-300">Request</span> <span class="text-blue-200">$request</span>) {</div>
        <div class="pl-8 italic text-gray-500">// Validate incoming request</div>
        <div class="pl-8"><span class="text-blue-200">$credentials</span> = <span class="text-blue-200">$request</span>-&gt;<span class="text-yellow-200">validate</span>([</div>
        <div class="pl-16"><span class="text-green-300">'email'</span> =&gt; <span class="text-green-300">'required|email'</span>,</div>
        <div class="pl-16"><span class="text-green-300">'password'</span> =&gt; <span class="text-green-300">'required'</span></div>
        <div class="pl-8">]);</div>
        <br>
        <div class="pl-8 italic text-gray-500">// Check credentials</div>
        <div class="relative inline-block pl-8">
          <span class="text-pink-400">if</span> (<span class="text-teal-400">Auth</span>::<span class="text-yellow-200">attempt</span>(<span class="text-blue-200">$credentials</span>)) {
          <span class="absolute left-[-4px] top-0 h-5 w-[2px] animate-pulse bg-blue-400"></span>
          <span class="absolute -top-5 left-0 rounded bg-blue-400 px-2 py-0.5 font-sans text-[10px] text-white shadow">Arda</span>
        </div>
        <div class="pl-16"><span class="text-blue-200">$request</span>-&gt;<span class="text-yellow-200">session</span>()-&gt;<span class="text-yellow-200">regenerate</span>();</div>
        <div class="relative mt-2 pl-16">
          <span class="text-pink-400">return</span> <span class="text-yellow-200">redirect</span>()-&gt;
          <span class="ml-1 inline-block h-4 w-[2px] animate-pulse bg-amber-500 align-middle"></span>
          <span class="absolute -top-5 left-32 z-10 whitespace-nowrap rounded bg-amber-500 px-2 py-0.5 font-sans text-[10px] text-white shadow">Aji is typing...</span>
        </div>
        <div class="pl-8">}</div>
        <div class="pl-8"><span class="text-pink-400">return</span> <span class="text-yellow-200">back</span>()-&gt;<span class="text-yellow-200">withErrors</span>([<span class="text-green-300">'email'</span> =&gt; <span class="text-green-300">'Invalid login.'</span>]);</div>
        <div>}</div>
      </div>
      <div class="flex w-full shrink-0 flex-col border-t border-cyan-200/10 bg-[var(--abyss)] font-sans text-xs lg:w-80 lg:border-l lg:border-t-0">
        <div class="flex items-center justify-between border-b border-cyan-200/10 px-4 py-2.5 text-gray-300">
          <span class="flex items-center gap-1.5 font-semibold">
            <svg class="h-4 w-4 text-[var(--hairline)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            Chat
          </span>
        </div>
        <div class="max-h-[350px] flex-1 space-y-4 overflow-y-auto p-4 text-gray-300 lg:max-h-none">
          <div class="flex items-start gap-2">
            <div class="font-display grid h-6 w-6 shrink-0 place-items-center rounded-full bg-blue-600 text-[10px] font-bold text-white">A</div>
            <div class="w-full space-y-1 rounded-lg border border-cyan-200/10 bg-[var(--panel)] p-2.5">
              <p class="text-[11px] font-semibold text-[var(--body)]">Arda</p>
              <p>Can we make sure the session regeneration is protected against fixation?</p>
            </div>
          </div>
          <div class="flex items-start gap-2">
            <div class="font-display grid h-6 w-6 shrink-0 place-items-center rounded-full text-[10px] font-bold text-[var(--on-accent)]" style="background:var(--hairline)">AI</div>
            <div class="w-full space-y-2 rounded-lg border border-cyan-200/10 bg-[var(--panel)] p-2.5">
              <p class="flex items-center gap-1 text-[11px] font-semibold text-[var(--hairline)]"><span class="h-1.5 w-1.5 animate-ping rounded-full" style="background:var(--hairline)"></span> Agent Copilot</p>
              <p>Yes! Laravel's <code class="rounded bg-[var(--canvas)] px-1 py-0.5 font-mono text-[10px] text-pink-400">Auth::attempt()</code> handles session regeneration safely out of the box.</p>
            </div>
          </div>
        </div>
        <div class="border-t border-cyan-200/10 p-3">
          <div class="rounded-md border border-cyan-200/15 bg-[var(--canvas)] p-2">
            <input type="text" placeholder="Ask Copilot or type @/..." class="font-mono2 w-full bg-transparent text-xs text-gray-200 placeholder-gray-500 focus:outline-none" readonly />
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- 2. WHY THIS PROJECT? --}}
<section id="problem" class="reveal mt-14">
  <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">THE PROBLEM</p>
  <h2 class="font-display mt-2 text-3xl font-bold md:text-5xl">A Starting Point</h2>
  <div class="mt-6 grid gap-4 lg:grid-cols-3">
    <article class="card rise rise-1 p-8">
      <div class="font-display text-6xl font-black text-[var(--hairline)]">01</div>
      <h3 class="font-display mt-4 text-2xl font-bold">Fragmented Workflow</h3>
      <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">Code editor, GitHub, AI assistant, and collaboration tools often live separately, constantly breaking developer focus and context.</p>
    </article>
    <article class="card rise rise-2 p-8">
      <div class="font-display text-6xl font-black text-[var(--hairline)]">02</div>
      <h3 class="font-display mt-4 text-2xl font-bold">AI That Only Responds</h3>
      <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">Traditional AI assistants wait passively for prompts instead of actively reasoning about the project architecture and proposing solutions.</p>
    </article>
    <article class="card rise rise-3 p-8">
      <div class="font-display text-6xl font-black text-[var(--hairline)]">03</div>
      <h3 class="font-display mt-4 text-2xl font-bold">Collaboration is Hard</h3>
      <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">Developers need to switch between local IDEs, Git platforms, and communication tools just to solve a single shared issue.</p>
    </article>
  </div>
  <p class="font-display mt-8 text-center text-2xl font-black text-[var(--hairline)] md:text-4xl">All in one environment.</p>
</section>

{{-- 3. WHAT ARE WE BUILDING? --}}
<section class="reveal mt-14">
  <h2 class="font-display text-3xl font-bold md:text-4xl">One Workspace for Every Workflow.</h2>
  <div class="card mt-6 overflow-hidden p-6 md:p-10">
    <canvas id="workspaceCanvas" class="h-[420px] w-full"></canvas>
  </div>
  <script>
    (function () {
      var cv = document.getElementById('workspaceCanvas');
      if (!cv) return;
      var ctx = cv.getContext('2d');
      var rect = cv.getBoundingClientRect();
      var dpr = window.devicePixelRatio || 1;
      cv.width = rect.width * dpr;
      cv.height = rect.height * dpr;
      ctx.scale(dpr, dpr);
      // ponytail: drawn once on load, no resize handler; add one if canvas width starts drifting on zoom/rotate.
      var W = rect.width, H = rect.height, centerX = W / 2, centerY = H / 2;
      ctx.font = '14px monospace';
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      var drawArrow = function (x1, y1, x2, y2) {
        ctx.beginPath(); ctx.moveTo(x1, y1); ctx.lineTo(x2, y2);
        ctx.strokeStyle = '#8b949e'; ctx.lineWidth = 1.5; ctx.stroke();
        ctx.fillStyle = '#8b949e';
        var angle = Math.atan2(y2 - y1, x2 - x1);
        [[x2, y2, angle], [x1, y1, angle + Math.PI]].forEach(function (h) {
          ctx.save(); ctx.translate(h[0], h[1]); ctx.rotate(h[2]);
          ctx.beginPath(); ctx.moveTo(0, 0); ctx.lineTo(-10, 4); ctx.lineTo(-10, -4); ctx.closePath(); ctx.fill();
          ctx.restore();
        });
      };
      var nodeH = 40, gap = 80, centerW = 200, sideW = 150, verticalW = 160;
      var center = { x: centerX, y: centerY, w: centerW };
      var github = { x: centerX, y: centerY - nodeH - gap };
      var backend = { x: centerX, y: centerY + nodeH + gap };
      var collab = { x: centerX - centerW / 2 - gap - sideW / 2, y: centerY };
      var ai = { x: centerX + centerW / 2 + gap + sideW / 2, y: centerY };
      drawArrow(center.x, github.y + nodeH / 2, center.x, center.y - nodeH / 2);
      drawArrow(center.x, center.y + nodeH / 2, center.x, backend.y - nodeH / 2);
      drawArrow(collab.x + sideW / 2, collab.y, center.x - centerW / 2, center.y);
      drawArrow(center.x + centerW / 2, center.y, ai.x - sideW / 2, ai.y);
      [
        [github.x, github.y, verticalW, 'GitHub', '#ffffff', '#374151', '#1f2937'],
        [collab.x, collab.y, sideW, 'Collaborator', '#4DF3FF', '#0e7490', '#062a33'],
        [ai.x, ai.y, sideW, 'Agentic AI', '#6BE4D2', '#0f766e', '#042a26'],
        [backend.x, backend.y, verticalW, 'Laravel Backend', '#f87171', '#7f1d1d', '#250b0b'],
        [center.x, center.y, centerW, 'Web-based IDE', '#ffffff', '#4DF3FF', '#081526', '#4DF3FF']
      ].forEach(function (n) {
        ctx.shadowBlur = n[7] ? 15 : 0;
        ctx.shadowColor = n[7] || 'transparent';
        ctx.fillStyle = n[6]; ctx.strokeStyle = n[5]; ctx.lineWidth = n[7] ? 2 : 1.5;
        ctx.beginPath();
        if (ctx.roundRect) ctx.roundRect(n[0] - n[2] / 2, n[1] - nodeH / 2, n[2], nodeH, 6); else ctx.rect(n[0] - n[2] / 2, n[1] - nodeH / 2, n[2], nodeH);
        ctx.fill(); ctx.stroke(); ctx.shadowBlur = 0;
        ctx.fillStyle = n[4]; ctx.fillText(n[3], n[0], n[1]);
      });
    })();
  </script>
  <p class="mx-auto mt-6 max-w-4xl text-center text-lg leading-relaxed text-[var(--ink)]">A browser-based development environment that combines code editing, GitHub integration, real-time collaboration, and autonomous AI agents into a single, cohesive workspace.</p>
</section>

{{-- 4. KEY FEATURES --}}
<section id="features" class="reveal mt-14">
  <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">KEY FEATURES</p>
  <h2 class="font-display mt-2 text-3xl font-bold md:text-4xl">What Magentic does</h2>
  <div class="mt-6 grid gap-4 md:grid-cols-2">
    <article class="card rise rise-1 flex flex-col justify-between p-8">
      <div>
        <div class="font-display grid h-14 w-14 place-items-center rounded-2xl border border-cyan-200/20 bg-cyan-200/5 text-2xl">🤖</div>
        <h3 class="font-display mt-5 text-2xl font-bold">Agentic AI</h3>
        <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">AI that doesn't just answer questions — it can analyze the codebase, reason about problems, and execute development tasks.</p>
      </div>
      <ul class="font-mono2 mt-6 space-y-2 text-sm text-[var(--acc2)]">
        <li>▹ Analyze codebase context</li>
        <li>▹ Detect bugs autonomously</li>
        <li>▹ Execute development workflows</li>
      </ul>
    </article>
    <article class="card rise rise-2 flex flex-col justify-between p-8">
      <div>
        <div class="font-display grid h-14 w-14 place-items-center rounded-2xl border border-cyan-200/20 bg-cyan-200/5 text-2xl">🔗</div>
        <h3 class="font-display mt-5 text-2xl font-bold">GitHub Integration</h3>
        <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">Seamlessly connect projects with GitHub repositories directly from the browser without local setups.</p>
      </div>
      <ul class="font-mono2 mt-6 space-y-2 text-sm text-[var(--acc2)]">
        <li>▹ Clone &amp; Commit visually</li>
        <li>▹ Branch management</li>
        <li>▹ Pull request synchronization</li>
      </ul>
    </article>
    <article class="card rise rise-3 flex flex-col justify-between p-8">
      <div>
        <div class="font-display grid h-14 w-14 place-items-center rounded-2xl border border-cyan-200/20 bg-cyan-200/5 text-2xl">👥</div>
        <h3 class="font-display mt-5 text-2xl font-bold">Real-Time Collaboration</h3>
        <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">Work on the same codebase with your teammates simultaneously, just like editing a Google Doc.</p>
      </div>
      <ul class="font-mono2 mt-6 space-y-2 text-sm text-[var(--acc2)]">
        <li>▹ Multiple users &amp; cursors</li>
        <li>▹ Real-time text broadcasting</li>
        <li>▹ Live presence indicators</li>
      </ul>
    </article>
    <article class="card rise rise-4 flex flex-col justify-between p-8">
      <div>
        <div class="font-display grid h-14 w-14 place-items-center rounded-2xl border border-cyan-200/20 bg-cyan-200/5 text-2xl">💻</div>
        <h3 class="font-display mt-5 text-2xl font-bold">VS Code-like Environment</h3>
        <p class="mt-2 text-sm leading-relaxed text-[var(--body)]">A familiar, fully-featured development environment powered by Monaco Editor, delivered in-browser.</p>
      </div>
      <ul class="font-mono2 mt-6 space-y-2 text-sm text-[var(--acc2)]">
        <li>▹ File explorer &amp; Tabs</li>
        <li>▹ Advanced syntax highlighting</li>
        <li>▹ Integrated web terminal</li>
      </ul>
    </article>
  </div>
</section>

{{-- 5. THE AGENT LOOP --}}
<section id="agent" class="reveal mt-14">
  <h2 class="font-display text-center text-3xl font-bold md:text-5xl">Not Just Any Assistant.</h2>
  <p class="mx-auto mt-3 max-w-3xl text-center text-lg text-[var(--body)]">Unlike any other standard chat models, our Agentic AI executes a systematic loop, analyzes, forms a plan, executes changes, and verifies the result.</p>
  <div class="card mt-8 p-8 md:p-12">
    <div class="mx-auto max-w-3xl font-mono text-base">
      <div class="mb-10">
        <div class="mb-2 text-sm font-bold tracking-wider text-[var(--muted)]">YOU</div>
        <div class="inline-block rounded-bl-2xl rounded-r-2xl border border-cyan-200/15 bg-[var(--panel)] px-6 py-4 text-[var(--ink)] shadow-lg">"Fix the authentication bug on login."</div>
      </div>
      <div class="relative mb-10 border-l-2 border-cyan-200/20 pl-12">
        <div class="absolute -left-[17px] top-0 grid h-8 w-8 place-items-center rounded-full border-2 bg-[var(--canvas)] text-[var(--hairline)]" style="border-color:var(--hairline)">↓</div>
        <div class="mb-4 text-sm font-bold tracking-wider text-[var(--hairline)] opacity-70">AGENT REASONING</div>
        <div class="space-y-4 rounded-xl border border-cyan-200/10 bg-[var(--panel)] p-6 text-[var(--body)]">
          <div class="flex items-center gap-3"><span class="animate-pulse text-[var(--hairline)]">●</span> <span class="w-20 font-semibold text-[var(--ink)]">Analyze</span> <span>Scanning AuthController.php...</span></div>
          <div class="flex items-center gap-3"><span class="animate-pulse text-[var(--hairline)]" style="animation-delay:200ms">●</span> <span class="w-20 font-semibold text-[var(--ink)]">Plan</span> <span>Missing password hash verification step.</span></div>
          <div class="flex items-center gap-3"><span class="animate-pulse text-[var(--hairline)]" style="animation-delay:400ms">●</span> <span class="w-20 font-semibold text-[var(--ink)]">Execute</span> <span>Patching line 45.</span></div>
          <div class="flex items-center gap-3"><span class="animate-pulse text-[var(--hairline)]" style="animation-delay:600ms">●</span> <span class="w-20 font-semibold text-[var(--ink)]">Verify</span> <span>Running AuthTest... Passed.</span></div>
        </div>
      </div>
      <div class="text-right">
        <div class="mb-2 text-sm font-bold tracking-wider text-[var(--hairline)]">AI AGENT</div>
        <div class="inline-block max-w-2xl rounded-br-2xl rounded-l-2xl border border-cyan-200/25 bg-cyan-200/5 px-6 py-4 text-left text-[var(--ink)] shadow-lg">"I found the issue in `AuthController.php`. I've applied the fix to securely verify the password hash and checked the affected tests. The login is now secure."</div>
      </div>
    </div>
  </div>
</section>

{{-- 6. COLLABORATION + TECH STACK --}}
<section class="reveal mt-14">
  <h2 class="font-display text-center text-3xl font-bold md:text-4xl">One Codebase for All</h2>
  <p class="mx-auto mt-3 max-w-3xl text-center text-lg text-[var(--body)]">Just like Google Docs, developers can work on the same project simultaneously together with an AI agent to assist along the way.</p>
  <div class="card mt-8 space-y-4 p-6 md:p-8">
    <h3 class="font-display text-2xl font-bold">Built With</h3>
    <div class="grid gap-3">
      <div class="flex flex-col gap-1 rounded-2xl border border-cyan-200/10 bg-[var(--canvas)] p-5 sm:flex-row sm:items-center sm:gap-4">
        <div class="font-mono2 w-32 text-xs font-bold uppercase tracking-widest text-[var(--muted)]">Frontend</div>
        <div class="text-lg font-medium text-[var(--ink)]">Monaco Editor, JS, Tailwind CSS</div>
      </div>
      <div class="flex flex-col gap-1 rounded-2xl border border-cyan-200/10 bg-[var(--canvas)] p-5 sm:flex-row sm:items-center sm:gap-4">
        <div class="font-mono2 w-32 text-xs font-bold uppercase tracking-widest text-[var(--muted)]">Backend</div>
        <div class="text-lg font-medium text-[var(--ink)]">Laravel 11+ / PHP 8.4 / MySQL</div>
      </div>
      <div class="flex flex-col gap-1 rounded-2xl border border-cyan-200/10 bg-[var(--canvas)] p-5 sm:flex-row sm:items-center sm:gap-4">
        <div class="font-mono2 w-32 text-xs font-bold uppercase tracking-widest text-[var(--muted)]">AI Core</div>
        <div class="text-lg font-medium text-[var(--ink)]">Custom Agent Framework + LLM API</div>
      </div>
      <div class="flex flex-col gap-1 rounded-2xl border border-cyan-200/10 bg-[var(--canvas)] p-5 sm:flex-row sm:items-center sm:gap-4">
        <div class="font-mono2 w-32 text-xs font-bold uppercase tracking-widest text-[var(--muted)]">Integration</div>
        <div class="text-lg font-medium text-[var(--ink)]">GitHub REST &amp; GraphQL API</div>
      </div>
      <div class="flex flex-col gap-1 rounded-2xl border border-cyan-200/10 bg-[var(--canvas)] p-5 sm:flex-row sm:items-center sm:gap-4">
        <div class="font-mono2 w-32 text-xs font-bold uppercase tracking-widest text-[var(--muted)]">Realtime</div>
        <div class="text-lg font-medium text-[var(--ink)]">WebSockets / Laravel Reverb</div>
      </div>
    </div>
  </div>
</section>

{{-- 7. CROSS-NAV --}}
<section class="mt-14">
  <div class="card rise p-7">
    <p class="font-mono2 text-xs tracking-widest text-[var(--hairline)]">TRY THE OTHER THEME</p>
    <div class="mt-4 grid gap-3">
      <a href="{{ isset($fromDashboard) ? route('dashboard.agent') : route('agent.show') }}" class="btn-ghost flex items-center justify-between rounded-xl px-4 py-3 text-sm">
        <span>General Assistant Agent</span>
        <span class="font-mono2 text-xs text-[var(--acc2)]">/agent</span>
      </a>
    </div>
  </div>
</section>
