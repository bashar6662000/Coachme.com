<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/DashBoard.css')}}">
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
  <section class='Profile'  >
  <!------------------------------------------------------->
  <div class="form-style-8">
  <h2>Update your profile here</h2>
  <form action='/DashBoard/change-name/.{{$choseen->id}}' >
    <input type="text" name="name" placeholder="new name" require >
   
    @if($errors->has('name'))
    <span>this user name is already taken</span>
    @endif
    <br>
    <input type="Submit" value="Update my name" />
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
       <a href="/DashBoard/user-profile/{{$choseen->id}}"><button class='mubutton'> Preview account</button></a> 
      </div>
      <div class='side-bar-option'>
        <ol>
        <a href="/DashBoard">
          <li>
            Change name
          </li>
          </a>
          <a href="/DashBoard/Enrollment">
          <li>
         
           Enrolment
          
          </li>
          </a>
          <li>
            Messging
          </li>
          
        <a href="/DashBoard/Courses">
            <li style=visibility:{{$hidden}}>
            Courses
          </li>
        </a>
        </ol>
      </div>
 </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</html>