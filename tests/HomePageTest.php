<?php


use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    /**
     * A test to determine if the homepage content is loaded
     *
     * @return void
     */
    public function testCheckHomePageContent() 
    {
        $this->visit('/')
          ->see('SEARCH THE UNIVERSITY OF FLORIDA DIRECTORY')
          ->see('Site Updated')
          ->see('Searches within the UF directory can be done in the following methods');
    }
    public function testHomePageSearchFormMulitpleResults()
    {
        $this->visit('/')
          ->type('standifer', 'search')
          ->press('Search')
          ->seePageIs('/search/standifer');
    }
    public function testHomePageSearchFormSingleResult()
    {
        $this->visit('/')
          ->type('aldelorenzo', 'search')
          ->press('Search')
          ->seePageIs('/detail/aldelorenzo');
    }
}
