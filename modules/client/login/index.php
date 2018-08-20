<form method="POST" id="login">
	<input type="text" name="email" placeholder="email">
	<input type="password" name="password" placeholder="password">
	<input type="submit">
</form>

<script type="text/javascript">
        $(document).ready(function(){
  $(document).on('submit', '#login', function(event) {
    event.preventDefault();
      $.ajax({
        url:"/modules/client/login/login.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        dataType: 'JSON',
        success:function(res)
        {
          if(res.login){

            var link = "index.php"
            window.location.href=link

          }else{

              alert("Invalid login information.")
          }
        }
      });
  });
});
</script>

