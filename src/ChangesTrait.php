<?php

namespace Klopal\ApiVersions;

use Illuminate\Container\Container;

trait ChangesTrait
{
    /**
     * Get changes that should be applied to given class.
     *
     * @return array
     */
    protected function changes()
    {
        $changesToApply = [];
        $extendedClass = get_called_class();

        $container = Container::getInstance();
        $versions = $container->make('Klopal\ApiVersions\ApiVersionsInterface');
        $usedVersion = $container->make('Klopal\ApiVersions\UsedApiVersionInterface');

        // Loop through version changes from top down.
        foreach($versions->getVersions() as $date => $changes) {
            // Take account versions that are same or newer than used version.
            if ($date >= $usedVersion->getVersion()) {
                foreach($changes as $resourceName => $change) {
                    // Collect changes to array that are made to extended class.
                    if ($resourceName === $extendedClass) {
                        $changesToApply[] = $change;
                    }
                }
            } else {
                // Leave the loop when an older version is reached.
                break;
            }
        }

        return $changesToApply;
    }
}
