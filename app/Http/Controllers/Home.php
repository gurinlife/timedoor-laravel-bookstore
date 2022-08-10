<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book as BookModel;

/**
 * @author Saka Mahendra Arioka
 *         saka@sakarioka.com
 *         6285338845666
 */
class Home extends Controller {

  protected $min_list = 10;
  protected $max_list = 100;

  public function __construct()
  {
    parent::__construct();

    $this->data['min_list'] = $this->min_list;
    $this->data['max_list'] = $this->max_list;
  }

  public function index(Request $request) 
  {
    // load model
    $mBook = new BookModel();

    // get input
    $list_shown = $request->input('list_shown', $this->min_list);
    $search     = $request->input('search', '');

    // set data
    $this->data['title'] = $this->data['title'].' :: Home';
    $this->data['books'] = $mBook->getAll($list_shown, $search);

    // set view
    return view('home.v_index', $this->data);
  }
}