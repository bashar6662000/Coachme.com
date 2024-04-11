<!DOCTYPE html>
<html lang="en">
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
    <title>CoachMe.com</title>
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
    <h1>All Courses based on your Search</h1>
    

    <h1>Search Results</h1>

    @if ($trainers->isNotEmpty())
        <h2>Trainers</h2>
        @foreach ($trainers as $trainer)
            <div>
                <h3>{{ $trainer->name }}</h3>
                <p>Location: {{ $trainer->location }}</p>
                <p>Description: {{ $trainer->description }}</p>
            </div>
        @endforeach
    @endif

    <h2>Courses</h2>
    @if ($Courses->isNotEmpty())
        <h2>Courses</h2>
        @foreach ($Courses as $Course)
            <div>
                <h3>{{ $Course->name }}</h3>
                <p>Location: {{ $Course->descrition }}</p>
                <p>Description: {{ $Course->price }}</p>
            </div>
        @endforeach
    @endif

</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</html>