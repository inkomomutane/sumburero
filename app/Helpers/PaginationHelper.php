<?php
namespace App\Helpers;

use Illuminate\Container\Container;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class PaginationHelper 
{
    public static function paginate(Collection $collection,$showPerPage)
    {
        $pageNumber = Paginator::resolveCurrentPage('page');
        $totalPageNumber = $collection->count();
        return self::paginator(
            $collection->forPage($pageNumber,$showPerPage),
            $totalPageNumber,
            $showPerPage,$pageNumber,[
                'path' => Paginator::resolveCurrentPath(),
                'pageNumber' => 'page'
            ]
        );
    }
    
    public static function paginator($items,$total,$perPage,$currentPage,$options)
    {
        return Container::getInstance()->makeWith(
            LengthAwarePaginator::class,
            compact(
                'items','total','perPage','currentPage','options'
            )
        );
    }
}
