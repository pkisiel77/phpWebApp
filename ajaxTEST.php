<?php
//losowy kod zeby sprawdzic czy to wogole cos zwraca ale pokazuje no search term provided
if(isset($_POST['searchterm'])) {
    $searchTerm = $_POST['searchterm'];
    
    // Simulated search results for demonstration purposes
    $results = array(
        "apple" => "Apple is a fruit.",
        "banana" => "Banana is a fruit.",
        "orange" => "Orange is a fruit."
    );

    // Check if the search term exists in the results array
    if(array_key_exists($searchTerm, $results)) {
        echo $results[$searchTerm];
    } else {
        echo "No results found for '$searchTerm'.";
    }
} else {
    echo "No search term provided.";
}
?>