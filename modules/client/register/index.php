<div class="logincontainer" >
    <section>
        <div class="loginform">
          <header>
            <h3>Register</h3>
          </header>
 <form method="POST" id="register">
  <input type="text" name="name" placeholder="full name" required>
  <br>
  <input type="email" name="email" placeholder="email" required>
  <br>
  <input id="password" type="password" name="password" placeholder="password" required>
  <br>
  <input id="confirmPassword" type="password" name="confirmpassword" placeholder="confirm password" required>
  <br>
  <div class="g-recaptcha" data-sitekey="6LfcT28UAAAAANGMbzeJO6Wi4cO0ID8SSukQ881K" data-callback="captchaCallback"></div>
  <br/>
  <input type="submit">
</form>
        </div>
  </section>
</div>
<script src="modules/client/register/register.js"></script>
