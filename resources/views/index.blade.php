<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/index_file.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&family=Raleway:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet">
   <!---------------------------------------------------------------------------------------------->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <title>CoachMe.Com</title>
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
               <li>Couses</li>
               <li>who are we?</li>
               <li>Home</li>
               <a href="/DashBoard"><li> DashBoard </li></a>
               <li class="join" ><a href={{$rout}} >{{$text}}</a></li>
        </ul>
    </nav>
</header>
<!--------------->
   <section class="top">
     <div id="text_top">
      <h1 >The best site to find an instructor <br>to learn any type of skill !!</h1>
      <h4>Or you can be a instructer and make money </h4>
      <h5>Search between a 100 million of courses </h5>
      <small>learn more!!</small>
      <!------------------->
      <br> <br> 
      <div class="search">
      <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for a course or trainer">
                 <div class="input-group-append">
                  <button class="btn btn-secondary" type="button">
                    <i class="fa fa-search"></i>
                     </button>
                     </div>
                       </div>

                       </div>
      <!------------------->
    </div>
    </section>
    <!------------------->
<section class="how_do_we_work">
  <h1>
        how does it works?
    </h1>
  <div class="steps"> 
    <ul>
        
    <li> 
       
        <div class='step1'>
            <p>
                search for a course or a tariner from the search bar above
            </p>
            <div class='number' ><p>1</p></div>
        </div>
    </li>
    <li>
        <div class='step2'>
            <p>
                 pick the course with the best comments or rate 
                or check the profile of thr trainer
            </p>
            <div class='number' ><p>2</p></div>
        </div>
    </li>
    <li>
    
        <div class='step3'>
            <p>
              last but not least check the feedback of the course or the tainer rate and contact 
            </p>
            <div class='number' ><p>3</p></div>
        </div>
    </li>
   </ul> 
  </div>    
</section>
<!------------------->
    <section class="courses_section">
        <div class="courses">
             <!-------------------------------------------------------------------------->
             @foreach($courses as $cours)
                <a href="/Course/{{$cours->id}}">
             <div class="course">
                <div class="course-image">
                <img src={{URL::asset('img/GG22.jpg')}} alt="">
                </div>
              <div class="course-bottom">
                <span class="name"> {{$cours->name}} </span>
                <br>
                <span class="categore">category/{{($cours->category->name)}}</span>
                <br>
            <span class='price'>  {{$cours->price}}$ </span>
                
              </div>
                  </a>
                 
            </div>
           
           @endforeach
        </div>
    </section>
    <footer>
    </footer>
<!--------------->
</body>
</html>