<div class="clearfix"> </div>

<div class="panel panel-default">
	<div class="panel-heading"> <h3 class="panel-title">รายการไฟล์แนบทั้งหมด</h3> </div>
	<div class="panel-body">
		<div class="row hidden-print">
			<p>รายการไฟล์เอกสารแนบ</p>
			<ul>
				<?php if ($record['file_1']!='') { ?>
					<li><a href="<?=site_url('uploads/'.$record['file_1']);?>" target="_blank">เอกสารแนบ 1</a></li>
				<?php } ?>
				<?php if ($record['file_2']!='') { ?>
					<li><a href="<?=site_url('uploads/'.$record['file_2']);?>" target="_blank">เอกสารแนบ 2</a></li>
				<?php } ?>
				<?php if ($record['file_3']!='') { ?>
					<li><a href="<?=site_url('uploads/'.$record['file_3']);?>" target="_blank">เอกสารแนบ 3</a></li>
				<?php } ?>
				<?php if ($record['file_4']!='') { ?>
					<li><a href="<?=site_url('uploads/'.$record['file_4']);?>" target="_blank">เอกสารแนบ 4</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
