<html>
    <head>
  <title>Mangas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- STYLES -->
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
    <h2>Aperçu des Mangas</h2>
    <table class="datatable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titre</th>
          <th>Auteur</th>
          <th>Image URL</th>
          <th>Nb_tomes</th>
          <th>id_genres</th>
          <th>id_edition</th>
          <th>Publication</th>
          <th>Description</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($mangas as $key => $manga) {
          echo '<tr><td>' . $manga->id . '</td>';
          echo '<td>' . $manga->titre . '</td>';
          echo '<td>' . $manga->auteur . '</td>';
          echo '<td><img style="width: 200px;height: 300px;" src="' . $manga->image . '" /></td>';
          echo '<td>' . $manga->nb_tomes . '</td>';
          echo '<td>' . $manga->id_genres . '</td>';
          echo '<td>' . $manga->id_edition . '</td>';
          echo '<td>' . $manga->publication . '</td>';
          echo '<td><a data-bs-toggle="modal" data-bs-target="#readmore'.$manga->id.'" class="btn btn-link">Résumé</a></td>';
          echo '<td><a data-bs-toggle="modal" data-bs-target="#del'.$manga->id.'" class="btn btn-danger">Delete</a></td>';
          echo '<td><a data-bs-toggle="modal" data-bs-target="#update'.$manga->id.'" class="btn btn-warning">Update</a></td></tr>';
          
          
        }
        ?>
        
  </tbody>
  </table>
    <?php
  foreach ($mangas as $key => $manga) {
    echo '<div class="modal fade" id="readmore'.$manga->id.'" tabindex="-1">';
    echo '<div class="modal-dialog">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<h5 class="modal-title">Résumé</h5>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    echo '</div>';
    echo '<div class="modal-body">';
    echo '<td>' . $manga->description . '</td>';
    echo '</div>';
    echo '<div class="modal-footer">';
   echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
  ?>
  <?php
  foreach ($mangas as $key => $manga) {
    echo '<div class="modal fade" id="del'.$manga->id.'" tabindex="-1">';
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
   echo '<form action="'.base_url().'/Admin/deleteManga" method="POST">';
   echo '<input type="hidden" name="id" value="'.$manga->id.'" />';
    echo '<button type="submit" class="btn btn-danger">Delete</button>';
   echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
  ?>
  <?php
  foreach ($mangas as $key => $manga) {
    
    echo '<div class="modal fade" id="update'.$manga->id.'" tabindex="-1">';
    echo '<div class="modal-dialog">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<h5 class="modal-title">Êtes-vous sûrs de vouloir modifier cette ligne?</h5>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    echo '</div>';
    echo '<div class="modal-body">';
    echo '<form method="POST" action="'.base_url().'/Admin/updateManga" name="updateMangaForm" id="updateMangaForm">';
     echo ' <div class="row">';
     echo ' <div class="col-sm-4">Titre</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="titre" value="'.$manga->titre.'"/><input type="hidden" name="id" value="'.$manga->id.'"/></div>';
     echo ' </div>';
     echo ' <div class="row">';
     echo ' <div class="col-sm-4">Auteur</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="auteur" value="'.$manga->auteur.'"/></div>';
     echo ' </div>';
    echo '  <div class="row">';
    echo ' <div class="col-sm-4">Image URL</div>';
    echo '  <div class="col-sm-8"><input class="form-control" type="text" name="image" value="'.$manga->image.'" /></div>';
    echo '  </div>';
    echo '  <div class="row">';
     echo ' <div class="col-sm-4">nb_tomes</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="nb_tomes" value="'.$manga->nb_tomes.'"/></div>';
     echo ' </div>';
     echo '  <div class="row">';
     echo ' <div class="col-sm-4">id_genres</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="id_genres" value="'.$manga->id_genres.'"/></div>';
     echo ' </div>';
     echo '  <div class="row">';
     echo ' <div class="col-sm-4">id_edition</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="id_edition" value="'.$manga->id_edition.'"/></div>';
     echo ' </div>';
     echo '  <div class="row">';
     echo ' <div class="col-sm-4">publication</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="publication" value="'.$manga->publication.'"/></div>';
     echo ' </div>';
     echo '  <div class="row">';
     echo ' <div class="col-sm-4">description</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="description" value="'.$manga->description.'"/></div>';
     echo ' </div>';
     //echo ' </form>';
    echo '</div>';
    echo '<div class="modal-footer">';
   echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
   //echo '<form action="'.base_url().'/Admin/updateManga" method="POST">';
   echo '<input type="hidden" name="id" value="'.$manga->id.'" />';
    echo '<button type="submit" class="btn btn-warning">Update</button>';
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