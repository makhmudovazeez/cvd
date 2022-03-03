<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientCreateRequest extends FormRequest
{
    public function rules(){
        return [
            'patient.pinfl' => ['required', 'size:14',
                Rule::unique('patients', 'pinfl')],
            'patient.passport_series' => ['required', 'size:9',
                Rule::unique('patients', 'passport_series')],
            'patient.birth_date' => ['required'],
            'patientName.firstname' => ['required'],
            'patientName.middlename' => ['required'],
            'patientName.lastname' => ['required'],
            'patientAddress.country_id' => ['required', 'integer', Rule::exists('countries', 'id')],
            'patientAddress.state_id' => ['required', 'integer', Rule::exists('states', 'id')],
            'patientAddress.city_id' => ['required', 'integer', Rule::exists('cities', 'id')],
            'patientAddress.district_id' => ['required', 'integer', Rule::exists('districts', 'id')],
            'patientAddress.line' => ['required'],
            'diagnosis.*.diagnosis_code_id' => ['required', 'integer', Rule::exists('diagnosis_codes')],
            'diagnosis.*.note' => ['nullable', 'string'],
            'treatment.*.dose' => ['double', Rule::requiredIf($this->request->has('treatment'))],
            'treatment.*.from_date' => ['date', Rule::requiredIf($this->request->has('treatment'))],
            'treatment.*.to_date' => ['date', Rule::requiredIf($this->request->has('treatment'))]
        ];
    }
}
