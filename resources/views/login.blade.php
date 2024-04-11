<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/login.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- font for user name(Roboto Slab)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
   <!---------------------------------------------------------------------------------------------->
   <!-- font for user name(Raleway)-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
   <!------------------------------------------------------------------------------------------------>
    <title>Document</title>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h1>Couch me  </h1>
      <form id="loginForm" action="/signin/login">
        <input type="text" placeholder="Username" required name='name'>
        @if($errors->any())
       <span style=color:red;float:left >wrong password or username</span>
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
