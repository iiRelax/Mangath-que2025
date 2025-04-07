<div class="modal" tabindex="-1" id="profileModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><a href="<?php echo base_url(); ?>/home/monProfil">Mon Profil</a></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                      <!-- Afficher les données du user  -->
                   <?php 
                        $imgPath=base_url('assets/uploads/OIP.jpg');
                        if(isset(session('user')->avatar) && session('user')->avatar!=''){
                            $imgPath=base_url('/assets/uploads/').'/'.session('user')->avatar;
                        }
                      ?>
                    <img src="<?php echo $imgPath; ?>" class="img-fluid rounded-start" alt="profilImage">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">
                          <?php if(null!=(session('user'))){
                                echo session('user')->getFullName();
                                echo '<br>';
                                echo '<br>';
                                echo session('user')->email;
                          } ?>
                      </h5>
                      <p class="card-text"></p>
                      
                    </div>
                  </div>
                </div>
           </div>
             </div>
            </div>
              </div>
      </div>
   
    </div>
  </div>
</div>
