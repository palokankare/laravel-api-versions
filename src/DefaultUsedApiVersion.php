<?php

namespace Klopal\ApiVersions;

class DefaultUsedApiVersion implements UsedApiVersionInterface
{
    /**
     * Return the used API version as string and in 'Y-m-d' date format.
     *
     * @return string
     */
    public function getVersion(): string
    {
        return '';
    }
}
