<html>
    <head>
  <title>Ajouts Mangas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- STYLES -->
          </head>
    <body>
    <header>
            <?php
            include_once 'navbarAdmin.php';
            ?>
        </header>
               <!-- Admin peut ajouter des mangas  --> 
        <div class="container col-sm-8 mt-4">
    <h2 class="modal-title">Ajouts Mangas</h2>

    <?php
    // Affichage des messages de succès
    if (session()->has('success')) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                ' . session()->getFlashdata('success') . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }

    // Affichage des messages d'erreur
    if (session()->has('error')) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                ' . session()->getFlashdata('error') . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }

    // Affichage des erreurs de validation
    if (isset($validation)) {
        echo '<div class="alert alert-danger">';
        echo $validation->listErrors();
        echo '</div>';
    }
    ?>

    <div class="modal-body">
        <form method="POST" action="<?php echo base_url(); ?>/Admin/addManga" name="mangaForm" id="mangaForm" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-sm-4">Titre</div>
                <div class="col-sm-8"><input class="form-control" type="text" name="titre" required /></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Auteur</div>
                <div class="col-sm-8"><input class="form-control" type="text" name="auteur" required /></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Image URL</div>
                <div class="col-sm-8"><input class="form-control" type="text" name="image" /></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Nombre de tomes</div>
                <div class="col-sm-8"><input class="form-control" type="number" name="nb_tomes" required /></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Genre</div>
                <div class="col-sm-8"><select class="form-control" name="id_genres" required>
                    <option value="">Sélectionnez un genre</option>
                    <?php foreach($genres as $genre){
                        echo '<option value="'.$genre->ID.'">'.$genre->nom_genre.'</option>';
                                        }
                    ?>
                </select></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Édition</div>
                <div class="col-sm-8"><select class="form-control" name="id_edition" required>
                    <option value="">Sélectionnez une édition</option>
                    <?php foreach($editions as $edition){
                        echo '<option value="'.$edition->ID.'">'.$edition->nom_edition.'</option>';
                                        }
                    ?>
                </select></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Date de publication</div>
                <div class="col-sm-8"><input class="form-control" type="text" name="publication" /></div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-4">Description</div>
                <div class="col-sm-8"><textarea class="form-control" name="description" rows="4"></textarea></div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-success">Enregistrer le manga</button>
                </div>
            </div>
        </form>
    </div>
    </div>
        <footer>
            <div class="environment">
                <?php
                include_once 'footerAdmin.php';
                ?>
            </div>
        </footer>
    </body>
</html>
