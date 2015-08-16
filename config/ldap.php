<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | LDAP Server
    |--------------------------------------------------------------------------
    |
    | Address of the LDAP Server
    |
    | Example: 'cas.myuniv.edu'.
    |
    */

    'server' => env('LDAP_HOST', 'ldap.ufl.edu'),

    /*
    |--------------------------------------------------------------------------
    | LDAP Port (389 is default)
    |--------------------------------------------------------------------------
    */

    'port' => env('LDAP_PORT', '389'),

    /*
    |--------------------------------------------------------------------------
    | LDAP Base DN
    |--------------------------------------------------------------------------
    */

    'basedn' => env('LDAP_BASE_DN', 'dc=ufl,dc=edu'),

    /*
    |--------------------------------------------------------------------------
    | Managed Organisation Units (OU)
    | Only people works for now
    |--------------------------------------------------------------------------
    */

    'organisationUnits' => ['people', 'groups'],

    /*
    |--------------------------------------------------------------------------
    | LDAP ADMIN bind DN
    |--------------------------------------------------------------------------
    */

    'binddn' => env('LDAP_BIND_DN', ''),

    /*
    |--------------------------------------------------------------------------
    | LDAP ADMIN bind password
    |--------------------------------------------------------------------------
    |
    */
    'bindpwd' => env('LDAP_BIND_PASSWORD'),

    /*
    |--------------------------------------------------------------------------
    | Cache time-to-live value in minutes.
    | How long should we cache result if found
    |--------------------------------------------------------------------------
    */

    'cachettl'   => 60,

    /*
    |--------------------------------------------------------------------------
    | Caching & Results array key.
    | This is typically a unique attribute from the directory OU
    |--------------------------------------------------------------------------
    */

    'key'        => 'dn',

    /*
    |--------------------------------------------------------------------------
    | Default filter attribute
    | Will be used when calling short method like :
    | Ldap::people('xavrsl')->displayname;
    |--------------------------------------------------------------------------
    */

    'filter'        => 'login',

    /*
    |--------------------------------------------------------------------------
    | User dn used for user authentication.
    | This is the distinguished name of a user that will authenticate to
    | the directory using a BIND. Typically named 'dn'
    |--------------------------------------------------------------------------
    */

    'userdn'     => 'dn',

    /*
    |--------------------------------------------------------------------------
    | Limit on returned entries.
    | LDAP server defines max responses (typically 500-1000), but client can
    | define lower settings.
    | Suppressing server limit warning.
    |--------------------------------------------------------------------------
    */
  
    'limit'      => 100,

   /*
    |--------------------------------------------------------------------------
    | Exclude attributes from search 
    | This is useful for is your organization sunsets individuals active 
    | active status by changing the affiliation.
    | TODO: Allow for an array of exclusions, presently only single allowed. 
    |--------------------------------------------------------------------------
    */
  
    'exclude'     => '|(eduPersonPrimaryAffiliation=affiliate)(edupersonprimaryaffiliation=member)',

    'searchscope' => 'SUBTREE_SCOPE',

    'attributes' => array(
        'uid',
        'mail',
        'telephonenumber',
        'o',
        'cn',
        'givenname',
        'sn',
        'title',
        'edupersonprimaryaffiliation',
        'ufleduofficelocation',
        'postaladdress',
        'ufledupsdeptid',
    )
);
