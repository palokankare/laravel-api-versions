<?php

return [
    /**
     * This class is responsible for returning an array that defines API versions and
     * changes that is made to Form Request or Resource classes.
     *
     * Should implement 'ApiVersionsInterface'.
     */
    'api_versions' => \Klopal\ApiVersions\DefaultApiVersions::class,

    /**
     * This class is responsible for returning used API version.
     *
     * Should implement 'UsedApiVersionsInterface'.
     */
    'used_version' => \Klopal\ApiVersions\DefaultUsedApiVersion::class,
];
