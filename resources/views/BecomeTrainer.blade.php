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
      <h1>please login again <br> to ensuer your request   </h1>
      <form id="loginForm" action="/Change-state/becomoeTrariner" method='post'>
        @csrf
        <input type="text" placeholder="Username" required name='name'>
        <small>
        @if($errors->has('name'))
        {{ $errors->first('name') }}
        @endif
        </small>

        <input type="password" placeholder="Password" required name='password'>
        <small>
        @if($errors->has('password'))
       {{ $errors->first('password')}}
        @endif
      </small>
        <button type="submit">Becom a trainer</button>
      </form>
      <div class="social-login">
        <p>Or login with:</p>
        <button id="googleLoginBtn" class="google-btn">
          <img src="google-icon.png" alt="Google Icon">Becom a trainer
        </button>
      </div>
      <p>Don't have an account? <a href="">Change to trainer</a></p>
    </div>
  </div>
</body>
</html>
