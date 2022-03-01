<?php


namespace App\Services;


use App\Helpers\ApiItems;
use App\Interfaces\ServiceInterface;
use Illuminate\Support\Facades\Http;

/**\
 * Class EmployeeService
 * @package App\Services
 */

final class EmployeeService extends ApiItems implements ServiceInterface
{

    /**
     * @param array $filter
     * @return array
     */
    public function findAll(array $filter): array
    {
        return Http::contentType(self::APPLICATION_JSON)->accept(self::APPLICATION_JSON)
            ->get(config('urls.hrm_employee'), $filter)->json();
    }

    /**
     * @param int $id
     * @return array
     */
    public function findOne(int $id): array
    {
        return Http::contentType(self::APPLICATION_JSON)->accept(self::APPLICATION_JSON)
            ->get(config('urls.hrm_employee') . "/$id")->json();
    }
}
