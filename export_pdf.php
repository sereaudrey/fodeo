<?php
    
    //inclure les fonctions 
    require("function.php");

    //tableaux
    $data_movie = getDataMovie();
    // print_r($data_movie);
    

    foreach ($data_movie as $value){
        $id_movie = $data_movie['id_movie'].'<br>';
        $type = $data_movie['type'].'<br>';
        $title = $data_movie['title'].'<br>';
        $genre = $data_movie['genre'].'<br>';
        $release_date = $data_movie['release_date'].'<br>';
        $directors = $data_movie['directors'].'<br>';
        $actors = $data_movie['actors'].'<br>';
        $synopsis = $data_movie['synopsis'].'<br>';
        $rate = $data_movie['rate'].'<br>';
        $platform_name = $data_movie['platform_name'].'<br>';
        $platform_availability = $data_movie['title'].'<br>';
    }
    echo "title : ".$title;

?>