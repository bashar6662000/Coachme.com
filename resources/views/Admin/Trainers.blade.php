<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Users Mangment</title>
  <link rel="stylesheet" href="{{URL::asset('css/Admin_Users.css')}}">
  </head>
<body>

<div class="navbar">
  <a  href="/logout"> Logout from admin</a>
  <a href="/Courses">Courses</a>
  <a href="/Users">Users</a>
</div>

  <table>
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>E-mail</th>
      <th>Options</th>
    </tr>
    
    <!-- Example data -->
    @foreach($Trainers as $tariner)
    <tr>
       
        <td>{{$tariner->id}}</td>
        <td>{{$tariner->name}}</td>
        <td>{{$tariner->email}}</td>

        <td><a href='/Trainers/delete-tariner/{{$tariner->id}}'><Button class="btn btn-warning">Block</Button></a></td>
       
    </tr>
    @endforeach
    <!-- Add more rows as needed -->
    
  </table>

</body>

</html>