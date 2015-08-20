<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchTest extends TestCase
{
    /**
     * A test to determine if the search page content loads 
     *
     * @return void
     */

    public function testSearchWithoutTerm() 
    {
        // No search term should redirect to the homepage
        $this->visit('/search/')
          ->see('SEARCH THE UNIVERSITY OF FLORIDA DIRECTORY');
    }

    public function testSearches()
    {
        // Determine if the appropriate content is shown provided a single search term
        $search_terms = array(
          ["search" => "smith", "display" => "yielded 100 results and was limited by the directory application. Please try to refine your search to find the appropriate party."],
          ["search" => "standifer", "display" => "Your search for 'standifer' yielded 2 results."],
          ["search" => "Angie brown", "display" => "100 results, and was limited by the directory application. Please try to refine your search to find the appropriate party."],
          ["search" => "noresults", "display" =>"Your search for 'noresults' yielded 0 results."]
        );
        
        foreach ($search_terms as $search_term){
            $visited = '/search/' . $search_term["search"];
            $results = $search_term["display"];
            $this->visit($visited)
              ->see($results);
        }
    }

    public function testSingleResult()
    {
        $this->visit('/search/fedro')
          ->seePageIs('/detail/fsz');

    }
}
