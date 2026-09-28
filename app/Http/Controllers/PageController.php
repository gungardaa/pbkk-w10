<?php

namespace App\Http\Controllers;

use App\Support\AcademicData;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function beranda(Request $request)
    {
        return view('home', [
            'student' => AcademicData::student(),
            'agents' => AcademicData::agents(),
            'user' => trim((string) $request->query('user', '')),
        ]);
    }

    public function profilMahasiswa()
    {
        return view('mahasiswa.show', [
            'student' => AcademicData::student(),
        ]);
    }

    public function ideAgent()
    {
        // Same page as /agent/magentic; only the URL and route name differ.
        return view('agent.show', [
            'student' => AcademicData::student(),
            'agents' => AcademicData::agents(),
            'agent' => AcademicData::findAgent('magentic'),
            'requested' => 'magentic',
            'isFallback' => false,
        ]);
    }
}
