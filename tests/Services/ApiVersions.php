<?php

namespace Klopal\ApiVersions\Test\Services;

use Klopal\ApiVersions\ApiVersionsInterface;

class ApiVersions implements ApiVersionsInterface
{
    public function getVersions(): array
    {
        return [
            '2018-06-05' => [], // Latest version doesn't have any changes naturally. Doesn't have to be defined here.
            '2018-05-28' => [
                'Klopal\ApiVersions\Test\Resources\BookResource' => 'Klopal\ApiVersions\Test\Resources\Changes\UpdatePublishedDate',
                'Klopal\ApiVersions\Test\Requests\StoreBook'     => 'Klopal\ApiVersions\Test\Requests\Changes\MakeAuthorNonMandatory',
            ],
            '2018-05-26' => [
                'Klopal\ApiVersions\Test\Resources\BookResource' => 'Klopal\ApiVersions\Test\Resources\Changes\AddAuthor',
            ],
        ];
    }
}
