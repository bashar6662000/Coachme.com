
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
  <a href="  "class='active'>Users</a>
</div>

  <table>
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>E-mail</th>
      <th>Options</th>
    </tr>
    
    <!-- Example data -->
    @foreach($Users as $user)
    <tr>
       
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><a href='/Users/delete-user/{{$user->id}}'><Button class="btn btn-warning">Block</Button></a></td>
       
    </tr>
    @endforeach
    <!-- Add more rows as needed -->
    
  </table>

</body>

</html>