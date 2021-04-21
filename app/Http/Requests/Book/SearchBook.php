<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\BaseValidateRequest;

class SearchBook extends BaseValidateRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'authors.*' => 'integer'
        ];
    }
}
