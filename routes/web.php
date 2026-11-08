<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AcademicDataController;
use App\Http\Controllers\PageController;
use App\Support\AcademicData;
use Illuminate\Support\Facades\Route;

// Beranda (also answers /beranda)
Route::get('/', [PageController::class, 'beranda'])->name('home');
Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda');

// Profil Mahasiswa
Route::get('/profil-mahasiswa', [PageController::class, 'profilMahasiswa'])->name('profil');

// Ide-Agent
Route::get('/ide-agent', [PageController::class, 'ideAgent'])->name('ide-agent');

// Full profile by required NRP
Route::get('/mahasiswa/{nrp}', function (string $nrp) {
    $student = AcademicData::student();
    if ($nrp !== $student['nrp']) {
        return response()->view('errors.404', ['student' => $student, 'missing' => $nrp], 404);
    }
    return view('mahasiswa.show', ['student' => $student]);
})->where('nrp', '[0-9]{10}')->name('mahasiswa.show');

// Agentic AI idea
Route::get('/agent/{tema?}', function (?string $tema = null) {
    $agent = AcademicData::findAgent($tema);
    $isFallback = AcademicData::isFallbackTheme($tema);
    return view('agent.show', [
        'student' => AcademicData::student(),
        'agents' => AcademicData::agents(),
        'agent' => $agent,
        'requested' => $tema,
        'isFallback' => $isFallback,
    ]);
})->name('agent.show');

// GPA calculator
Route::get('/hitung-ipk/{ip1}/{ip2}', function (string $ip1, string $ip2) {
    $student = AcademicData::student();
    $valid = is_numeric($ip1) && is_numeric($ip2)
        && (float) $ip1 >= 0 && (float) $ip1 <= 4
        && (float) $ip2 >= 0 && (float) $ip2 <= 4;
    if (! $valid) {
        return response()->view('ipk.show', [
            'student' => $student, 'ip1' => $ip1, 'ip2' => $ip2,
            'error' => 'Scores must be numbers from 0 to 4. Try 3.50 and 3.80.',
        ], 422);
    }
    $score1 = round((float) $ip1, 2);
    $score2 = round((float) $ip2, 2);
    $total = round($score1 + $score2, 2);
    $average = round($total / 2, 2);
    $predicate = match (true) {
        $average >= 3.51 => 'Excellent work. Keep the pace.',
        $average >= 3.00 => 'Good work. Push a bit more.',
        $average >= 2.50 => 'Fair. You can grow fast.',
        default => 'Keep going. Small steps matter.',
    };
    return view('ipk.show', [
        'student' => $student,
        'ip1' => number_format($score1, 2),
        'ip2' => number_format($score2, 2),
        'total' => number_format($total, 2),
        'average' => number_format($average, 2),
        'predicate' => $predicate,
        'error' => null,
    ]);
})->where(['ip1' => '[0-9]+(?:\.[0-9]+)?', 'ip2' => '[0-9]+(?:\.[0-9]+)?'])->name('ipk.hitung');

// Dashboard group (public)
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', function () {
        return view('dashboard.index', [
            'student' => AcademicData::student(),
            'agents' => AcademicData::agents(),
        ]);
    })->name('index');

    Route::get('/profil/{nrp}', function (string $nrp) {
        $student = AcademicData::student();
        if ($nrp !== $student['nrp']) {
            return response()->view('errors.404', [
                'student' => $student, 'missing' => $nrp,
            ], 404);
        }
        return view('mahasiswa.show', [
            'student' => $student,
            'fromDashboard' => true,
        ]);
    })->where('nrp', '[0-9]{10}')->name('profil');

    Route::get('/ipk', function () {
        return view('dashboard.ipk', ['student' => AcademicData::student()]);
    })->name('ipk');

    Route::get('/agent/{tema?}', function (?string $tema = null) {
        $agent = AcademicData::findAgent($tema);
        return view('agent.show', [
            'student' => AcademicData::student(),
            'agents' => AcademicData::agents(),
            'agent' => $agent,
            'requested' => $tema,
            'isFallback' => AcademicData::isFallbackTheme($tema),
            'fromDashboard' => true,
        ]);
    })->name('agent');
});

// Auth routes from Breeze
require __DIR__.'/auth.php';

// Admin routes (protected by auth + permission)
Route::middleware(['auth', 'verified'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard.index');
    


    // Academic Data CRUD
    Route::resource('academic-data', AcademicDataController::class);

    // Auto-login test accounts (development only)
    if (app()->environment('local') || app()->environment('testing')) {
        Route::get('/auto-login/{role}', function ($role) {
            if ($role === 'admin') {
                $user = \App\Models\User::role('admin')->first();
            } elseif ($role === 'staf') {
                $user = \App\Models\User::role('staf')->first();
            } else {
                abort(404);
            }

            if (! $user) {
                abort(404);
            }

            \Illuminate\Support\Facades\Auth::login($user);
            return redirect()->route('admin.dashboard.index');
        })->name('auto.login');
    }
});

// Fallback for unknown URLs
Route::fallback(function () {
    return response()->view('errors.404', [
        'student' => AcademicData::student(),
        'missing' => request()->path(),
    ], 404);
})->name('fallback');