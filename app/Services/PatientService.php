<?php


namespace App\Services;


use App\Interfaces\ServiceInterface;
use App\Models\Patient;
use App\Models\PatientAddress;
use App\Models\PatientDiagnosisCode;
use App\Models\PatientName;
use App\Models\Treatment;
use Illuminate\Support\Facades\DB;

class PatientService implements ServiceInterface
{

    public function findAll(array $filter){
        $patients = new Patient();

        return $patients;
    }

    public function findOne(int $id){
        return Patient::find($id);
    }

    public function store(): Patient{
        DB::beginTransaction();
        try {
            $patient = Patient::create(request('patient'));

            PatientAddress::create(array_merge(['patient_id' => $patient->id], request('patientAddress')));

            PatientName::create(array_merge(['patient_id' => $patient->id], request('patientName')));

            PatientDiagnosisCode::create(array_merge(['patient_id' => $patient->id], request('diagnosis')));

            if (request('treatment')){
                Treatment::create(array_merge(['patient_id' => $patient->id], request('treatment')));
            }

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }

    public function update(Patient $patient): Patient{
        DB::beginTransaction();
        try {

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }
}
