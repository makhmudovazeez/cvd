<?php


namespace App\Services;


use App\Helpers\ApiItems;
use App\Interfaces\ServiceInterface;
use Illuminate\Support\Facades\Http;

/**
 * Class OrganizationService
 * @package App\Services
 * @version 1.0.0
 */

final class OrganizationService extends ApiItems implements ServiceInterface
{
    public function findAll(array $filter): array
    {
        return Http::accept(self::APPLICATION_JSON)->contentType(self::APPLICATION_JSON)
            ->get(config('urls.hrm_organization'), $filter)->json();
    }

    public function findOne(int $id): array
    {
        return Http::accept(self::APPLICATION_JSON)->contentType(self::APPLICATION_JSON)
            ->get(config('urls.hrm_organization') . "/$id")->json();
    }

}
