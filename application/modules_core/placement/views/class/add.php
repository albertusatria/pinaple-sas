<div class="pageheader">
  <h2><i class="fa fa-asterisk"></i>Student Placement</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>Student Placement</li>
      <li><a href="<?php echo base_url();?>placement/classes">Class Placement</a></li>
      <li><a href="<?php echo base_url();?>placement/classes/list_class/<?php echo $unit->id?>">Menu <?php echo $unit->name?></a></li>
      <li><a href="<?php echo base_url();?>placement/classes/placement/<?php echo $result->id?>">Class <?php echo $result->name?></a></li>
      <li class="active">Add Student</li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-btns">
        <a href="#" class="panel-close">&times;</a>
        <a href="#" class="minimize">&minus;</a>
      </div>
      <h4 class="panel-title">Enroll Student to Class "<?php echo $result->name?>" </h4>
      <p>School Year: <?php echo $year->name?></p><br><br>
    </div>
    <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>placement/classes/add_process/<?php echo $result->id?>">

    <div class="panel-body">
      <div class="table-responsive">
        <table class="table" id="table1">
          <thead>
            <th style="width:10%;">#</th>
            <th style="width:20%;">NIS</th>
            <th style="width:20%;">Full Name</th>
            <th style="width:20%;">Unit</th>
            <th style="width:20%;">Current Level</th>
          </thead>
          <tbody>
            <?php foreach ($siswas as $siswa): ?>
              <tr>
                <td><input name="siswa<?php echo $siswa->nis ?>[check]" type="checkbox"></td>
                <input type="hidden" name="siswa<?php echo $siswa->nis ?>[nis]" value="<?php echo $siswa->nis ?>">
                <input type="hidden" name="siswa<?php echo $siswa->nis ?>[class_id]" value="<?php echo $result->id ?>">                                            
                <td><?php echo $siswa->nis; ?></td>
                <td><?php echo $siswa->full_name; ?></td>
                <td><?php echo $siswa->unit_name; ?></td>
                <td><?php echo $siswa->current_level; ?></td>
              </tr>
            <?php endforeach ; ?>
          </tbody>
       </table>
      </div><!-- table-responsive -->
      <br><br>
    <div class="panel-footer">
         <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <button class="btn btn-danger">Tambah</button>&nbsp;
              <button class="btn btn-default">Cancel</button>
            </div>
         </div>
      </div><!-- panel-footer -->
      </form>
    
  </div><!-- panel -->      
</div><!-- contentpanel -->