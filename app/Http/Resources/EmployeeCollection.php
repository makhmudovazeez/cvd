<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this['id'],
            'tin' => $this['tin'],
            'pinfl' => $this['pinfl'],
            'inps' => $this['inps'],
            'gender' => $this['gender'],
            'nationality' => $this['nationality_id'],
            'birth_date' => $this['birth_date'],
            'birth_country' => $this['birth_country_id'],
            'birth_place' => $this['birth_place'],
            'is_foreigner' => $this['is_foreigner']
        ];

    }
}
