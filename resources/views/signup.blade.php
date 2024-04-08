<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/Course_details.css')}}">
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
      <h1>Create Your Account</h1>
      <form id="signupForm" action="/join/signup" method="POST">
      {{  csrf_field()  }}

        <input type="text" placeholder="Full Name" required name="name">
        <small>
        @if($errors->has('name'))
        {{  $errors->first('name');}}
        @endif
        </small>
        <input type="email" placeholder="Email" required name="email">
        <input type="password" placeholder="Password" required name="password">
        <small>
        @if($errors->has('password'))
        {{  $errors->first('password');}}
        @endif
        </small>
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
