<div class="pageheader">
  <h2><i class="fa fa-group"></i> Student Placement For School Year: <?php echo $year->name?> </h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>Student Placement</li>
      <li class="active">Class Placement </li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Student Placement For School Year : <?php echo $year->name?> </h3>
      <p>
    Don't Touch this data unless you're confident. 
      </p>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table" id="table1">
          <thead>
            <th style="width:10%;">#</th>
            <th style="width:20%;">Unit</th>
            <th style="width:20%;"></th>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($ls_unit as $unit): ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $unit->name; ?></td>
                    <td>
                      <?php if($unit->id!='0000'){ ?>
                       <a href="<?php echo base_url(); ?>placement/classes/list_class/<?php echo $unit->id; ?>">
                       Student Placement Manage</a>
                      <?php } ?>
                    </td>
                </tr>
            <?php $no++; endforeach ; ?>
          </tbody>
       </table>
      </div><!-- table-responsive -->
      <div class="clearfix mb30"></div>
    </div><!-- panel-body -->
  </div><!-- panel -->
    
</div><!-- contentpanel -->