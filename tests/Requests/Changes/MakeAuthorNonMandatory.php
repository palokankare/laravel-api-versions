<?php

namespace Klopal\ApiVersions\Test\Requests\Changes;

class MakeAuthorNonMandatory
{
    /**
     * @param $self
     * @param $rules
     * @return mixed
     */
    public static function change($self, $rules)
    {
        $rules['author'] = 'max:255';

        return $rules;
    }
}