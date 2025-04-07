<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Mangathèque</title>
        <meta name="description" content="The small framework with powerful features">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
        <!-- CSS only -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- STYLES -->
        
    

        </head>
    <body>

        <!-- HEADER: MENU + HEROE SECTION -->
        <header>
            <?php
            include_once 'navbar.php';
            ?>
                    
        </header>
        
        <!-- Affichage des messages d'erreur de connexion -->
        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        
        <!-- Zone de débogage (cachée par défaut) -->
        <div id="debug-zone" style="display: none;" class="alert alert-info">
            <h4>Informations de débogage</h4>
            <button onclick="document.getElementById('debug-zone').style.display = 'none';" class="btn btn-sm btn-secondary float-end">Cacher</button>
            <div>
                <strong>Session utilisateur:</strong>
                <?php 
                    $user = session()->get('user');
                    if (isset($user)) {
                        $role = $user->getRole();
                        echo "Connecté en tant que: " . $user->firstname . " " . $user->lastname;
                        echo "<br>Email: " . $user->email;
                        echo "<br>ID: " . $user->id;
                        echo "<br>Rôle ID: " . $user->id_role;
                        echo "<br>Rôle name: " . ($role ? $role->name : 'Aucun rôle');
                    } else {
                        echo "Non connecté";
                    }
                ?>
            </div>
        </div>
        <button onclick="document.getElementById('debug-zone').style.display = 'block';" class="btn btn-sm btn-outline-secondary" style="position: fixed; bottom: 10px; right: 10px; z-index: 1000;">Debug</button>
        
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://wallpaperaccess.com/full/2827064.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://i.imgur.com/LkoQKrX.png" class="d-block w-100" alt="...">
    </div>
      <div class="carousel-item">
      <img src="https://www.desktopbackground.org/download/o/2010/11/12/109691_give-me-your-favorite-dual-screen-wallpaper-anime_3840x1080_h.jpg" class="d-block w-100" alt="...">
    </div>
      <div class="carousel-item">
      <img src="https://i.pinimg.com/originals/4d/4e/b8/4d4eb802de97801158f4512f95691623.jpg" class="d-block w-100" alt="...">
    </div>
      <div class="carousel-item">
      <img src="https://www.wallpapertip.com/wmimgs/3-37570_wallpaper-hd-anime-one-piece-one-piece-wallpaper.jpg" class="d-block w-100" alt="...">
    </div>
   </div>
   </div>
        
        

        <!-- CONTENT tous les mangas sont repris dans la premiere page-->
       
      
<?php 
$counter=0;
foreach($mangas as $key =>$manga): ?>

<?php if($key==0 || $key%4==0){ echo '<div class="card-group">';} ?>
<div class="card">
  <div class="card-body">
  <a href="<?php echo base_url('Home/eachManga/' . $manga->id);?>">

   <?php 
   $image_path = $manga->image;
   // Vérifier si l'image existe et a un chemin valide
   if (empty($image_path) || !filter_var($image_path, FILTER_VALIDATE_URL) && !file_exists(FCPATH . $image_path)) {
       // Image par défaut si l'image n'existe pas
       $image_path = base_url('assets/OIP.jpg');
   }
   echo '<h5 class="card-title">'.$manga->titre.'</h5><img src="'.$image_path.'" width="225" height="300" onerror="this.src=\'' . base_url('assets/OIP.jpg') . '\'" alt="'.$manga->titre.'"/></div>';
?>
</a>
     </div> 
     <?php if($counter==3 || sizeof($mangas)-1==$key){echo '</div>';$counter=-1;} ?>
     <?php $counter++; ?>   
<?php endforeach; ?>

        

        <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

        <footer>
            <div class="environment">

                <?php
            include_once 'footer.php';
            ?>

            </div>

            

        </footer>
    </body>
        <!-- SCRIPTS -->
<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>

<script>
function sendForm(formId){
    $('#'+formId).submit();
  }
  
     
</script>

        

        <!-- -->

    
</html>
