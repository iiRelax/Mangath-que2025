<html>
<head>
        <meta charset="UTF-8">
        <title>Genres</title>
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
        <style>
            .genre-title {
                color: #00c2cb;
                margin: 30px 0 15px 0;
                font-size: 2.5rem;
            }
            .genre-description {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
    <header>
            <?php
            include_once 'navbar.php';
            ?>
        </header>
    
        <div class="container">
            <!-- montrer les mangas par genres chaque genre 4 mangas -->
            <?php foreach($genres as $genre): ?>
                <h2 class="genre-title"><?= $genre->nom_genre ?></h2>
                <div class="genre-description"><?= $genre->description ?></div>
                
                <?php 
                $counter = 0;
                $mangas = $genre->getMangas();
                if (count($mangas) > 0): 
                ?>
                    <div class="row">
                        <?php foreach($mangas as $key => $manga): ?>
                            <?php if($key % 4 === 0 && $key > 0): ?>
                                </div><div class="row">
                            <?php endif; ?>
                            
                            <div class="col-md-3 mb-4">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?= $manga->titre ?></h5>
                                        <a href="<?= base_url('Home/eachManga/' . $manga->id) ?>">
                                            <?php 
                                            $image_path = $manga->image;
                                            // Vérifier si l'image existe et a un chemin valide
                                            if (empty($image_path) || !filter_var($image_path, FILTER_VALIDATE_URL) && !file_exists(FCPATH . $image_path)) {
                                                // Image par défaut si l'image n'existe pas
                                                $image_path = base_url('assets/OIP.jpg');
                                            }
                                            ?>
                                            <img src="<?= $image_path ?>" class="img-fluid" style="max-height: 300px;" onerror="this.src='<?= base_url('assets/OIP.jpg') ?>'" alt="<?= $manga->titre ?>"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">
                        Aucun manga dans cette catégorie pour le moment.
                    </div>
                <?php endif; ?>
                
                <hr class="my-4">
            <?php endforeach; ?>
        </div>
     
    <footer>
        <div class="environment">
            <?php include_once 'footer.php'; ?>
        </div>
    </footer>
    </body>
</html>


