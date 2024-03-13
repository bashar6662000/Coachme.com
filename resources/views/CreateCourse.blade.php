<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{URL::asset('css/CreateCourse.css')}}">
  <title>Create Course</title>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h1> Add a new Course  </h1>
      <form id="loginForm" action="/DashBoard/CreateCourse/Create_C" method="post">
        @csrf
        <input type="text" placeholder="Course name" required name='name'>
        <input type="text" placeholder="Add a small description" required name='description'>
        <button type="submit">Create</button>
      </form>
    </div>
  </div>

  <script src="{{URL::asset('js/script.js')}}"></script>
</body>
</html>
