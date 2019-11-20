<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Support\Str;

abstract class Filter
{
    function __construct()
    {
        $name = $this->filterName();
        $json = json_decode(request()->$name, true);
        $this->filt = $json['filt'];
        $this->target = $json['target'];
    }

    public function handle($request, Closure $next)
    {
        if (!request()->has($this->filterName())) {

            return $next($request);
        }
        $builder = $next($request);

        return $this->applyFilter($builder, $this->filt, $this->target);
    }

    protected abstract function applyFilter($builder, $filt, $target);

    protected function filterName()
    {
        return Str::snake(class_basename($this));
    }

    protected function filterNameAndTarget()
    {
        return Str::snake(class_basename($this));
    }
}
