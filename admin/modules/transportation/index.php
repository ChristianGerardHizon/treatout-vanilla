<link rel="stylesheet" type="text/css" href="modules/transportation/transportation.css">
<div id="heading" >
	<h1> 
		Transportations
	</h1>
</div>
<br>
<button style="margin-left: 20px;" type="button" id="btn-add" data-toggle="modal" data-target="#annModal" class="button primary icon fa-map">New Transportation</button></h3>



<div class='inner'>
	<div class='highlights'>	
<?php

$list = $transportation->getAll();

foreach ($list as $value) {
	
echo "
		<section>
		    <div class='content card'>
		      <header>
		        <h3>$value->name</h3>
		      </header>
		
		      <p>$value->description</p>
		      

		      <button id='$value->trans_id' type='button' class='btn-edit' >Edit</button>
		    </div>


		</section>
";
}

?>
	</div>
</div>