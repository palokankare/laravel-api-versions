<?php

namespace Klopal\ApiVersions;

interface UsedApiVersionInterface
{
    /**
     * @return string
     */
    public function getVersion(): string;
}
