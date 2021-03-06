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
        return response()->json($organizations);
    }

    public function show(int $id){
        $organization = $this->organizationService->findOne($id);
        return response()->json($organization);
    }
}
