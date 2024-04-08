<!DOCTYPE html>
<html lang="en">
head>
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
      <h1> Add a new Course  </h1>
      <form id="loginForm" action="/DashBoard/CreateCourse/Create_C" method="post">
    @csrf
    <label for="name">Course Name:</label>
    <input type="text" id="name" placeholder="Course name" required name='name'><br><br>

    <label for="small_description">Small Description:</label>
    <input type="text" id="small_description" placeholder="Add small description" required name='small_description'><br><br>

    <div class="form-group">
        <label for="description">Course Description:</label>
        <textarea class="form-control" id="description" rows="3" placeholder="Add Course description" required name="description"></textarea>
    </div><br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" placeholder="Price" min="0" step="0.01"><br><br>

    <div class="form-group">
        <label for="category">Choose Category:</label>
        <select class="form-control" id="category" name="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div><br>

    <!-- Add more options as needed -->
    <button type="submit">Create</button>
</form>

    </div>
  </div>

  <script src="{{URL::asset('js/script.js')}}"></script>
</body>
</html>
