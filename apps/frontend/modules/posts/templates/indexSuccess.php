<h1 id='title'>Tian posts List</h1>
<Body>
	<?php
		foreach($day as $posts){ 
			//func: 循环所有天的帖子（posts）
			echo "<div class='day' >".$posts[0]->getReleaseDate();
			//foreach() 5
			// $post = array(p, p, p)
			foreach($posts as $post){
				//func:  循环每一个帖子（post）
				$output = '';
				$output .= "<div class='post'><span class='release_date'><br/>";
				// $output .= "	<span class='id'> Id: ".$post->getId()."</span><br/>";
				$output .= "	<span class='type'> type: ".$post->getType()."</span>";
				$output .= "	<span class='content'> content: ".$post->getContent()."</span>";
				// $output .= "	<span class='release_date'> release_date: ".$post->getReleaseDate()."</span><br/>";
				$output .= "</div>"; // post	
				echo $output;
			} //foreach(posts)
			
			echo "</div>";
		} //foreach($day)
	?>
	
	<!--<div class = 'day'> <?php //echo $tomo_posts[0]->getReleaseDate();?>
		 <?php
			//foreach() 5
			//$post = array(p, p, p)
			// foreach($tomo_posts as $post){
				// $output = '';
				// $output .= "<div class='post'><span class='release_date'><br/>";
				//$output .= "	<span class='id'> Id: ".$post->getId()."</span><br/>";
				// $output .= "	<span class='type'> type: ".$post->getType()."</span>";
				// $output .= "	<span class='content'> content: ".$post->getContent()."</span>";
				//$output .= "	<span class='release_date'> release_date: ".$post->getReleaseDate()."</span><br/>";
				// $output .= "</div>"; // post	
				// echo $output;
			// } //foreach()
		 ?>
	// </div> <!--day-->
</Body>
