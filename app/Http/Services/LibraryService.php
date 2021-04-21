<?php

namespace App\Http\Services;


use App\Models\Author;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class LibraryService
{
    /**
     * @param array $data
     * @return mixed
     */
    public static function searchBook(array $data)
    {
        $searchIds = Arr::get($data, 'authors', []);

        $bookList = Book::whereHas('authors', function (Builder $query) use ($searchIds) {
            $query->whereIn('author_id', $searchIds);
        })->get();
        return $bookList;
    }

    /**
     * @param array $data
     * @return Author
     */
    public static function createAuthor(array $data)
    {
        $author = new Author();
        $author->first_name  = Arr::get($data, 'first_name', '');
        $author->second_name = Arr::get($data, 'second_name', '');
        $author->last_name   = Arr::get($data, 'last_name', '');

        $author->save();
        return $author;
    }

    /**
     * @param array $data
     * @return Book
     */
    public static function createBook(array $data)
    {
        $book = new Book();
        $book->name = Arr::get($data, 'name', '');
        $book->save();
        $authorIds = Arr::get($data, 'authors', []);
        $book->authors()->attach($authorIds);
        return $book;
    }

    /**
     * @param array $data
     * @return Comment
     */
    public static function createComment(array $data)
    {
        $comment = new Comment();
        $comment->name  = Arr::get($data, 'name', '');
        $comment->comment  = Arr::get($data, 'comment', '');
        $comment->book_id  = Arr::get($data, 'book_id', '');
        $comment->save();
        return $comment;
    }
}
