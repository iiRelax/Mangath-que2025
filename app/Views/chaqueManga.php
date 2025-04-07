<html>
<head>
        <meta charset="UTF-8">
        <title>EachManga</title>
        <meta name="description" content="The small framework with powerful features">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
        <!-- CSS only -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>
              /css/bootstrap.min.css" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- STYLES -->
    </head>
    <body>
    <header>
            <?php
            include_once 'navbar.php';
            ?>
        </header>
    
     <!-- faire une boucle qui montre chaque manga qu'on a appuyer dans la search bar-->
    
         
         <?php     
   echo '<div class="card mb-3"><div class="row g-0"><h2 class="card-title">'.$mangas->titre.'</h2><div class="col-md-4"><img src="'.$mangas->image.'" width="500" height="600"/></div><div class="col-md-5"><div class="card-body"><p class="card-text"><h6 class="fw-bold">Auteur: '.$mangas->auteur.'</h6><h6>Tomes: '.$mangas->nb_tomes.'</h6><h6>Publication: '.$mangas->publication.'</h6><h6 class="fst-italic">Description: '.$mangas->description.'</h6></p></div></div></div></div>';?>
   
    <?php  if ((isset($_SESSION['user'])) && ($_SESSION['user']->getRole())->name=="User"):?>
        
        <a class="btn btn-info btn-lg" href="<?php echo base_url(); ?>/Home/envoyerCollection/<?php echo $mangas->id; ?>">Ajouter à ma collection</a>
        <a class="btn btn-info btn-lg" href="<?php echo base_url(); ?>/Home/envoyerEnvies/<?php echo $mangas->id; ?>">Ajouter à mes envies</a>
        
   <?php endif;?>
   

    
    <footer>
            <div class="environment">

                <?php
            include_once 'footer.php';
            ?>

            </div>


        </footer>
         </body>
        </html>
