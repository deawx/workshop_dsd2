<div class="row">
  <div class="container">
    <h3><?=$news['title'];?></h3>
    <hr>
    <p class="lead">
      วันที่ประกาศ : <span class="btn btn-info btn-sm"><?=$news['date_create'];?></span>
      วันที่แก้ไข : <span class="btn btn-warning btn-sm"><?=$news['date_update'];?></span>
      จำนวนผู้เข้าชม : <span class="btn btn-default btn-sm"><?=$news['views'];?></span>
    </p>
    <div class="well"> <div class="row"> <?=($news['detail']);?> </div> </div>
    <?php if ($news['file_1'] != '') : ?>
      <div class="well">
        <div class="row">
          <div class="col-md-12"> <img src="<?=base_url('uploads/'.$news['file_1']);?>" class="img-fluid img-thumbnail"></div>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($news['file_2'] != '') : ?>
      <div class="well">
        <div class="row">
          <div class="col-md-12"> <img src="<?=base_url('uploads/'.$news['file_2']);?>" class="img-fluid img-thumbnail"></div>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($news['file_3'] != '') : ?>
      <div class="well">
        <div class="row">
          <div class="col-md-12"> <img src="<?=base_url('uploads/'.$news['file_3']);?>" class="img-fluid img-thumbnail"></div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
