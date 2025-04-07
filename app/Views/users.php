<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UFT-8">
        <title>Welcome to CodeIgniter4!</title>
        <meta name="description" content="The small framework with powerful featuring">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
    </head>
    

<table class="datatable">
<thead>
    <tr>
        <th>Lastname</th>
        <th>Firstname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Avatar</th>
    </tr>
</thead>
<tbody>


<?php
foreach ($users as $key => $user){      
          echo '<tr><td>' . $user->id . '</td>';
          echo '<td>' . $user->lastname . '</td>';
          echo '<td>' . $user->firstname . '</td>';
          echo '<td>' . $user->email . '</td>';
          echo '<td>' . $user->password . '</td>';
          echo '<td><img style="width: 200px;height: 300px;" src="' . $user->avatar . '" /></td>';
                 
          
        }
        ?>

</tbody>
</table>
<section></section>
<script>
    $(document).ready( function () {
    $('.datatable').DataTable();
} );
</script>
</body>
</html>