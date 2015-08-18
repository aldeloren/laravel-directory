<div class="search-info col col-sm-3">
  @include('forms.search')
  <div id="search-history">
    <div id="recent-searches"></div>
    <div id="recent-results"></div>
  </div>

  @include('scripts.search')
<script>
$(document).ready(function () {
    var recentResults = JSON.parse(localStorage.recent_searches),
        searches = recentResults.searches;
    results = recentResults.results;

    if (searches.length > 0) {
        loadSearches(searches);
    }
    if (results.length > 0) {
        loadResults(results);
    }

    function loadSearches(searches) {
        var searchHTML = "<h4 class='text-center'>Recent Searches</h4><ul class='list-unstyled'>",
            count = 0;

        $.each(searches, function (key, val) {
            if (count < 5) {
                var searchLink = "<li><a href='/search/" + val + "'>" + val + "</a></li>";
                searchHTML += searchLink;
                count++;
            }
        });
        searchHTML += "</ul>";
        $('#recent-searches').html(searchHTML);
    }

    function loadResults(results) {
        var resultHTML = "<h4 class='text-center'>Recent Results</h4><ul class='list-unstyled'>",
            count = 0;

        $.each(results, function (key, val) {
            if (count < 5) {
                var resultLink = "<li><a href='/detail/" + val.uid + "'>" + val.name + "</a></li>";
                resultHTML += resultLink;
                count++;
            }
        });
        resultHTML += "</ul>";
        $('#recent-results').html(resultHTML);
    }
});
</script>
</div><!-- ./search-info -->

