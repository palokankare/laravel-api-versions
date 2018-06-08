<?php

namespace Klopal\ApiVersions\Test\Services;

use Klopal\ApiVersions\UsedApiVersionInterface;

class UsedApiVersion implements UsedApiVersionInterface
{
    public function getVersion(): string
    {
        return request()->header('Api-Version', '2018-06-05');
    }
}
