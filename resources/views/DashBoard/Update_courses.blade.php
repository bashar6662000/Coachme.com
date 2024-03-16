<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{URL::asset('css/CreateCourse.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>update Course</title>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h1> Update Course  </h1>
      <form id="loginForm" action="/DashBoard/update/{{$Cours->id}}/update-cours" method="Get">
    @csrf
    <label for="name">new Course Name:</label>
    <input type="text" id="name" placeholder="new Course Name" required name='name'><br><br>

    <label for="small_description">new Small Description:</label>
    <input type="text" id="small_description" placeholder="Add new small description" required name='small_description'><br><br>

    <div class="form-group">
        <label for="description">new Course Description:</label>
        <textarea class="form-control" id="description" rows="3" placeholder="Add new Course description" required name="description"></textarea>
    </div><br>

    <label for="price">new Price:</label>
    <input type="number" id="price" name="price" placeholder="the new Price" min="0" step="0.01"><br><br>

    <div class="form-group">
        <label for="category"> Choose new Category:</label>
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
