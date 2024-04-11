
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/index_file.css')}}">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    
    <!-- font for user name(Roboto Slab)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100&display=swap" rel="stylesheet">
    
    <!-- font for user name(Raleway)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    
    <title>Document</title>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <nav>
        <ul>

            <li> 
                <div class="input-group">
                    <input type="text" name='keyword' class="form-control" placeholder="Search for a course or trainer">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">
                          <a href="/search">  <i class="fa fa-search"></i></a>
                        </button>
                    </div>
                </div>
            </li>
            
            <a href="/Change-state"><li>Become a trainer</li></a>
            <a href="#"><li>Contact me</li></a>   
            <a href="/"><li class='Active'>Home</li></a>
            <a href="/DashBoard"><li>DashBoard</li></a>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                <ul class="dropdown-menu">
                    @foreach($categories as $category)
                    <a href="/Courses-by-category/{{$category->id}}"><li class='Active'>{{$category->name}}</li></a>
                    @endforeach
                </ul>
            </li>
            
            <li class='join'>
                <a href="{{$rout}}">
                      <button >
                          {{$text}}
                      </button>
                </a>
            </li>

        </ul>
    </nav>
</header>
</body>
<!--------------->

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>