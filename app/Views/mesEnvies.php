<html>
    <head>
        <meta charset="UTF-8">
        <title>Ma collection</title>
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
    
    
   <!-- si un manga est mis dans la collection alors il est mis dans cette collection ci  -->
   <?php
      // Utilisation de session() au lieu de $_SESSION et vérification du rôle "user" en minuscule
      $user = session()->get('user');
      if (isset($user) && ($user->getRole())->name == "user"):?>
            <?php echo '<h2 class="card-title text-center">Envies</h2>';?>
             <?php 
            foreach($envie as $envies):?> 
            
            <?php 
            $counter=0;
            foreach($envies->getMangas() as $key =>$manga):?> 
             <?php if($key==0 || $key%4==0){ echo '<div class="card-group">';} ?>
            <div class="card">
              <div class="card-body">
              <a href="<?php echo base_url('Home/eachManga/' . $manga->id);?>">

               <?php echo '<h5 class="card-title">'.$manga->titre.'</h5><img src="'.$manga->image.'" width="225" height="300"/></div>';

            ?></a>
                 </div>
                
                 <?php if($counter==3 || sizeof($envies->getMangas())-1==$key){echo '</div>';$counter=-1;} ?>
                 <?php $counter++; ?>
          <?php endforeach;?> 
    <?php endforeach;?>
    <?php else:?>
                               <?php echo '<div class="card bg-dark text-black"><img src="https://www.angelxp.eu/image/Twitter/anime/your-name08.jpg" class="card-img" alt="imgnotconnected"><div class="card-img-overlay"><h1 class="card-title">すみません〜</h1><h2 class="card-text">Sumimasen〜<h2><h3 class="card-text">Veuillez vous connecter pour utiliser cette fonction</h3></div></div>'?>
   <?php endif; ?>
    
    <footer>
            <div class="environment">

                <?php
            include_once 'footer.php';
            ?>

            </div>


        </footer>
</body>
            </html>

