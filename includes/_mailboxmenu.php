<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">SMS menu</h3>
    <div class="box-tools">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <li><a href="sentsms.php"><i class="fa fa-inbox"></i> Sent <span class="label label-primary pull-right"><?php echo $smstext->total_sent ?></span></a></li>
      <li><a href="draftsms.php"><i class="fa fa-file-text-o"></i> Drafts <span class="label label-primary pull-right"><?php echo $smstext->total_draft ?></span></a></li>
      <!-- <li class="active"><a href="draftsms.php"><i class="fa fa-file-text-o"></i> Drafts</a></li> -->
      <!-- <li><a href=""><i class="fa fa-envelope-o"></i> Draft</a></li> -->
      <!-- <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a></li> -->
      <!-- <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li> -->
    </ul>
  </div><!-- /.box-body -->
</div><!-- /. box -->
<!-- <div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Labels</h3>
    <div class="box-tools">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
      <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
    </ul>
  </div>
</div> --> 