<?php

namespace App\Http\Requests\Comment;

use App\Http\Requests\BaseValidateRequest;

class StoreComment extends BaseValidateRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'comment' => 'required',
            'book_id' => 'integer|exists:books,id'
        ];
    }
}
