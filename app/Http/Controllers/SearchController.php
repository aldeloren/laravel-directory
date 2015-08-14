<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ldap;


class SearchController extends Controller
{
    public function searchList($term)
    {
    /*
     * Sanitize, and interpret user input,
     * return list of possible matches
     *
     */
      $n_term = strip_tags( trim($term) ); 
      $results = [];

      // Determine if search term is email 
      if( filter_var( $n_term, FILTER_VALIDATE_EMAIL) ){
        $data = Ldap::find('people')->where('mail', $n_term)->get();
        if( count($data) > 0 ){
          $uid = $data['uid'];
          // TODO use proper function to return route w/ params
          $route = '/detail/'. $uid;
          return redirect($route);
        }
      }
      else {
        // If the search contains a space, search by name(s)
        if ( strpos($n_term, " ") ){
          $names = explode(" ", $n_term);
          if( count($names === 2) ){
            $data = Ldap::find('people')->where('sn', $names[1])->get();
            $results['data'] = $data;
            $results['results'] = true;
            return view('search.searchList', $results);
          }
        }else{
          // Determine if term is a gatorlink 
          $data = Ldap::find('people')->where('uid', $n_term)->get();
          if( count($data > 0) ){
            $route = '/detail/' . $n_term;
            return redirect($route);
          }

        }
    
      }
      
      //return view('search.searchList', $data);
    }

}
