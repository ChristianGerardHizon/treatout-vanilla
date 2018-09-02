<div class="logincontainer" >
    <section>
        <div class="loginform">
          <header>
            <h3>Register</h3>
          </header>
 <form method="POST" id="register">
  <input type="text" name="name" placeholder="full name" required>
  <br>
  <input type="text" name="email" placeholder="email" required>
  <br>
  <input type="password" name="password" placeholder="password" required>
  <br>
  <input type="password" name="confirmpassword" placeholder="confirm password" required>
  <br>
  <input type="submit">
</form>
        </div>
  </section>
</div>

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
