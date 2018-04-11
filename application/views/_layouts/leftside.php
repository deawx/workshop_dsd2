<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?=result_in_array($meta_tag);?>

  <title><?=$page_title;?></title>

  <?=link_tag('assets/css/bootstrap.min.css');?>
  <?=link_tag('assets/css/bootstrap.theme.min.css');?>
  <?=link_tag('assets/css/font-awesome.min.css');?>
  <?=result_in_array($css);?>

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?=script_tag('assets/js/jquery.min.js');?>
  <?=script_tag('assets/js/bootstrap.min.js');?>
</head>
<body style="padding-top:5em;">

  <div class="container">
    <div class="row">
      <?=$navbar;?>
    </div>

    <div class="row">
      <div class="col-md-4">
        <?=result_in_array($leftbar);?>
      </div>
      <div class="col-md-8">
        <?=result_in_array($header);?>
        <?=result_in_array($body);?>
      </div>
    </div>

    <div class="row">
      <?=$footer;?>
    </div>
  </div>

  <?=result_in_array($js);?>

</body>
</html>
