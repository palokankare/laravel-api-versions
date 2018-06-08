<?php

namespace Klopal\ApiVersions\Test\Resources\Changes;

/**
 * Class UpdatePublishedDate
 * @package App\Http\Resources\Changes
 */
class AddAuthor
{
    /**
     * @param $response
     * @return mixed
     */
    public static function change($request, $resource, $response)
    {
        $response['author'] = $resource->author;

        return $response;
    }
}