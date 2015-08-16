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

            // Format name to follow known 'cn' structure
            // Allen Rout maintains UFL specific documentation on the UFL LDAP schema
            // http://nersp.nerdc.ufl.edu/~asr/ldap-for-services/uf-ldap-2003.html
            // https://open-systems.ufl.edu/content/uf-ldap-schema
            $common_name = $names[1] . ',' . $names[0] . '*';  
            $data = Ldap::find('people')->where('cn', $common_name)->get();

            $total_results = $this->count_results($data);

            if($total_results === 0){
              $results = false;
              return view('search.searchList', compact('data', 'results'));
            }elseif($total_results === 1){
              $route = '/detail/' . $data['uid'];
              return redirect($route);
            }else{
              $results = true;
              usort($data, array($this, 'alpha_sort'));
              return view('search.searchList', compact('data', 'results'));
            }
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

  /*
   * Determine total count of results 
   * If none, return 0
   * If only one return 1 
   * If multiple, return 2
   *
   * @return int 
   */

  public function count_results($returned_data){
    // Determine if there is only one result
    // TODO Better solution for determining nexted array (multiple results)
    if (count($returned_data) === 0){
      return 0;
    } elseif ( isset($returned_data['uid']) ){
      return 1;
    } else {
      return 2;
    }
  }

  /*
   * Sort results by last name 
   * More specifically, uses the 'cn' attribute, which assumes that name(s) are entered correctly
   * This may not be true, and may need to be validated further
   *
   * @return sorted nested array
   */
  public function alpha_sort($a1, $a2){ 
    return strcmp(str_replace(' ', '',strtolower($a1["cn"])), str_replace(' ', '', strtolower($a2["cn"])));
  }

}
