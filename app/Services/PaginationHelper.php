<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class PaginationHelper
{
    /**
     * Calculate pagination values
     *
     * @param int $perPage Number of items per page
     * @param int $page Current page number
     * @param string $modelClass The model class to use for counting
     * @return array
     */
    public static function calculatePagination(int $perPage, int $page, string $modelClass = Model::class): array
    {
        $skip = ($page - 1) * $perPage;
        $total = (new $modelClass())->count();
        
        return [
            'skip' => $skip,
            'total' => $total
        ];
    }
}
