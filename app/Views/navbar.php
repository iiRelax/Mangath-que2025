<html>
    
            
    <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <?php
            // Utilisation de la méthode session() de CodeIgniter au lieu de $_SESSION
            $session = session();
            $user = $session->get('user');
            
            // Déboguer la session utilisateur
            if (isset($user)) {
                $role = $user->getRole();
                $role_name = $role ? $role->name : 'Aucun rôle';
                log_message('debug', 'Utilisateur connecté avec le rôle: ' . $role_name);
            } else {
                log_message('debug', 'Aucun utilisateur en session');
            }
            
            if (isset($user) && ($user->getRole())->name == "admin") {
                echo view('/Admin/acceuil');
            } 
            else{
                echo '<a class="navbar-brand" href="' . base_url() . '">Mangathèque</a>';
    echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">';
      echo '<span class="navbar-toggler-icon"></span>';
    echo '</button>';
        echo '<li class="nav-item">';
         echo  '<a class="nav-link" href="' . base_url('Home/nouveautés') . '">Nouveautés</a>';
        echo '</li>';
        echo '<li class="nav-item">';
         echo  '<a class="nav-link" href="' . base_url('Home/recommandation') . '">Recommandations</a>';
       echo ' </li>        ';
       echo '<li class="nav-item">';
         echo  '<a class="nav-link" href="' . base_url('Home/genres') . '">Genres</a>';
        echo '</li>';
        echo '<li class="nav-item">';
         echo  '<a class="nav-link" href="' . base_url('Home/editions') . '">Editions</a>';
       echo ' </li>        ';
        echo '<li class="nav-item dropdown">';
        echo  ' <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Plus</a>';
        echo  ' <div class="dropdown-menu">';
        echo  '   <a class="dropdown-item" href="' . base_url('Home/maCollection') . '">Ma collection</a>';
        echo   '  <a class="dropdown-item" href="' . base_url('Home/mesEnvies') . '">Mes Envies</a>   ';        
        
        echo  ' </div>';
        echo '</li>';
        
     echo ' </ul>';
            echo   '<ul class="navbar-nav me-auto">';}
            ?>
             
        <?php
            // Utilisation de la méthode session() de CodeIgniter au lieu de $_SESSION
            $user = session()->get('user');
            
            if (isset($user) && ($user->getRole())->name == "admin") {
                // Code pour administrateur
            } elseif (isset($user) && ($user->getRole())->name == "user") {
              echo '<li class="nav-item"><a data-bs-target="#profileModal" data-bs-toggle="modal" class="nav-link">Salut ' . $user->firstname . '</a></li>';
              echo '<li class="nav-item">';
              echo '<a href="' . base_url('Home/logout') . '" class="btn btn-info">Logout</a></li>';
            } else {
            ?>
          <li class="nav-item">
            <a class="btn btn-info" data-bs-target="#myModal" data-bs-toggle="modal">Connexion</a>
          </li>
          <li class="nav-item">
          <a class="btn btn-info" data-bs-target="#inscriptionModal" data-bs-toggle="modal">Inscription</a>
        </li>
        <?php
            }
        ?>
        </ul>
        <!-- search bar  -->
      <form id="kform">
        <input type="text" id="it" onkeyup="loadAjax()" placeholder="Search"/><list class="dropdown-item" id="results"></list>
      </form>
        
    </div>
  </div>
</nav>

            

            <?php
            include_once 'loginModal.php';
            include_once 'inscriptionModal.php';
            include_once 'profileModal.php';
            ?>

    </header>
    <script>
        function loadAjax(){
            var k = $('#it').val();
            $.get('<?= base_url('Home/searchManga/?k=')?>'+ k, function(data){
                $('#results').html(data);
            });
        }
    </script>
    
</html>
