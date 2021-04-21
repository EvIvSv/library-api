<?php

namespace App\Http\Controllers;

use App\Http\Requests\Author\StoreAuthor;
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\AuthorWithRelationResource;
use App\Http\Services\LibraryService;
use App\Models\Author;

class AuthorController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->sendResponse(new AuthorCollection(Author::all()), '');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAuthor $request)
    {
        $author = LibraryService::createAuthor($request->all());
        return $this->sendResponse(new AuthorWithRelationResource($author), 'Author created.');
    }

    /**
     * @param Author $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Author $author)
    {
        return $this->sendResponse(new AuthorWithRelationResource($author), '');
    }


    public function destroy(Author $author)
    {
        $author->delete();
        return $this->sendResponse([], 'Author deleted');
    }
}
