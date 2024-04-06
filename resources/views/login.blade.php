<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{URL::asset('css/Login.css')}}">
  <title>Login/Signup Page</title>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h1>Couch me  </h1>
      <form id="loginForm" action="/signin/login">
        <input type="text" placeholder="Username" required name='name'>
        @if($errors->any())
        {{$errors}}
        @endif
        <input type="password" placeholder="Password" required name='password'>
        <button type="submit">Login</button>
      </form>
      <div class="social-login">
        <p>Or login with:</p>
        <button id="googleLoginBtn" class="google-btn">
          <img src="google-icon.png" alt="Google Icon"> Login with Google
        </button>
      </div>
      <p>Don't have an account? <a href="/join">Sign up here</a></p>
    </div>
  </div>

  <script src="{{URL::asset('js/script.js')}}"></script>
</body>
</html>
