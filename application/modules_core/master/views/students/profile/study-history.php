<?php
 /*
  * Author		: Albertus S Yudha
  * Description	: Block for Student Study History
 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">List of History Classes</h4>
    </div>  
    <div class="panel-body panel-body-nopadding">               
      <table class="table table-striped table-bordered table-hover table-students" id="datatable_orders">
        <thead>
        <tr role="row" class="heading">
          <th width="5%">
             No <!--<input type="checkbox" class="group-checkable">-->
          </th>
          <th width="10%">
             School Year
          </th>
          <th width="15%">
             Unit Name
          </th>
          <th width="5%">
             Level
          </th>
          <th width="20%">
             Class Name
          </th>
          <th width="15%">
             Status
          </th>
        </tr>
        </thead>
        <tbody>
          <?php if(empty($student_classes)){ ?>
            <tr><td colspan="6" align="center"> -- there are no classes -- </td></tr>
            <?php }else{ ?> 
                <?php $no = 1; foreach (@$student_classes as $result): ?>
            <tr>
              <td><?php echo $no; ?><!--<input type="checkbox" class="checkable">--></td>
              <td><?php echo @$result->school_year_name; ?></td>
              <td><?php echo @$result->unit_name; ?></td>
              <td><?php echo @$result->class_level; ?></td>
              <td><?php echo @$result->class_name; ?></td>
              <td><?php echo @$result->conclusion; ?></td>
            </tr>
                 <?php $no++; endforeach ; ?>
            <?php } ?>
        </tbody>
      </table>
    </div><!-- panel-body -->
</div><!-- panel -->      

<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">List of History Extras</h4>
    </div>
    <div class="panel-body panel-body-nopadding">               
      <table class="table table-striped table-bordered table-hover table-students" id="datatable_orders">
        <thead>
        <tr role="row" class="heading">
          <th width="5%">
             No <!--<input type="checkbox" class="group-checkable">-->
          </th>
          <th width="10%">
             School Year
          </th>
          <th width="7%">
             Period
          </th>
          <th width="15%">
             Unit Name
          </th>
          <th width="20%">
             Extra Name
          </th>
        </tr>
        </thead>
        <tbody>
          <?php if(empty($student_extras)){ ?>
            <tr><td colspan="6" align="center"> -- there are no extras -- </td></tr>
            <?php }else{ ?> 
                <?php $no = 1; foreach (@$student_extras as $result): ?>
            <tr>
              <td><?php echo $no; ?><!--<input type="checkbox" class="checkable">--></td>
              <td><?php echo @$result->school_year_name; ?></td>
              <td><?php if($result->half_period==1) echo "odd"; else echo "even"; ?></td>
              <td><?php echo @$result->unit_name; ?></td>
              <td><?php echo @$result->extra_name; ?></td>
            </tr>
                 <?php $no++; endforeach ; ?>
            <?php } ?>
        </tbody>
      </table>
    </div><!-- panel-body -->
 </div>