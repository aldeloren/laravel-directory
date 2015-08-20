<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailTest extends TestCase
{
    /**
     * A test to determine if the detail/individual view returns the appropriate directory data
     *
     * @return void
     */

    public function testDetailPageContent() 
    {
      $this->visit('/detail/brandonvega/')
        ->see('<strong>Title:</strong>')
        ->see('<strong>Email:</strong> <a href="mailto:')
        ->see('<strong>Telephone:</strong> <a href="tel:')
        ->see('<strong>Office Address:</strong>')
        ->see('<strong>Mailing Address:</strong>');
    }
}
