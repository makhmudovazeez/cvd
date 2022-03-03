<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCreateRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Models\Patient;
use App\Services\PatientService;

class PatientController extends Controller
{
    private $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    public function index()
    {
        $patients = $this->patientService->findAll(\request()->all())->paginate();

        return response()->json($patients);
    }

    public function create()
    {
        //
    }

    public function store(PatientCreateRequest $request)
    {
        try {
            $patient = $this->patientService->store();
            return response()->json(['data' => $patient]);
        }catch (\Throwable $exception){
            return response()->json(['error' => $exception->getMessage()]);
        }
    }

    public function show(Patient $patient)
    {
        return response()->json(['data' => $patient]);
    }

    public function edit(Patient $patient)
    {
        return response()->json(['data' => $patient]);
    }

    public function update(PatientUpdateRequest $request, Patient $patient)
    {
        try {
            $patient = $this->patientService->store();
            return response()->json(['data' => $patient]);
        }catch (\Throwable $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function destroy($id)
    {
        //
    }
}
