<?php

namespace App\Http\Requests\Author;

use App\Http\Requests\BaseValidateRequest;

class StoreAuthor extends BaseValidateRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required'
        ];
    }
}
