<div class="pageheader">
  <h2><i class="fa fa-group"></i> Extra Students </h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>General Reports</li>
      <li><a href="<?php echo base_url();?>report/extra_students">Extra Student</a></li>
      <li class="active">Unit <?php echo $unit->name ?></li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">
  
  <?php if ($message != null ) : ?>
  <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Well done!</strong> <?php echo $message; ?>
    </div>
  <?php endif ; ?>

  <?php if ($error != null ) : ?>
  <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Warning!</strong> <?php echo $error; ?>
    </div>
  <?php endif ; ?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Extras on Unit <b><?php echo $unit->name ?></b></h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <th style="width:5%;">No</th>
            <th style="width:25%;">Extra Name</th>
            <th style="width:20%;">Extra Teacher 1</th>
            <th style="width:20%;">Extra Teacher 2</th>
            <th style="width:15%;text-align:center;">Half Period</th>
          </thead>
          <tbody>
            <?php if (count($extras) > 0) : ?>
              <?php $no = 1; foreach ($extras as $extra): ?>
                  <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $extra->name; ?></td>
                      <td><?php echo $extra->homeroom_1_name; ?></td>
                      <td><?php echo $extra->homeroom_2_name; ?></td>
                      <td align="center">
                         <a href="<?php echo base_url(); ?>report/extra_students/student_list/<?php echo $unit->id; ?>/<?php echo $extra->id;?>/1">
                          Odd</a>                                         
                      &nbsp;&nbsp; | &nbsp;&nbsp;
                         <a href="<?php echo base_url(); ?>report/extra_students/student_list/<?php echo $unit->id; ?>/<?php echo $extra->id;?>/2">
                          Even</a>                                         
                      </td>
                  </tr>
              <?php $no++; endforeach ; ?>
            <?php else : ?>
                  <tr>
                    <td colspan='6' align='center'>No Extra yet!</td>
                  </tr>
            <?php endif; ?>
          </tbody>
       </table>
      </div><!-- table-responsive -->
      <div class="clearfix mb30"></div>
    </div><!-- panel-body -->
  </div><!-- panel -->
    
</div><!-- contentpanel -->