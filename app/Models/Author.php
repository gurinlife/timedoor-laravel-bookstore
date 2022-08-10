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
              ->select(
                'id as author_id',
                'name as author_name'
              )
              ->orderBy('author_name')
              ->get();

    return $data;
  } 

  public function getAllWithRating()
  {
    $data = DB::table('authors')
              ->selectRaw('
                authors.name as author_name,
                AVG(ratings.rating) as average_rate,
                COUNT(*) as voter
              ')
              ->join('ratings', 'ratings.author_id', '=', 'authors.id')
              ->where('ratings.rating', '>', 5)
              ->groupBy('authors.id')
              ->orderByDesc('voter')
              ->limit(10)
              ->get();

    return $data;
  } 
}
