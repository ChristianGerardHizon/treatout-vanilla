 <form method="POST" id="register">
	<input type="text" name="name" placeholder="full name">
	<input type="text" name="email" placeholder="email">
	<input type="password" name="password" placeholder="password">
	<input type="password" name="confirmpassword" placeholder="confirm password">
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
        success:function(data)
        {
          alert(data);
          window.location.reload();
        }
      });
  });
</script>
