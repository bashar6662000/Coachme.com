<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/Dashboard-courses.css')}}">
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

  <section class='courses'>
  <div class='courses-option'>
  <table>
    <tr>
      <th>#</th>
      <th>Course name</th>
      <th>Trainer name</th>
      <th> rate</th>
      <th>price</th>
      <th>options</th>
      
    </tr>
    
    <!-- Example data -->
  
    @foreach ($courses as $course)
    <tr>
        <td>{{ $course->id}}</td>
        <td>{{ $course->name }}</td>
        <td>{{ $trainer_name->name}}</td>
        <td>{{ $course->rate }}</td>
        <td>{{ $course->price }}</td>
        <td>
            <a href="/DashBoard/Enrollment/{{$state}}-Quit-Course/{{ $course->id }}/{{ $choseen->id }}">
                <button class='btn btn-danger'>Quit course</button>
            </a>
        </td>
    </tr>
@endforeach
  

    <!-- Add more rows as needed -->
    
  </table>

  </div>
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
            <li >
            Courses
          </li>
        </a>
        </ol>
      </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>