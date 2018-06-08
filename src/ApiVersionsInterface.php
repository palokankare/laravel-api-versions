<?php

namespace Klopal\ApiVersions;

interface ApiVersionsInterface
{
    /**
     * @return array
     */
    public function getVersions(): array;
}
