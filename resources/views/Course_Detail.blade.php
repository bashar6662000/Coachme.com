<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/Course_details.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
</style>
   <!---------------------------------------------------------------------------------------------->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
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
<section class='Course_info'>
    <div class="container">
        <div class='first'>
            <h1>
                {{$Course->name}}
            </h1>
            <p>
            {{$Course->small_description}}
            </p>
            <h3>
                what the Course about?
            </h3>
            <div class='description'>
          <p> {{$Course->description}}</p>
          <span>Cours by: <a href="/DashBoard/user-profile/{{$trainer_name->id}}">{{$trainer_name->name}}</a> </span>
          <br> 
          <span class='price'>  price:{{$Course->price}}$ </span>
          <br> <br>
          <div class='Enroll'>
          <a href="/Course/{{$state}}-Enroll-in-cours/{{$Course->id}}" style='visibilty='{{$hidden}}><button type ='button' class='btn btn-secondary ' > Enroll</button></a>
          </div>
           </div> 
        </div>
       
    </div>
</section>
</body>
</html>