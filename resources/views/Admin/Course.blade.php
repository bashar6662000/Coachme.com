<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Courses Mangment</title>
  <link rel="stylesheet" href="{{URL::asset('css/Admin_Users.css')}}">
  </head>
<body>

<div class="navbar">
<a  href="/logout"> Logout from admin</a>
  <a href="" class='active'>Courses</a>
  <a href="/Users"class='active'>Users</a>
</div>

  <table>
    <tr>
      <th>#</th>
      <th>Cours name</th>
      <th>Cours trainer</th>
      <th>Cours Price</th>
      <th>Options</th>
    </tr>
    
    <!-- data -->
    @foreach($Courses as $Cours)
    <tr>
      
        <td>{{$Cours->id}}</td>
        <td>{{$Cours->name}}</td>
        <td>{{$Cours->trainer_id}}</td>
        <td>{{$Cours->price}}</td>
        <td> <a href="/Delete/{{$Cours->id}}"><Button class="btn btn-warning">Delete Course</Button></a></td>
       
    </tr>
    @endforeach
    <!-- i can Add more rows as needed -->
    
  </table>

</body>

</html>