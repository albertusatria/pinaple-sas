<div class="pageheader">
  <h2><i class="fa fa-group"></i> Class Students</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>General Reports</li>
      <li><a href="<?php echo base_url();?>report/class_students">Class Student</a></li>
      <li><a href="<?php echo base_url();?>report/class_students/class_list/<?php echo $unit->id ?>">Menu <?php echo $unit->name ?></a></li>
      <li class="active">Student List</li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">
  <div class="panel panel-default">

    <div class="panel-heading">
      <h4 class="panel-title">Student List on Class <b><?php echo $class->name; ?></b>, Unit <b><?php echo $unit->name; ?></b></h4>
    </div>
  
    <div class="panel-body panel-body-nopadding">               
      <table class="table table-striped table-bordered table-hover table-students" id="datatable_orders">
        <thead>
        <tr role="row" class="heading">
          <th width="5%">
             No <!--<input type="checkbox" class="group-checkable">-->
          </th>
          <th width="15%">
             Nis
          </th>
          <th width="50%">
             Name
          </th>
          <th width="15%">
             Status
          </th>
          <th width="15%">
             Conclusion
          </th>
        </tr>
        </thead>
        <tbody>
          <?php if(empty($student)){ ?>
            <tr><td colspan="5" align="center"> -- there are no students -- </td></tr>
            <?php }else{ ?> 
                <?php $no = 1; foreach ($student as $result): ?>
            <tr>
              <td><?php echo $no; ?><!--<input type="checkbox" class="checkable">--></td>
              <td><?php echo @$result->nis; ?></td>
              <td><?php echo @$result->full_name; ?></td>
              <td><?php echo @$result->status; ?></td>
              <td><?php echo @$result->conclusion; ?></td>
            </tr>
                 <?php $no++; endforeach ; ?>
            <?php } ?>
        </tbody>
      </table>
    </div><!-- panel-body -->
    
    <div class="panel-footer">
        
    </div><!-- panel-footer -->    

  </div><!-- panel -->      
</div><!-- contentpanel -->