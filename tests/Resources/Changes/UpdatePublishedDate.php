<?php

namespace Klopal\ApiVersions\Test\Resources\Changes;

/**
 * Class UpdatePublishedDate
 * @package App\Http\Resources\Changes
 */
class UpdatePublishedDate
{
    /**
     * @param $response
     * @return mixed
     */
    public static function change($request, $resource, $response)
    {
        $response['published'] = $resource->published->format('d.m.Y');

        return $response;
    }
}