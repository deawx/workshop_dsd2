<div class="row">
  <div class="container">
    <h3><?=$news['title'];?></h3>
    <hr>
    <p class="lead">
      วันที่ประกาศ : <span class="label label-info"><?=$news['date_create'];?></span>
      วันที่แก้ไข : <span class="label label-warning"><?=$news['date_update'];?></span>
      จำนวนผู้เข้าชม : <span class="label label-default"><?=$news['views'];?></span>
    </p>
    <div class="well"> <div class="row"> <?=($news['detail']);?> </div> </div>
  </div>
</div>
