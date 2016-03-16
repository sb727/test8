<?php
	if(isset($hotels)){
		foreach ($hotels as $hotel) {
			echo '<section class="section-1 col-sm-6 col-md-3">
				<div>
					<a href="SiteController?id='.$hotel['id'].'">
						<img class="slide" src="http://www.example.com/CodeIgniter/CodeIgniter-3.0.5/'.$hotel['url'].'"></a></div><div><p class="hotel-name" id="hotel-name-'.$hotel['id'].'">'.$hotel['title'].'</p><p>'.$hotel['description'].'</p></div></section>';
		}
	}else{
		echo "No result!Please research!";
	}
?>