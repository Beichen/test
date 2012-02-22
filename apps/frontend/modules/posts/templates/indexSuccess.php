<h1 id='title'>Tian posts List</h1>
<h2 > Posts</h2>
<?php
	// $post = array(p, p, p)
	foreach($posts as $post){
		$output = '';
		$output .= "<div class='post'>Post<br/>";
		$output .= "	<span class='id'> Id: ".$post->getId()."</span><br/>";
		$output .= "	<span class='type'> type: ".$post->getType()."</span><br/>";
		$output .= "	<span class='content'> content: ".$post->getContent()."</span><br/>";
		$output .= "	<span class='release_date'> release_date: ".$post->getReleaseDate()."</span><br/>";
		$output .= "</div>"; // post
		
		echo $output;
	} //foreach()
?>

