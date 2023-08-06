<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                "book_code" => "B001",
                "title" => "The Great Gatsby",
                "author" => "F. Scott Fitzgerald",
                "slug" => "the-great-gatsby",
                "publication_date" => "1925-04-10",
                "status" => "available",
                "description" => "The Great Gatsby is a 1925 novel by American writer F. Scott Fitzgerald. Set in the Jazz Age on Long Island, the novel depicts narrator Nick Carraway's interactions with mysterious millionaire Jay Gatsby and Gatsby's obsession to reunite with his former lover, Daisy Buchanan.",
                "cover" => "https://images-na.ssl-images-amazon.com/images/I/51o5RmQtroL._SX331_BO1,204,203,200_.jpg",
            ],
            [
                "book_code" => "B002",
                "title" => "The Catcher in the Rye",
                "author" => "J. D. Salinger",
                "slug" => "the-catcher-in-the-rye",
                "publication_date" => "1951-07-16",
                "status" => "available",
                "description" => "The Catcher in the Rye is a story by J. D. Salinger, partially published in serial form in 1945–1946 and as a novel in 1951. It was originally intended for adults but is often read by adolescents for its themes of angst, alienation, and as a critique on superficiality in society.",
                "cover" => "https://images-na.ssl-images-amazon.com/images/I/51o5RmQtroL._SX331_BO1,204,203,200_.jpg",
            ],
            [
                "book_code" => "B003",
                "title" => "The Grapes of Wrath",
                "author" => "John Steinbeck",
                "slug" => "the-grapes-of-wrath",
                "publication_date" => "1939-04-14",
                "status" => "available",
                "description" => "The Grapes of Wrath is an American realist novel written by John Steinbeck and published in 1939. The book won the National Book Award and Pulitzer Prize for fiction, and it was cited prominently when Steinbeck was awarded the Nobel Prize in 1962.",
                "cover" => "https://images-na.ssl-images-amazon.com/images/I/51o5RmQtroL._SX331_BO1,204,203,200_.jpg",
            ],
        ];
        foreach ($books as $book) {
            \App\Models\Book::create($book);
        }
    }
}
