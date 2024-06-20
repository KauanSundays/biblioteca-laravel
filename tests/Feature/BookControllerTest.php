<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function all_books_are_returned()
    {
        $books = Book::factory()->count(3)->create();

        $response = $this->get(route('books.indexJson'));

        $response->assertStatus(200);

        $books->each(function ($book) use ($response) {
            $response->assertJsonFragment([
                'id' => $book->id,
                'title' => $book->title,
                'description' => $book->description,
                'image_url' => $book->image_url,
                'is_favorite' => $book->is_favorite ? 1 : 0,
            ]);
        });
    }
}
