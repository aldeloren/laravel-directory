<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class PagesController extends Controller
{

  public function home()
  {
      return view('home');
  }

  public function search(SearchRequest $request)
  {
    $search_term = $request->get('search');
    return redirect()->route('search', $search_term);
  }

}
