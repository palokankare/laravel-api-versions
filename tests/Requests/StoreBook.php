<?php

namespace Klopal\ApiVersions\Test\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Klopal\ApiVersions\Requests\RequestVersionChanges;

class StoreBook extends FormRequest
{
    use RequestVersionChanges;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->applyChanges([
            'name'      => 'required|max:255',
            'author'    => 'required|max:255',
            'published' => 'date',
        ]);
    }
}
