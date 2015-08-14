<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function searchList()
    {
      $data = [];
      $data['term']  = 'aldelorenzo';
      $data['results']  = '1';
      return view('search.searchList', $data);
    }
}
