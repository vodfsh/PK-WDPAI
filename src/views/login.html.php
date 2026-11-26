<?php
/**
 * @var ?string  $formError
 * @var string   $activeTab
 * @var string[] $values
 */
?>
<h1>Sign in or Register</h1>

<section class="login-card">
  <my-segmented-radio id="form-selector" value="<?= htmlspecialchars($activeTab); ?>">
    <option value="sign-in">Sign In</option>
    <option value="register">Register</option>
    <option value="forgot" hidden>Forgot</option>
  </my-segmented-radio>

  <form id="form" method="POST">
    <?php if (!empty($formError)) { ?>
    <p class="form-error <?= 'sign-in' === $activeTab ? 'on-login' : 'on-'.$activeTab; ?>" role="alert">
      <?= htmlspecialchars($formError); ?>
    </p>
    <?php } ?>

    <div class="on-login on-register">
      <label for="login">Login</label>
      <input type="text" name="login" id="login" value="<?= htmlspecialchars($values['login'] ?? ''); ?>" />
    </div>

    <div class="on-register on-forgot">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="<?= htmlspecialchars($values['email'] ?? ''); ?>" />
    </div>

    <div class="on-login on-register">
      <div class="label-container">
        <label for="password">Password</label>
        <button id="forgot-btn" type="button" class="btn-link on-login">forgot password?</button>
      </div>
      <input
        type="password"
        name="password"
        id="password"
        value="<?= htmlspecialchars($values['password'] ?? ''); ?>"
      />
    </div>

    <div class="on-register">
      <label for="confirm-password">Confirm password</label>
      <input
        type="password"
        name="confirm-password"
        id="confirm-password"
        value="<?= htmlspecialchars($values['confirm-password'] ?? ''); ?>"
      />
    </div>

    <div class="on-login">
      <?php if ('on' === ($values['remember-me'] ?? '')) { ?>
      <input type="checkbox" name="remember-me" id="remember-me" checked />
      <?php } else { ?>
      <input type="checkbox" name="remember-me" id="remember-me" />
      <?php } ?>
      <label for="remember-me">Remember me</label>
    </div>

    <button class="btn-primary big">
      <span class="on-login">Sign In</span>
      <span class="on-register">Register</span>
      <span class="on-forgot">Send reset link</span>
    </button>
  </form>
</section>
