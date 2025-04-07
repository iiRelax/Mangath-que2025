<html>
<head>
        <meta charset="UTF-8">
        <title>Help Page</title>
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
    
    
   <!-- Formulaire d'aide les messages sont envoyes a l'admin  -->
   <div class="container col-sm-6">
    <h2 class="card-title">Formulaire d'aide</h2>

    <div class="card-body">
        <form method="POST" action="<?php echo base_url(); ?>/Home/helpPage" name="hpForm" id="hpForm">
            <div class="row">
                <div class="card col-sm-4">Email</div>
                <div class="card col-sm-8"><input class="form-control" type="text" name="email" /></div>
            </div>
            <div class="row">
                <div class="card col-sm-4">Sujet</div>
                <div class="card col-sm-8"><input class="form-control" type="text" name="sujet" /></div>
            </div>
            <div class="row">
                <div class="card col-sm-4">Requête</div>
                <div class="card col-sm-8"><textarea class="form-control" type="text" name="requete"  rows="15"/></textarea></div>
            </div>
             </form>
    </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-success" onclick="sendForm('hpForm')">Envoyer</button>
    </div>

   
  
    
    
    
    <footer>
            <div class="environment">

                <?php
            include_once 'footer.php';
            ?>

            </div>


        </footer>
    <script>
        function sendForm(formid) {
            document.getElementById(formid).submit();
        }
    </script>
    </body>
    
</html>
