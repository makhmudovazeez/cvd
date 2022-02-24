<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationCollection;
use App\Services\OrganizationService;
use Illuminate\Http\Request;

final class OrganizationController extends Controller
{
    private $organizationService;

    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    public function index($page = 1){
        $organizations = $this->organizationService->findAll(\request()->all());
        return response()->json([
            'current_page' => $organizations['current_page'],
            'last_page' => $organizations['last_page'],
            'from' => $organizations['from'],
            'to' => $organizations['to'],
            'per_page' => $organizations['per_page'],
            'data' => OrganizationCollection::collection(collect($organizations['data']))
        ]);
    }

    public function show(int $id){
        $organization = $this->organizationService->findOne($id);
        return response()->json(OrganizationCollection::collection($organization));
    }
}
