<?php

namespace App\QueryFilters;


class Sort extends Filter
{
    function __construct()
    {
        $name = $this->filterName();
        $json = json_decode(request()->$name, true);
        $this->filt = $json['filt'];
        $this->target = $json['target'];
    }

    protected function applyFilter($builder)
    {
        //return $builder->orderBy($this->target, request($this->filterName()));
        return $builder->orderBy($this->target, $this->filt);
    }
}
