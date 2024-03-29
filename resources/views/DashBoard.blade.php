<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/Dashboard.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!---font for name--->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
     <!---font for name--->
     <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
     <!---font for name--->
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Scope+One&display=swap" rel="stylesheet">
     <!---font for name--->
     <!---font for name--->
     <!---font for name--->
     <!---font for name--->
     <!---font for name--->
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
 
</style>
   <!---------------------------------------------------------------------------------------------->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <title>DashBoard</title>
</head>
<body>
  <header>
    <nav>
        <ul>
            <li> 
               <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for a course or trainer">
                 <div class="input-group-append">
                  <button class="btn btn-secondary" type="button">
                    <i class="fa fa-search"></i>
                     </button>
                     </div>
                       </div>
               </li>
               <li>Categorries</li>
               <li>Become a trainer</li>
               <li>Couses</li>
               <li>who are we?</li>
               <li>Home</li>
        </ul>
    </nav>
  </header>
  <section class='Profile'  >
  <!------------------------------------------------------->
  <div class="form-style-8">
  <h2>Update your profile here1</h2>
  <form action='/DashBoard/Upadate/.{{$choseen->id}}'>
    <input type="text" name="name" placeholder="new name" />
    <input type="email" name="email" placeholder="Email" />
    <input type="password" name="password" placeholder="New password" />
    <textarea placeholder="bio" onkeyup="adjust_textarea(this)" name="bio"></textarea>
    <input type="Submit" value="Update my profile" />
  </form>
</div>
  <!------------------------------------------------------>
</section>



<section>
   <div class='side-bar'>

      <div class='pesonal-info'>
        <div class="user-image">
           <img src={{URL::asset('img/GG1.jpg')}} alt="">
         </div>
         <div class='info-name'>
        Hi,{{$choseen->name}}
     </div>
     <div class='info-state'>
        state: {{$state}}
        <br>
        <button class='mubutton'> Preview account</button>
      </div>
      <div class='side-bar-option'>
        <ol>
          <li>
            profile
          </li>
          <li>
           Enrolment
          </li>
          <li>
            Messging
          </li>
        <a href="/DashBoard/Courses">  <li style=visibility:{{$hidden}}>
            Courses
          </li></a>
        </ol>
      </div>
 </div>

</body>
</html>