<h1>Sign in or Register</h1>

<section class="login-card">
  <my-segmented-radio id="form-selector">
    <option value="sign-in">Sign In</option>
    <option value="register">Register</option>
    <option value="forgot" hidden>Forgot</option>
  </my-segmented-radio>

  <form id="form" action="NONE">
    <div class="on-login on-register">
      <label for="login">Login</label>
      <input type="text" id="login" />
    </div>

    <div class="on-register on-forgot">
      <label for="email">Email</label>
      <input type="text" id="email" />
    </div>

    <div class="on-login on-register">
      <div class="label-container">
        <label for="password">Password</label>
        <button id="forgot-btn" type="button" class="btn-link on-login">forgot password?</button>
      </div>
      <input type="password" id="password" />
    </div>

    <div class="on-register">
      <label for="confirm-password">Confirm password</label>
      <input type="password" id="confirm-password" />
    </div>

    <div class="on-login">
      <input type="checkbox" id="remember-me" />
      <label for="remember-me">Remember me</label>
    </div>

    <button type="button" class="btn-primary big">
      <span class="on-login">Sign In</span>
      <span class="on-register">Register</span>
      <span class="on-forgot">Send reset link</span>
    </button>
  </form>
</section>
