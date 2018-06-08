<?php

namespace  Klopal\ApiVersions\Test\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use \Klopal\ApiVersions\Resources\ResourcesVersionChanges;

class BookResource extends JsonResource
{
    use ResourcesVersionChanges;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $array =  [
            'name'      => $this->name,
            'published' => $this->published,
        ];

        return $this->applyChanges($request, $this, $array);
    }
}
