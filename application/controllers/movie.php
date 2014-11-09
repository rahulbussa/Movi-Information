<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movie extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	public function getdata($movie){
		$movie = trim($movie);
		$movie = preg_replace('/\s+/', '+', $movie);
		
		$myurl = "http://www.omdbapi.com/?t=".$movie."&y=&plot=full&r=json";
		
		$tarilerkey = $movie."+movie+trailer";
		//echo $myurl;
		//echo "<br>";
		$data = file_get_contents($myurl);
		//echo $data;
		//echo "<br/>";
		//$res = $data;
		$res2 = json_decode($data,true);
		//echo $res2;
		$image = $res2['Poster'];
		$title = $res2['Title'];
		$rating = $res2['imdbRating'];
		$Year = $res2['Year'];
		$rel = $res2['Released'];
		$time = $res2['Runtime'];
		$genre = $res2['Genre'];
		$director = $res2['Director'];
		$writer = $res2['Writer'];
		$Actors = $res2['Actors'];
		$plot = $res2['Plot'];

		$you= "http://gdata.youtube.com/feeds/api/videos?q=".$tarilerkey."&start-index=1&max-results=1&alt=json";
		$trailerdata = file_get_contents($you); 
		$youlink = json_decode($trailerdata, true);
		//echo $youlink->{'feed'}->{'media$group'}->{'media$category'};
		$embededLink = $youlink['feed']['entry'][0]['media$group']['media$player'][0]['url'];
		$embededLink=  str_replace("watch?v=", "embed/",$embededLink);
		$embededLink=  str_replace("&feature=youtube_gdata_player", "",$embededLink);
		//$embededLink = $embededLink."&output=embed";
		$result = "<table><tr><td>Image:</td><td><img class='img-rounded' heigth='140px' width='140px' src='".$image."'></td></tr><tr><td>Tiltle:</td><td>".$title."</td></tr><tr><td>Rating:</td><td>".$rating."</td></tr><tr><td>Release Year:</td><td>".$Year."</td></tr><tr><td>Release:</td><td>".$rel."</td></tr><tr><td>Runtime:</td><td>".$time."</td></tr><tr>		<td>Genre:</td><td>".$genre."</td></tr><tr><td>Director:</td><td>".$director."</td></tr><tr><td>Writer:</td><td>".$writer."</td><tr><td>Actors:</td><td>".$Actors."</td></tr><tr><td>Plot:</td><td>".$plot."</td></tr><tr><td>Trailer:</td><td><iframe width='420' height='315'
src='".$embededLink."'></iframe></td></tr><table>";
		echo $result;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */