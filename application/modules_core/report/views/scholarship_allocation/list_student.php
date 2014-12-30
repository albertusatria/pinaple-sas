<div class="pageheader">
  <h2><i class="fa fa-group"></i> Scholarship Allocation</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>General Reports</li>
      <li><a href="<?php echo base_url();?>report/scholarship_allocation">Scholarship Allocation</a></li>
      <li class="active">Student List</li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">
  <div class="panel panel-default">

    <div class="panel-heading">
      <h4 class="panel-title">Student List of Scholarship Allocation: 
      <b><?php echo $scholarship->name; ?></b> - Rp <?php echo number_format($scholarship->amount,2,'.',','); ?></h4>
      <p><?php echo $scholarship->description; ?></p>
    </div>
  
    <div class="panel-body panel-body-nopadding">               
      <table class="table table-striped table-bordered table-hover table-students" id="datatable_orders">
        <thead>
        <tr role="row" class="heading">
          <th width="5%">
             No <!--<input type="checkbox" class="group-checkable">-->
          </th>
          <th width="10%">
             NIS
          </th>
          <th width="20%">
             Student Name
          </th>
          <th width="15%">
             Class
          </th>
          <th width="15%">
             Amount Allocation
          </th>
          <th width="30%">
             Note
          </th>
        </tr>
        </thead>
        <tbody>
          <?php if(empty($student)){ ?>
            <tr><td colspan="6" align="center"> -- there are no students -- </td></tr>
            <?php }else{ ?> 
                <?php $no = 1; foreach ($student as $result): ?>
            <tr>
              <td><?php echo $no; ?><!--<input type="checkbox" class="checkable">--></td>
              <td><?php echo @$result->nis; ?></td>
              <td><?php echo @$result->full_name; ?></td>
              <td><?php echo @$result->class_name; ?></td>
              <td align="right"><span style="float:left;">Rp </span><?php echo number_format(@$result->amount,2,',','.'); ?></td>
              <td><?php echo @$result->notes; ?></td>
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