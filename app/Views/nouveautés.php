<html>
    <head>
        <meta charset="UTF-8">
        <title>Nouveautés</title>
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
    <!-- nouveautés  -->
    <div class="card text-center" >
<?php
 $counter=0;
foreach($mangas as $key =>$manga): ?>
 <?php if($key==0 || $key%3==0){ echo '<div class="card-group">';} ?>
        <div class="card col-sm-5">
  <div class="card-body">
      <a href="<?php echo base_url('Home/eachManga/' . $manga->id);?>">
  <?php echo '<h2 class="card-title">'.$manga->titre.'</h2><div class="card-body"><img src="'.$manga->image.'" width="500" height="600"/></a><p class="card-text">'.$manga->description.'</p></div></div>';

  ?></div>
    
   <?php if($counter==2 || sizeof($mangas)-1==$key){echo '</div>';$counter=-1;} ?>
     <?php $counter++; ?>   
<?php endforeach; ?>
        </div>
    <footer>
            <div class="environment">

                <?php
            include_once 'footer.php';
            ?>

            </div>

            
        </footer>
    </body>
</html>
