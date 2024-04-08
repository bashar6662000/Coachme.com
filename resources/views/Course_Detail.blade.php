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
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                <ul class="dropdown-menu">
                    @foreach($categories as $category)
                    <a href=""><li class='Active'>{{$category->name}}</li></a>
                    @endforeach
                </ul>
            </li>
            <a href=""><li>Become a trainer</li></a>
            <a href=""><li>Contact me</li></a>   
            <a href="/"><li>Home</li></a>
        </ul>
    </nav>
</header>

<section class='Course_info'>
    <div class="container">
        <div class='first'>
            <h1>{{$Course->name}}</h1>
            <p>{{$Course->small_description}}</p>
            <h3>What the Course about?</h3>
            <div class='description'>
                <p>{{$Course->description}}</p>
                <span>Course by: <a href="/DashBoard/user-profile/{{$trainer_name->id}}">{{$trainer_name->name}}</a></span><br> 
                <span class='price'>Price: {{$Course->price}}$</span><br><br>
                <div class='Enroll'>
                    <a href="/Course/{{$state}}-Enroll-in-course/{{$Course->id}}" style='visibility={{$hidden}}'>
                        <button type ='button' class='btn btn-secondary'>Enroll</button>
                    </a>
                </div>
            </div> 
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>