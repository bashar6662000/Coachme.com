<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{URL::asset('css/Create_Categories.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Create Course</title>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h1> Add a new category  </h1>
        <form id="loginForm" action="/Categories/Create-category" method="post">
         @csrf
          
          <input type="text"  placeholder="category name" required name='name'><br><br>
          <!-- Add more options as needed -->
          <button type="submit">Create</button>
        </form>
      </div>
    </div>
  </body>
</html>
