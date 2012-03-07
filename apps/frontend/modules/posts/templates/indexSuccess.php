<h1 id='title'>TianTian</h1>
<Body>
	<?php
		foreach($day as $posts){ 
			//func: Ñ­»·ËùÓÐÌìµÄÌû×Ó£¨posts£©
			$output = "<div class='day' >";
			// exit($posts[0]->getReleaseDate());
			$str = $posts[0]->getReleaseDate();
			$date = date_create_from_format('Y-n-j', $str);
			//date('Y-n-j', $date_time)
			// exit(date_format($date, 'Y-m-d'));
			// exit(date_format('Y-n-j', $date_time));
			$string = date_format($date, 'Y').'å¹´'.date_format($date, 'n').'æœˆ'.date_format($date, 'j').'æ—¥';
			$output .= "<div class='release_marker'>".$string."</div>";
			//foreach() 5
			// $post = array(p, p, p)
			foreach($posts as $post){
				//func:  Ñ­»·Ã¿Ò»¸öÌû×Ó£¨post£©
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
