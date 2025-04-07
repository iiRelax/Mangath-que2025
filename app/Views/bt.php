<!-- view search bar -->
 <?php foreach($bt as $key=>$b){
    echo '<a class="dropdown-item" href="' . base_url('Home/chaqueManga/' . $b->id) . '">'.$b->titre.'</a>';
} ?>
