<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
	  <form method="POST" action="<?php echo base_url(); ?>/home/login">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-sm-4">Email</div><div class="col-sm-8"><input type="text" class="form-control" name="email"/></div>
			</div>
		<div class="row">
			<div class="col-sm-4">Password</div><div class="col-sm-8"><input type="password" class="form-control" name="password"/></div>
		</div>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Login</button>
      </div>
	  </form>
    </div>
  </div>
</div>

