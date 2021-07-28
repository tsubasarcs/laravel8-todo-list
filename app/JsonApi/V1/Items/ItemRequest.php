<?php

namespace App\JsonApi\V1\Items;

use App\Rules\IsBase64;
use App\Rules\IsLessThan2Megabytes;
use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class ItemRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:140'],
            'content' => ['nullable', 'string', 'max:300'],
            'attachment' => ['nullable', 'string', new IsBase64(), new IsLessThan2Megabytes()]
        ];
    }

}
