<?php

namespace App\QueryFilters;


class Sort extends Filter
{
    protected function applyFilter($builder, $filt, $target)
    {
        //return $builder->orderBy($this->target, request($this->filterName()));
        return $builder->orderBy($target, $filt);
    }
}
