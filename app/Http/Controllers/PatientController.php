<?php

namespace App\Http\Controllers;

use App\Services\PatientService;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        try {
            $patient = $this->patientService->store();
        }catch (\Throwable $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
