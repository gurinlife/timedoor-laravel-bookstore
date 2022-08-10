<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Author extends Model
{
  use HasFactory;

  public function getAll()
  {
    $data = DB::table('authors')
              ->selectRaw('
                authors.name as author_name,
                books.name as book_name, 
                AVG(ratings.rating) as average_rate,
                COUNT(*) voter
              ')
              ->join('books', 'books.author_id', '=', 'authors.id')
              ->join('ratings', 'ratings.book_id', '=', 'books.id')
              ->groupBy('authors.id')
              ->orderByDesc('voter')
              ->get();

    return $data;
  } 
}
