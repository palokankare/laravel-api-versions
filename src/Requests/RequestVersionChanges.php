<?php

namespace Klopal\ApiVersions\Requests;

use Klopal\ApiVersions\ChangesTrait;

trait RequestVersionChanges
{
    use ChangesTrait;

    /**
     * Apply changes to the request.
     *
     * @return mixed
     */
    public function applyChanges($rules)
    {
        foreach($this->changes() as $change) {
            $rules = call_user_func($change . '::change', $this, $rules);
        }

        return $rules;
    }
}
