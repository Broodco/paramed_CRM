<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Patient::class, 'patient');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Auth::user()->currentTeam->patients->sortBy([
            ['last_name', 'asc'],
            ['first_name', 'asc'],
        ])->values()->all();

        return Inertia::render('Patients/Index', [
            'patients' => $patients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Auth::user()->currentTeam->patients->sortBy([
            ['last_name', 'asc'],
            ['first_name', 'asc'],
        ])->values()->all();

        return Inertia::render('Patients/Create', [
            'patients' => $patients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        $validated = $request->validated();

        $validated['team_id'] = Auth::user()->currentTeam->id;

        Auth::user()->currentTeam->patients()->create($validated);

        return Redirect::route('patients.index')->with('success', 'Patient created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        $patients = Auth::user()->currentTeam->patients->sortBy([
            ['last_name', 'asc'],
            ['first_name', 'asc'],
        ])->values()->all();

        return Inertia::render('Patients/Details', [
            'patients' => $patients,
            'patient' => $patient
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return $patient;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
