# Academic Profile and Agent Ideas

A small personal academic website built for a campus assignment at ITS. It shows a student profile, a visual pitch for a group Agentic AI platform called MAGENTIC, and keeps the routing exercises from earlier weeks working.

## About Me

My name is Anak Agung Putu Arda Nareswara. You can call me Arda Nareswara. My student number is `5025241074`. I study Informatics Engineering at Institut Teknologi Sepuluh Nopember, batch 2024.

## About This Project

Three content pages run through one `PageController`:

1. **Beranda** at `/` (also `/beranda`) with a warm ITS welcome.
2. **Profil Mahasiswa** at `/profil-mahasiswa`, the same profile content as the NRP route, without needing the number in the URL.
3. **Ide Agent** at `/ide-agent`, which shows the MAGENTIC platform pitch, the same page as `/agent/magentic`.

All pages extend one master layout, `layouts/app.blade.php`, which holds the dynamic title, the static navbar, the content container, and the ITS footer. Two reusable Blade components carry the repeating UI: `x-info-card` for profile data and `x-status-banner` for notifications such as the welcome greeting.

Older features still work next to the new pages: the required-NRP profile route, the optional-theme agent route, the GPA calculator, the dashboard group, and the fallback page.

Every link on this site goes through a **named route**. There are no hardcoded URLs.

## Dark and light theme

The site is dark by default. Add `?mode=light` to any address, for example `/ide-agent?mode=light`, to switch the whole site to a light blueprint theme. Use `?mode=dark` to go back. The choice is kept in the session, so it stays while you move between pages until you change it. The navbar also has a toggle button that flips the theme on the page you are reading.

A personal greeting works through the `user` parameter: `/beranda?user=Andi` shows `Selamat datang, Andi!`

## Tech Used

- Laravel 13
- Blade Templates with layout inheritance and components
- Tailwind CSS v4 compiled locally with Vite and NPM (no CSS CDN)
- Vanilla JavaScript
- PHP
- Fonts bundled at build time through the Vite plugin

No additional database setup is required. Laravel migrations will automatically create the required tables. The application data is stored in a single PHP class under:

```text
app/Support
```

The database is only used for Laravel framework features such as session management, which also keeps the theme choice.

## Getting the Code

### Option 1: Download ZIP

Download the ZIP file from the repository page on GitHub and extract it anywhere you like.

### Option 2: Clone with HTTPS

```bash
git clone https://github.com/gungardaa/pbkk-w4.git
```

### Option 3: Clone with SSH

```bash
git clone git@github.com:gungardaa/pbkk-w4.git
```

## Run It Locally

You need:

* PHP 8.3 or newer
* Composer
* Node 22 or newer with npm

### 1. Move into the project folder

```bash
cd pbkk-w4
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install JS dependencies and build the CSS

```bash
npm install
npm run build
```

### 4. Create the local environment file

On Linux or macOS:

```bash
cp .env.example .env
```

On Windows Command Prompt or PowerShell:

```powershell
copy .env.example .env
```

### 5. Generate the application key

```bash
php artisan key:generate
```

### 6. Run database migrations

Create the required database tables:

```bash
php artisan migrate
```

### 7. Start the Laravel development server

```bash
php artisan serve
```

Open the address shown in your terminal in a browser.

Start from the dashboard page to quickly navigate between the profile, agent, and GPA tools.

## Try These Routes

| Page             | Address                          | Description                                   |
| ---------------- | -------------------------------- | --------------------------------------------- |
| Home             | `/`                              | Main welcome page                             |
| Beranda          | `/beranda?user=Andi`             | Same home page with a personal greeting       |
| Profile          | `/profil-mahasiswa`              | Student profile without the NRP in the URL    |
| Valid Profile    | `/mahasiswa/5025241074`          | Student profile using a valid 10-digit NRP    |
| Rejected Profile | `/mahasiswa/123`                 | Demonstrates the NRP regex guard              |
| Default Agent    | `/agent`                         | Agent idea page with the default theme        |
| Themed Agent     | `/agent/magentic`                | Agent idea page with the magentic theme       |
| Ide Agent        | `/ide-agent`                     | Same magentic page under its own URL          |
| Light Theme      | `/ide-agent?mode=light`          | Whole site in the light blueprint theme       |
| GPA Calculator   | `/hitung-ipk/3.50/3.80`          | Calculates the average of two semester scores |
| Dashboard        | `/dashboard`                     | Navigation hub for the project                |
| Unknown Path     | Any random path                  | Displays the custom fallback page             |

## Example

A valid student profile:

```text
/mahasiswa/5025241074
```

An invalid profile:

```text
/mahasiswa/123
```

The second address is rejected because the route only accepts an NRP containing exactly 10 digits.

## Project Structure

The main routing, controller, and view files are organized as follows:

```text
app/
├── Http/
│   ├── Controllers/
│   │   └── PageController.php
│   └── Middleware/
│       └── ResolveTheme.php
└── Support/
    └── AcademicData.php

resources/
├── css/
│   └── app.css
└── views/
    ├── components/
    │   ├── info-card.blade.php
    │   └── status-banner.blade.php
    ├── layouts/
    │   └── app.blade.php
    ├── agent/
    ├── dashboard/
    ├── errors/
    ├── mahasiswa/
    ├── home.blade.php
    └── ipk/

routes/
└── web.php

public/
└── build/
```

The page routes point at `PageController`, the theme query is resolved in `ResolveTheme`, and the site styling is compiled from `resources/css` into `public/build`.

## Assignment Focus

This project demonstrates the following concepts:

* Basic routes
* Route parameters
* Optional route parameters
* Route constraints using regular expressions
* Named routes
* Route groups and prefixes
* Fallback routes
* Route-driven calculations
* One controller serving several pages
* Blade layout inheritance without repeated HTML
* Blade components with parameters and slots
* Local CSS bundling with Vite and NPM
* Query-driven greeting and site theme
