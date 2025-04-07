<html>
    <head>
  <title>Modifier mon Profil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <!-- changement photo de profil  -->
      <?php
      // Utilisation de session() au lieu de $_SESSION et vérification du rôle "user" en minuscule
      $user = session()->get('user');
      if (isset($user) && ($user->getRole())->name == "user"):?>
         <div class="container col-sm-8">
                <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
                    <h2 class="card-title"> Mon profil</h2>
                    <div class="row g-0">
                  <div class="card-body col-md-5">
                      <?php 
                        $imgPath=base_url('assets/uploads/OIP.jpg');
                        $user = session()->get('user');
                        if(isset($user->avatar) && $user->avatar!=''){
                            $imgPath=base_url('/assets/uploads/').'/'.$user->avatar;
                        }
                      ?>
                    <img src="<?php echo $imgPath; ?>" class="img-fluid rounded-start" alt="profilImage">
                    
                    <div>
                    <form enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>/Home/changeAvatar">
                     <div class="col-auto">   <input type="file" class="form-control" name="userfile" /></div> 
                      <div class="col-auto">  <input type="submit" class="btn btn-dark" value="Envoyer" /></div>
                    </form>
                </div>  
                  </div>
                    </div>    
                  </div>
                  </div>  
                  </div> 
                    <!-- update du reste profil  -->
                      <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        
                          <div class="col-md-8">
                          <?php 
                          $user = session()->get('user');
                          if(isset($user)){
                              echo '<br>';
                              echo '<br>';
                              echo '<br>';
                              
                                echo '<div><h4>Nom:<br><h5> ' .$user->lastname.'</h5></h4></div>';
                                echo '<br>';
                                echo '<br>';
                                echo '<div><h4>Prénom:<br><h5> ' .$user->firstname.'</h5></h4></div>';
                                echo '<br>';
                                echo '<br>';
                                echo '<div><h4>Email:<br><h5> ' .$user->email.'</h5></h4></div>';
                                echo '<br>';
                                echo '<br>';
                                echo '<br>';
                                echo '<br>';
                                echo '<br>';
                                echo '<div><a data-bs-toggle="modal" data-bs-target="#update'.$user->id.'" class="btn btn-warning">Update</a></div>';
                          } ?>
                      
                      <p class="card-text"></p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
               
        <?php
        $user = session()->get('user');
    echo '<div class="modal fade" id="update'.$user->id.'" tabindex="-1">';
    echo '<div class="modal-dialog">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<h5 class="modal-title">Êtes-vous sûrs de vouloir modifier cette ligne?</h5>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
    echo '</div>';
    echo '<div class="modal-body">';
    echo '<form method="POST" action="'.base_url().'/Home/update" name="updateUserForm" id="updateUserForm">';
   
     echo ' <div class="row">';
     echo ' <div class="col-sm-4">Nom</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="lastname" value="'.$user->lastname.'"/><input type="hidden" name="id" value="'.$user->id.'"/></div>';
     echo ' </div>';
     echo ' <div class="row">';
     echo ' <div class="col-sm-4">Prénom</div>';
     echo ' <div class="col-sm-8"><input class="form-control" type="text" name="firstname" value="'.$user->firstname.'"/></div>';
     echo ' </div>';
    echo '  <div class="row">';
    echo ' <div class="col-sm-4">email</div>';
    echo '  <div class="col-sm-8"><input class="form-control" type="text" name="email" value="'.$user->email.'"/></div>';
    echo '  </div>';
     //echo ' </form>';
    echo '</div>';
    echo '<div class="modal-footer">';
   echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
   //echo '<form action="'.base_url().'/Admin/updateUser" method="POST">';
   echo '<input type="hidden" name="id" value="'.$user->id.'" />';
   echo '<button type="submit" class="btn btn-warning">Modifier</button>';    
   echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  
  ?>
              </div>
    <?php else:?>
                               <?php echo '<div class="card bg-dark text-black"><img src="https://www.angelxp.eu/image/Twitter/anime/your-name10.jpg" class="card-img" alt="imgnotconnected"><div class="card-img-overlay"><h1 class="card-title">すみません〜</h1><h2 class="card-text">Sumimasen〜<h2><h3 class="card-text">Vous devez être connecté!</h3></div></div>'?>
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
