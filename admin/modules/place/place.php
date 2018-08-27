<?php
$module = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$place = (isset($_GET['place']) && $_GET['place'] != '') ? $_GET['place'] : '';
$placename = (isset($_GET['name']) && $_GET['name'] != '') ? $_GET['name'] : '';

// echo $module
?>
<link rel="stylesheet" type="text/css" href="modules/place/place.css">

<section id="main" class="wrapper">
    <div class="inner">
            <div class="content">
            <h1><b id="title"></b></h1>
            <h2><b id="rating"></b></h2>

            <ul class="alt">
                <li id="description"></li>
                <li id="phoneNum"></li>
                <li id="avail"></li>
            </ul>

            <a href="index.php?mod=terminal&place_id=<?php echo $place ?>&name=<?php echo $_GET['name']; ?>" class="button primary icon fa-map">Terminals</a>

            <?php


                    $res = $places->checkPlace($place);

                    if($res == 0) {

                        echo  '<button type="button" id="btn-add-ann" data-toggle="modal" data-target="#annModal" class="button primary icon fa-map">Add Details</button></h3>';




                    } else {

                        echo  '<a href="index.php?mod=terminal&place_id'.$place.'&name='.$_GET['name'].'" class="button primary icon fa-map">Edit</a>';
                    }

            ?>
       
          

            </div>
        </div>
        <div class="inner">
            <div class="content">
            <h2>Gallery</h2>
            <span id="imageReference"></span>
            <br/>
            </div>
        </div>
<div class="inner">
            <div class="content">
            <h2> Reviews</h2>

            <!-- Reviews -->
            <span id="reviews">
            </span>
            <br/>
        </div>
    </div>
</div>

<div id="myModal" class="modal">
 
  <div class="modal-content">
  <div class="modal-header">
    <span class="close">&times;</span>
    <h3>Add details</h3>
  </div>

  <div class="modal-body">
        <form method="post" id="user_form" enctype="multipart/form-data">
            <label>Minimum Rate</label>
            <input type="number" step="0.00"  name="minrate" id="minrate" class="form-control" />
            <br>
            <label>Maximum Rate</label>
            <input type="number"  step="0.00" name="maxrate" id="maxrate" class="form-control" />
            <br>
            <label>Location Type</label>        
            <select style="width: 50%;" name="type" id="loctype" class="form-control" required>
                <option>
                  Tourist Spot
                </option>
                <option>
                   Restaurant
                </option>                              
                                
            </select>
            <br>            
        
  </div>

    <div class="modal-footer">
        <input type="hidden" name="place_id" id="placeid" value="<?php echo $place; ?>" />
        <input type="submit" name="action" id="action" value="Add" />
    </div>

</form>

</div>

</div>

<script src="modules/place/place.js"></script>
<script type="text/javascript">

$(document).ready(function(){

    // Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

$(document).on('click', '#btn-add-ann', function(event) {

      modal.style.display = "block";
});


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$(document).on('submit', '#user_form', function(event){
        event.preventDefault();

        var minrate = $('#minrate').val();
        var maxrate = $('#maxrate').val();

            if(minrate != '' && maxrate !='')
            {
                $.ajax({
                    url:"modules/place/insert.php",
                    method:'POST',
                    data:new FormData(this),
                    contentType:false,
                    processData:false,
                    dataType: 'JSON',
                    success:function(data)
                    {
                        alert(data.msg);
                        $('#user_form')[0].reset();
                         modal.style.display = "none";
                         location.reload();
                       
                    }
                });
            }
            else
            {
                alert("Please fill up required information!");
            }
});
});   

</script>
<!-- <div id="right-panel"></div>
<div id="map"></div> -->