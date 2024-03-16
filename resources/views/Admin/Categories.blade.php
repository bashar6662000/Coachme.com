<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Category Mangment</title>
  <link rel="stylesheet" href="{{URL::asset('css/Admin_Users.css')}}">
  </head>
<body>

<div class="navbar">
<a  href="/logout"> Logout from admin</a>
  <a href="" class='active'>Courses</a>
  <a href="/Users"class='active'>Users</a>
  <a href="" class='active'>trainers</a>
  <a href="" class='active'>categories</a>
</div>

  <table>
    <tr>
      <th>#</th>
      <th>name</th>
      <th>options</th>
      <th><a href=""><Button class="btn btn-info">Add a new category</Button></a></th>

    </tr>
    
    <!-- data -->
  
    <tr>
        <td>1</td>
        <td>Programin</td>
        <td><Button class="btn btn-warning">Delete Category</Button></td>
        <td> </td>

    </tr>
    
    <!-- i can Add more rows as needed -->
    
  </table>

</body>

</html>