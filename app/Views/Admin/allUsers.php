<html>
    <head>
  <title>Utilisateurs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
              <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <!-- datatable -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 

          </head>
          <body>
    <header>
            <?php
            include_once 'navbarAdmin.php';
            ?>
        </header>
        <div class="container mt-3 text-center">
    <h2>Aperçu des Utilisateurs</h2>
    <table class="datatable">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Email</th>
          <th>id_role</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach ($allUsers as $key => $allUser) {
          echo '<tr><td>' . $allUser->id . '</td>';
          echo '<td>' . $allUser->lastname . '</td>';
          echo '<td>' . $allUser->firstname . '</td>';
          echo '<td>' . $allUser->email . '</td>';
          echo '<td>' . $allUser->id_role . '</td>';
          echo '<td><a data-bs-toggle="modal" data-bs-target="#del'.$allUser->id.'" class="btn btn-danger">Delete</a></td>';
          echo '<td><a data-bs-toggle="modal" data-bs-target="#update'.$allUser->id.'" class="btn btn-warning">Update</a></td></tr>';
        }
        ?>
        
  </tbody>
  </table>
  <?php
  foreach ($allUsers as $key => $allUser) {
    echo '<div class="modal fade" id="del'.$allUser->id.'" tabindex="-1">';
    echo '<div class="modal-dialog">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<h5 class="modal-title">Êtes-vous sûrs de vouloir supprimer cette ligne?</h5>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    echo '</div>';
    echo '<div class="modal-body">';
    echo '</div>';
    echo '<div class="modal-footer">';
   echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
   echo '<form action="'.base_url().'/Admin/deleteUser" method="POST">';
   echo '<input type="hidden" name="id" value="'.$allUser->id.'" />';
   echo '<button type="submit" class="btn btn-danger">Delete</button>';
   echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }?>
   <?php
  foreach ($allUsers as $key => $allUser) {
    echo '<div class="modal fade" id="update'.$allUser->id.'" tabindex="-1">';
    echo '<div class="modal-dialog">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<h5 class="modal-title">Êtes-vous sûrs de vouloir modifier cette ligne?</h5>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    echo '</div>';
    echo '<div class="modal-body">';
    echo '<form method="POST" action="'.base_url().'/Admin/updateUser" name="updateUserForm" id="updateUserForm">';
    echo '  ?>/Admin/updateUser" name="updateUserForm" id="updateUserForm">';
     echo ' <div class="row">';
     echo ' <div class="col-sm-4">Nom</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="lastname" value="'.$allUser->lastname.'"/><input type="hidden" name="id" value="'.$allUser->id.'"/></div>';
     echo ' </div>';
     echo ' <div class="row">';
     echo ' <div class="col-sm-4">Prénom</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="firstname" value="'.$allUser->firstname.'"/></div>';
     echo ' </div>';
    echo '  <div class="row">';
    echo ' <div class="col-sm-4">email</div>';
    echo '  <div class="col-sm-8"><input class="form-control" type="text" name="email" value="'.$allUser->email.'"/></div>';
    echo '  </div>';
    echo '  <div class="row">';
     echo ' <div class="col-sm-4">id_role</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="number" name="id_role" value="'.$allUser->id_role.'"/></div>';
     echo ' </div>';
     //echo ' </form>';
    echo '</div>';
    echo '<div class="modal-footer">';
   echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
   //echo '<form action="'.base_url().'/Admin/updateUser" method="POST">';
   echo '<input type="hidden" name="id" value="'.$allUser->id.'" />';
   echo '<button type="submit" class="btn btn-warning">Modifier</button>';    
   echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
  ?>
  </div>
              <footer>
            <div class="environment">

                <?php
            include_once 'footerAdmin.php';
            ?>

            </div>


        </footer>
  <script>
          $(document).ready( function () {
    $('.datatable').DataTable();
} );
          </script>
        </body>
        
</html>