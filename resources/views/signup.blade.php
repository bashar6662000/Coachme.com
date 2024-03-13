<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href={{URL::asset('css/signup.css')}}>
  <title>Login/Signup Page</title>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h1>Create Your Account</h1>
      <form id="signupForm" action="/join/signup" method="POST">
      {{  csrf_field()  }}

        <input type="text" placeholder="Full Name" required name="name">
        <input type="email" placeholder="Email" required name="email">
        <input type="password" placeholder="Password" required name="password">
        <a href=""><button type="submit">Sign </button></a>
      </form>
      <div class="social-login">
        <p>Or sign up with:</p>
        <button id="googleSignupBtn" class="google-btn">
          <img src="google-icon.png" alt="Google Icon"> Sign up with Google
        </button>
      </div>
      <p>Already have an account? <a href="/login">Log in here</a></p>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
