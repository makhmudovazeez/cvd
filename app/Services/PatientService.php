<?php


namespace App\Services;


use App\Interfaces\ServiceInterface;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientService implements ServiceInterface
{
    private $patients;

    public function __construct(Patient $patients)
    {
        $this->patients = $patients;
    }

    public function findAll(array $filter){
        $patients = $this->patients;

        return $patients;
    }

    public function findOne(int $id){
        return $this->patients->find($id);
    }

    public function store(): Patient{
        DB::beginTransaction();
        try {

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
