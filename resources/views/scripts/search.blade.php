<script>
$(document).ready(function () {
    // load recent searches
    var localSearches = localStorage.recent_searches;
    if (!localSearches) {
        // If localstorage isn't instantiated, scaffold out 
        localSearchesJSON = {
            'searches': [],
            'results': []
        }
        localStorage.recent_searches = JSON.stringify(localSearchesJSON);
    } else {

    }
    // Capture search input
    $('#search-form').submit(function (e) {
        e.preventDefault();

        var jsonSearches = {},
            input = $('#search-form input[name="search"]').val(),
            searchesJSON = JSON.parse(localStorage.recent_searches),
            searchesArray = searchesJSON.searches;

        searchesArray.unshift(input);
        localStorage.recent_searches = JSON.stringify(searchesJSON);
        $(this).unbind("submit").submit();
    });
});
</script>
