<?php


	if($list= $places->search($_POST['searchvalue'], $_POST['minrate'], $_POST['maxrate'])) {

	foreach ($list as $value) {
?>
<div class="inner">
	<div class="highlights">	
		<section>
        <div class="content card">
          <header>
           <a href="index.php?mod=places&place=<?php echo $value->place_id; ?>&name=<?php echo $value->name; ?> "> <h3><?php echo $value->name?></h3></a>
          </header>
          <h2></h2>
          <p><?php echo 'Estimated price range <br> Php'.$value->rate_min.'-'.$value->rate_max; ?></p>
        </div>
      </section>
	</div>
</div>	
<?php
	}
} else 
  echo "<p style='margin-left: 47%;'> No results found.. </p>"
?>
