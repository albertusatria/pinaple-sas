<div class="pageheader">
  <h2><i class="fa fa-group"></i>Student Placement For School Year: <?php echo $year->name?></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li><a href="<?php echo base_url();?>placement/classes">Class Placement</a></li>
      <li class="active">Student Placement <?php echo $unit->name?></li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">
  
  <?php if ($message != null ) : ?>
  <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Well done!</strong>   <?php echo $message; ?>
    </div>
  <?php endif ; ?>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Class Open Management <?php echo $unit->name ?> for School Year : <?php echo $year->name?></h3>
      <p>
    Add & Delete Class Open Management<br><br>
      </p>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table" id="table1">
          <thead>
            <th style="width:10%;">#</th>
            <th style="width:20%;">Name</th>
            <th style="width:20%;">Level</th>
            <th style="width:20%;">Enroll Students</th>
            <th style="width:20%;"></th>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($classes as $kelas): ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $kelas->name; ?></td>
                    <td><?php echo $kelas->level; ?></td>
                    <td><?php echo $kelas->enroll_count; ?></td>
                    <td>
                       <a href="<?php echo base_url(); ?>placement/classes/placement/<?php echo $kelas->id; ?>">
                        <i class="fa fa-pencil"></i></a>                                            
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