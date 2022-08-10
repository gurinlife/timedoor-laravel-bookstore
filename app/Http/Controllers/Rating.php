<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book as BookModel;

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
    // set view
    return view('rating.v_index', $this->data);
  }
}