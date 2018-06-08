<?php

namespace Klopal\ApiVersions\Resources;

use Illuminate\Container\Container;
use Klopal\ApiVersions\ChangesTrait;

trait ResourcesVersionChanges
{
    use ChangesTrait;

    /**
     * @param $request
     * @param $resource
     * @param $data
     * @return mixed
     */
    public function applyChanges($request, $resource, $data)
    {
        foreach($this->changes() as $change) {
            $data = call_user_func($change . '::change', $request, $resource, $data);
        }

        return $data;
    }
}
