<html>
    
    <body>        
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo base_url(); ?>/Admin/acceuil">Vue Administrateur</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
       
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>/Admin/addMangaForm">Ajouts Mangas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>/Admin/allUsers">Utilisateurs</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>/Admin/hPAdmin">Formulaires d'aide</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>/Admin/mangas">Mangas</a>
        </li>  
                
      </ul>
        </div>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
            <?php
                                if (isset($_SESSION['user'])) {
                                    echo '<li class="nav-item"><a data-bs-target="#profileModal" data-bs-toggle="modal" class="nav-link">Salut ' . $_SESSION['user']->firstname . '</a></li>';
                                    echo '<li class="nav-item">';
                                    echo '<a href="';
                                    echo base_url();
                                    echo '\home\Logout" class="btn btn-info">Logout</a></li>';
                                } else {
                                    ?>
        <li class="nav-item">
                                    <a class="btn btn-info" data-bs-target="#myModal" data-bs-toggle="modal">Login</a>
                                </li>
                                <li class="nav-item">
                                <a class="btn btn-info" data-bs-target="#inscriptionModal" data-bs-toggle="modal">Inscription</a>
                            </li>   
                                    <?php
                                }
                            ?>
                        
        </ul>
                
    </div>
  </div>
</nav>

            

            
    </header>
        
    </body>
</html>