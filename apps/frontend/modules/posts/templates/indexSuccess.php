<h1 id='title'>TianTian</h1>
<Body>
	<?php
		foreach($day as $posts){ 
			//func: 循环所有天的帖子（posts）
			$output = "<div class='day' >";
			$output .= "<div class='release_marker'>".$posts[0]->getReleaseDate()."</div>";
			//foreach() 5
			// $post = array(p, p, p)
			foreach($posts as $post){
				//func:  循环每一个帖子（post）
				$output2 = '';
				$output2 .= "<div class='post'><span class='release_date'><br/>";
				$output2 .= "	<span class='type'> type: ".$post->getType()."</span>";
				$output2 .= "	<a href = ".$post->getContent()."><span class='content'> content: ".$post->getContent()."</span></a>";
				$output2 .= "</div>"; // post	
				$output.=$output2;
			} //foreach(posts)
			$output.= "</div>";
			
			echo $output;
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
