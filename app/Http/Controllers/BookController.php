<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\SearchBook;
use App\Http\Requests\Book\StoreBook;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookWithRelationsResource;
use App\Http\Services\LibraryService;
use App\Models\Book;

class BookController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Book::all();
        return $this->sendResponse(new BookCollection($books), '');
    }

    /**
     * @param SearchBook $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(SearchBook $request)
    {
        $books = LibraryService::searchBook($request->all());
        return $this->sendResponse(new BookCollection($books), '');
    }

    /**
     * @param StoreBook $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreBook $request)
    {
        $book = LibraryService::createBook($request->all());
        return $this->sendResponse(new BookWithRelationsResource($book), 'Book created.');
    }

    /**
     * @param Book $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Book $book)
    {
        return $this->sendResponse(new BookWithRelationsResource($book), '');
    }

    /**
     * @param Book $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return $this->sendResponse([], 'Book deleted');
    }
}
