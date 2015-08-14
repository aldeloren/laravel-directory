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

    'searchscope' => 'SUBTREE_SCOPE',

    'attributes' => array(
        'uid',
        'givenname',
        'mail',
        'telephonenumber',
        'o',
        'sn',
        'title',
        'edupersonprimaryaffiliation',
        'ufleduofficelocation',
        'postaladdress',
        'ufledupsdeptid',
    )
);
