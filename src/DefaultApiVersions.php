<?php

namespace Klopal\ApiVersions;

class DefaultApiVersions implements ApiVersionsInterface
{
    /**
     * Example format how changes in requests and resources are defined.
     *  [
     *    'Y-m-d => [
     *                'Class\Where\Change\Will\Be\Applied' => 'Class\That\Contains\The\Modification'
     *              ]
     *  ]
     *
     * @return array
     */
    public function getVersions(): array
    {
        return [];
    }
}
