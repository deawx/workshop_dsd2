<div class="row">
  <div class="col-md-12">
    <?php if($this->session->flashdata('success')) : ?>
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
      </div>
    <?php elseif($this->session->flashdata('info')) : ?>
      <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
      </div>
    <?php elseif($this->session->flashdata('warning')) : ?>
      <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
      </div>
    <?php elseif($this->session->flashdata('danger')) : ?>
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo $this->session->flashdata('danger'); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
