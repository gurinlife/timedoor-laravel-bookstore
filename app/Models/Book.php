<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Book extends Model
{
  use HasFactory;

  public function getAll($limit, $searchText)
  {
    $data = DB::table('books')
              ->selectRaw('
                books.name as book_name, 
                categories.name as category_name, 
                authors.name as author_name,
                AVG(ratings.rating) as average_rate,
                COUNT(*) voter
              ')
              ->join('authors', 'authors.id', '=', 'books.author_id')
              ->join('categories', 'categories.id', '=', 'books.category_id')
              ->join('ratings', 'ratings.book_id', '=', 'books.id')
              ->where('books.name', 'LIKE', '%'.$searchText.'%')
              ->orWhere('authors.name', 'LIKE', '%'.$searchText.'%')
              ->groupBy('books.id')
              ->orderByDesc('average_rate')
              ->limit($limit)
              ->get();

    return $data;
  }
}
