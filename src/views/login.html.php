<main>
  <h1>Sign in or Register</h1>

  <section class="login-card">
    <my-segmented-radio id="form-selector">
      <option value="sign-in">Sign In</option>
      <option value="register">Register</option>
    </my-segmented-radio>

    <form id="form" action="NONE">
      <div>
        <label for="login">Login</label>
        <input type="text" id="login" />
      </div>

      <div class="register-only">
        <label for="email">Email</label>
        <input type="text" id="email" />
      </div>

      <div>
        <div class="label-container">
          <label for="confirm-password">Confirm password</label>
          <button type="button" class="btn-link login-only">forgot password?</button>
        </div>
        <input type="password" id="password" />
      </div>

      <div class="register-only">
        <label for="confirm-password">Confirm password</label>
        <input type="password" id="confirm-password" />
      </div>

      <button type="button" class="btn-primary big">Sign In</button>
    </form>
  </section>
</main>
