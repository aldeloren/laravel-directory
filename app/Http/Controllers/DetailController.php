<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ldap;

class DetailController extends Controller
{
    
  /* 
   * Return details about an individual found within the UF LDAP
   * Unauthenticated LDAP clients (such as this service) are limited to returning 
   * a very small amount of data on students:
   * 'uid', 'givenname', and 'edupersonprimaryaffiliation'.
   * Staff & faculty is less limited and often contains:
   * 'uid'             -> GatorLink username
   * 'givenname'       -> First name
   * 'mail'            -> Email address as supplied by user
   * 'telephonenumber' -> Office phone number
   * 'o'               -> Department level unit e.g.  'Web Services', 'Provost Office'
   * 'sn'              -> Surname 
   * 'title'           -> User supplied title(as input in myUFL), not offical job title
   * 'postaladdress'   -> On campus mailing address. Returned as string, new lines delineated by '$'
   * 'ufledupsdeptid'  -> 10 digit departmental identifier
   */
  public static function index($id)
  {
    // GatorLink can only contain letters, numbers, '.', and '-'
    if( preg_match("/^[\w.-]*$/", $id) ){
      $data = Ldap::find('people')->where('uid', $id)->get();
      if( count($data) > 0 ) {
        if( isset($data['telephonenumber']) ){
          $data['telephonenumber'] = str_replace('+1', '',  str_replace(' ', '', $data['telephonenumber'])); 
        }
        if( isset($data['ufleduofficelocation']) ){
          $data['ufleduofficelocation'] = substr_replace(str_replace('$', '<br />', $data['ufleduofficelocation']), '-', -4, 0);
        } 
        if( isset($data['postaladdress']) ){
          $data['postaladdress'] = substr_replace(str_replace('$', '<br />', $data['postaladdress']), '-', -4, 0);
        } 
        return view('detail.person', $data);
      } else {
        return redirect('/');
      }
    } else {
      return redirect('/');
    }
  }
}
