<?php

function searchIMDB1($fromSearchField){
	$json=file_get_contents('https://www.omdbapi.com/?s=' . urlencode($fromSearchField));
	$info=json_decode($json, true);
	foreach ($info['Search'] as $item) {
		$movieID= $item['imdbID'];
	    $apiQueryUrl = 'https://www.omdbapi.com/?i=' . urlencode($movieID).'&r=XML&plot=full&tomatoes=true';
		$xml = file_get_contents($apiQueryUrl);
 		$xmlDocument = simplexml_load_string($xml); 
		if(count($xmlDocument)):
	    $result = $xmlDocument->xpath("//movie");
	    foreach ($result as $item):
	        $title = $item['title'];
		    $year = $item['year'];
		    $plot  = $item['plot'];
		    if ($item['poster'] <>"N/A"){
		    	$poster = $item['poster'];
		    } else {
		    	$poster = 'https://placehold.it/214x317';
		    }


			
		    $link = 'http://www.imdb.com/title/'.$item['imdbID'].'/';
	    	$runtime  = $item['runtime'];
			$actorlist  = $item['actors'];
			$directorName  = $item['director'];
			$movieRating  = $item['rated'];
			echo '

					<h4><strong><a href="'.$link .'">'.$title.'</a></strong></h4>
					<div class="row">
					  <div class="col-lg-2">';
					  		if ($poster<>''){
					  	echo '<a href="'.$link .'" target="_blank"><img src="'.$poster.'" alt="Poster for: '.$title.'" class="img-thumbnail"></a>';
				      		}
			echo '	   </div>
					  
					  <div class="col-lg-10">
					  	<p>Year: '.$year.'</p>
					  	<p>Rating: '.$movieRating.'</p>
					  	<p>Run Time: '.$runtime.'</p>
				        <p>Actors: '.$actorlist.'</p>
				        <p>Director: '.$directorName.'</p>
				        <p>
				          '.$plot.'
				        </p>
				        <p><a class="btn" href="'.$link .'" target="_blank">Read more</a> (<small>Opens in new window)</small></p>
				      </div>
					</div>

					<hr>';
	    endforeach;
	endif;
	}
}

?>
 