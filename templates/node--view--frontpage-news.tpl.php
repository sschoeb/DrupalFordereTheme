<div class="newscontainer">
	
	<div class="newstitle">
		<b><?php  print $title;?></b>
		
	</div>
	<div class="newsbody">
		<a href="<?php print $node_url;?>"><div class="newsimageplaceholder"></div></a>
		<h2 class="newsdate"><?php print $date;?></h2>
		<?php print render($content);?><a href="<?php print $node_url;?>">mehr...</a>
	</div>

</div>