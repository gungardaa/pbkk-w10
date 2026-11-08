<?php

namespace App\Http\Controllers;

use App\Models\AcademicData;
use Illuminate\Http\Request;

class AcademicDataController extends Controller
{
    /**
     * Display a listing of the academic data with search and pagination.
     */
    public function index(Request $request)
    {
        $query = AcademicData::query();

        // Filter by search keyword using when()
        $query->when($request->filled('search'), function ($q) use ($request) {
            $q->where(function ($query) use ($request) {
                $query->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('nim', 'like', '%' . $request->search . '%')
                    ->orWhere('prodi', 'like', '%' . $request->search . '%');
            });
        });

        // Filter by faculty
        $query->when($request->filled('fakultas'), function ($q) use ($request) {
            $q->where('fakultas', $request->fakultas);
        });

        // Filter by prodi
        $query->when($request->filled('prodi'), function ($q) use ($request) {
            $q->where('prodi', $request->prodi);
        });

        // Sort by whitelisted column; arbitrary input would otherwise break the query
        $sortField = in_array($request->get('sort'), ['nama', 'nim', 'prodi', 'fakultas', 'angkatan', 'created_at'], true)
            ? $request->get('sort')
            : 'created_at';
        $sortDirection = $request->get('direction') === 'asc' ? 'asc' : 'desc';
        $query->orderBy($sortField, $sortDirection);

        // Paginate with query string preservation
        $academicData = $query->paginate(10)->withQueryString();

        // Get filter options
        $fakultasOptions = AcademicData::select('fakultas')
            ->whereNotNull('fakultas')
            ->distinct()
            ->get()
            ->pluck('fakultas', 'fakultas');

        $prodiOptions = AcademicData::select('prodi')
            ->whereNotNull('prodi')
            ->distinct()
            ->get()
            ->pluck('prodi', 'prodi');

        return view('admin.academic-data.index', compact(
            'academicData',
            'fakultasOptions',
            'prodiOptions'
        ));
    }

    /**
     * Show the form for creating a new academic data.
     */
    public function create()
    {
        return view('admin.academic-data.form');
    }

    /**
     * Store a newly created academic data in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:academic_data',
            'prodi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'angkatan' => 'required|integer|min:2000|max:2030',
            'email' => 'required|email|unique:academic_data',
            'alamat' => 'nullable|string',
            'ipk' => 'nullable|numeric|between:0,4',
        ]);

        AcademicData::create($request->all());

        return redirect()->route('academic-data.index')
            ->with('success', 'Data akademik berhasil ditambahkan.');
    }

    /**
     * Display the specified academic data.
     */
    public function show(AcademicData $academicDatum)
    {
        return view('admin.academic-data.show', ['academicData' => $academicDatum]);
    }

    /**
     * Show the form for editing the specified academic data.
     */
    public function edit(AcademicData $academicDatum)
    {
        return view('admin.academic-data.form', ['academicData' => $academicDatum]);
    }

    /**
     * Update the specified academic data in storage.
     */
    public function update(Request $request, AcademicData $academicDatum)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:academic_data,nim,' . $academicDatum->id,
            'prodi' => 'required|string|max:100',
            'fakultas' => 'required|string|max:100',
            'angkatan' => 'required|integer|min:2000|max:2030',
            'email' => 'required|email|unique:academic_data,email,' . $academicDatum->id,
            'alamat' => 'nullable|string',
            'ipk' => 'nullable|numeric|between:0,4',
        ]);

        $academicDatum->update($request->all());

        return redirect()->route('academic-data.index')
            ->with('success', 'Data akademik berhasil diperbarui.');
    }

    /**
     * Remove the specified academic data from storage.
     */
    public function destroy(AcademicData $academicDatum)
    {
        $academicDatum->delete();

        return redirect()->route('academic-data.index')
            ->with('success', 'Data akademik berhasil dihapus.');
    }
}