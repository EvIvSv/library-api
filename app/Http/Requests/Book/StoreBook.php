<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\BaseValidateRequest;

class StoreBook extends BaseValidateRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'authors'  => 'required',
            'authors.*' => 'integer|exists:authors,id'
        ];
    }
}
