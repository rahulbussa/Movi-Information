<?php

class Movie_model extends CI_Model {

	 public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }


     public function getMovieData($movie){
     	$cleansedMovie = $this->clean_name($movie);
     	$OMAPI = "http://www.omdbapi.com/?t=".$cleansedMovie."&y=&plot=full&r=json";
     	$OMData = $this->getdatafromUrl($OMAPI);
     	$YOUKEY = $movie."+movie+trailer";
     	$YOUAPI = "http://gdata.youtube.com/feeds/api/videos?q=".$YOUKEY."&start-index=1&max-results=1&alt=json";
     	$YOUData = $this->getdatafromUrl($YOUAPI);
     	

     	//Processing json data
     	$image = $OMData['Poster'];
		$title = $OMData['Title'];
		$rating = $OMData['imdbRating'];
		$rel = $OMData['Released'];
		$time = $OMData['Runtime'];
		$genre = $OMData['Genre'];
		$director = $OMData['Director'];
		$writer = $OMData['Writer'];
		$Actors = $OMData['Actors'];
		$plot = $OMData['Plot'];


		//Process You tube Data
		$embededLink = $YOUData['feed']['entry'][0]['media$group']['media$player'][0]['url'];
		$embededLink=  str_replace("watch?v=", "embed/",$embededLink);
		$embededLink=  str_replace("&feature=youtube_gdata_player", "",$embededLink);

		//Send Final Data
		$final_result = "<div class='panel panel-primary'><div class='panel-heading'>".$movie." Movie Information</div><div class='panel-body'><table><tr><td><label>Image:</label></td><td><img class='img-rounded' heigth='140px' width='140px' src='".$image."'></td></tr><tr><td><label>Tiltle:</label></td><td>".$title."</td></tr><tr><td><label>Rating:</label></td><td>".$rating."</td></tr><tr><td><label>Release:</label></td><td>".$rel."</td></tr><tr><td><label>Runtime:</label></td><td>".$time."</td></tr><tr><td><label>Genre:</label></td><td>".$genre."</td></tr><tr><td><label>Director:<label></td><td>".$director."</td></tr><tr><td><label>Writer:</label></td><td>".$writer."</td><tr><td><label>Actors:</label></td><td>".$Actors."</td></tr><tr><td><label>Plot:</label></td><td>".$plot."</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr><br/><tr><td><label>Trailer:<label></td><td><iframe width='420' height='315' src='".$embededLink."'></iframe></td></tr><table></div></div>";

		echo $final_result;


     }

     public function clean_name($movie){
     	$movie = trim($movie);
		$movie = preg_replace('/\s+/', '+', $movie);
		return $movie;
     }

     public function getdatafromUrl($url){
     	$data = file_get_contents($url);
     	return json_decode($data,true);
     }

}

?>