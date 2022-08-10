<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Author as AuthorModel;

/**
 * @author Saka Mahendra Arioka
 *         saka@sakarioka.com
 *         6285338845666
 */
class Author extends Controller {

  public function __construct()
  {
    parent::__construct();
  }

  public function index(Request $request) 
  {
    // load model
    $mAuthor = new AuthorModel();

    // set data
    $this->data['authors'] = $mAuthor->getAll();

    dd($this->data);

    // set view
    return view('author.v_index', $this->data);
  }
}