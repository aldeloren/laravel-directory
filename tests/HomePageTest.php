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
        $test_names_multiple_entry = array(
          "swanson",
          "redd",
          "test dickinson",
          "vasquez"
        );

        $random_test = [rand(0, count($test_names_multiple_entry))];
        $this->visit('/')
          ->type('standifer', 'search')
          ->press('Search')
          ->seePageIs('/search/standifer');
    }
    public function testHomePageSearchFormSingleResult()
    {

        $test_names_single_entry = array(
          ["name" =>"delorenzo", "uid" => "aldelorenzo"],
          ["name" =>"jesse schmidt", "uid" => "jesseschmidt"],
          ["name" =>"fedro", "uid" => "fsz"],
          ["name" =>"basharat", "uid" => "basharat"],
        );
  
        $random_test = $test_names_single_entry[rand(0, count($test_names_single_entry))];
  
        $this->visit('/')
          ->type($random_test['name'], 'search')
          ->press('Search')
          ->seePageIs('/detail/' . $random_test['uid'] );
    }
}
