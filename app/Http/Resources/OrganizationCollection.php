<?php

namespace App\Http\Resources;


use App\Traits\SortTranslations;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrganizationCollection extends ResourceCollection
{
    use SortTranslations;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array_merge(
        [
            'id' => $this['id'],
            'tin' => $this['tin'],
            'parent_id' => $this['parent_id'],
            'type_id' => $this['type_id'],
            'level_id' => $this['level_id'],
            'identification_code' => $this['identification_code'],

        ],
            $this->name($this['translations'])
        );

    }

}
