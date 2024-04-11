<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/profile.css')}}">
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
            
            <a href="/Change-state"><li>Become a trainer</li></a>
            <a href="#"><li>Contact me</li></a>   
            <a href="/"><li >Home</li></a>
            <a href="/DashBoard"><li class='Active'>DashBoard</li></a>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                <ul class="dropdown-menu">
                    @foreach($categories as $category)
                    <a href="/Courses-by-category/{{$category->id}}"><li class='Active'>{{$category->name}}</li></a>
                    @endforeach
                </ul>
            </li>
        </ul>
    </nav>
</header>
<body>
    <section  class='user_info'>
        
            <div class='first'>
                <div class =profile_pic>
                    <img src={{URL::asset('img/GG1.jpg')}} alt=""> 
                </div>
                <div class='user_name'>
                    <span>{{$record->name}}</span>
                </div>
                
                <div class='user_name_ditails'>
                      <ul>
                          <li>syria</li>
                          <li>programmer</li>
                      </ul>
                </div>
                <div class='Bottom_nav'>
                    <a href="/DashBoard/user-profile/trainer-courses/{{$record->id}}">  <span>Courses</span></a>
                </div>
            </div>
            
            <div class='second'>
               <h3>About me</h3>
               <p>
                  @if($record->bio==null)
                    avilable only for Trainers 
                  @else 
                      {{$record->bio}}
                  @endif
               </p>
            </div>
            <div class='third'>
               <span>profits:</span>
               <div class='profits'>
                +273$
               </div>
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>