<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreComment;
use App\Http\Resources\CommentResource;
use App\Http\Services\LibraryService;

class CommentController extends BaseController
{
    /**
     * @param StoreComment $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreComment $request)
    {
        $comment = LibraryService::createComment($request->all());
        return $this->sendResponse(new CommentResource($comment), 'Comment created.');
    }
}
