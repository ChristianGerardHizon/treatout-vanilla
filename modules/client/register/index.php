 <form method="POST" id="register">
	<input type="text" name="name" placeholder="full name" required>
	<input type="text" name="email" placeholder="email" required>
	<input type="password" name="password" placeholder="password" required>
	<input type="password" name="confirmpassword" placeholder="confirm password" required>
	<input type="submit">
</form>

<script type="text/javascript">
	
	$(document).on('submit', '#register', function(event) {
    event.preventDefault();
      $.ajax({
        url:"/modules/client/register/register.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        dataType :'JSON',
        success:function(data)
        {
          if(data.response) {

            var link = "index.php"
            window.location.href=link

          }
        }
      });
  });
</script>
