<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author as AuthorModel;
use App\Models\Book as BookModel;
use App\Models\Rating as RatingModel;

/**
 * @author Saka Mahendra Arioka
 *         saka@sakarioka.com
 *         6285338845666
 */
class Rating extends Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index(Request $request) 
  {
    // load model
    $mAuthor = new AuthorModel();

    // set data
    $this->data['title'] = $this->data['title'].' :: Add Rating';
    $this->data['authors'] = $mAuthor->getAll();

    // set view
    return view('rating.v_index', $this->data);
  }

  public function getBooksByAuthor(Request $request)
  {
    // load model
    $mBook = new BookModel();

    $authorId   = $request->input('author_id');
    $books      = $mBook->getAllByAuthorId($authorId);
    $returnData = !empty($books) ? $books->toArray() : [];

    return response()->json($returnData);
  }

  public function add(Request $request)
  {
    RatingModel::create([ 
      'author_id' => $request->input('author'),
      'book_id'   => $request->input('book'),
      'rating'    => $request->input('rating')
    ]);

    return redirect()->route('home');
  }
}