<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ldap;

class DetailController extends Controller
{
    
  public static function index($id)
  {
    $data = [];
    $data = Ldap::find('people')->where('uid', 'aldelorenzo')->get('displayname');
    //return view('detail.person', $data);
    return $data;
  }
}
