<div class="pageheader">
  <h2><i class="fa fa-group"></i>Extra Placement</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>Student Placement</li>
      <li><a href="<?php echo base_url();?>placement/extras_first">Extra Placement</a></li>
      <li><a href="<?php echo base_url();?>placement/extras_first/list_extra/<?php echo $unit->id?>">Menu <?php echo $unit->name?></a></li>
      <li class="active">Extra: <?php echo $result->name?></li>
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
      <div class="panel-btns">
        <a href="#" class="minimize">&minus;</a>
      </div>
      <h4 class="panel-title">List of Students enroll in Extrakurikuler "<?php echo $result->name?>" </h4>
      <p>School Year: <?php echo $year->name?><br>
        First Semester
      </p><br><br>
      <a href="<?php echo base_url(); ?>placement/extras_first/add_student/<?php echo $result->id; ?>" 
        data-title="Add Data" class="btn btn-danger tip"><i class="fa fa-plus"></i> Add Students</a>
    </div><!-- panel-heading -->
    <form id="daftarUlang" class="form-horizontal">

    <div class="panel-body">
      <div class="table-responsive">
        <table class="table" id="table1">
          <thead>
            <th style="width:10%;">#</th>
            <th style="width:20%;">NIS</th>
            <th style="width:20%;">Full Name</th>
            <th style="width:20%;">Status</th>
            <th style="width:20%;"></th>
          </thead>
          <tbody>
              <?php $no = 1; foreach ($siswas as $siswa): ?>
                  <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $siswa->nis; ?></td>
                      <td><?php echo $siswa->full_name; ?></td>
                      <td><?php echo $siswa->status; ?></td>
                      <td>
                         <a href='#' onclick="hapus('<?php echo $siswa->id; ?>','<?php echo $result->id; ?>','<?php echo $siswa->full_name; ?>')" >
                          <i class="fa fa-trash-o"></i></a>                                            
                      </td>
                  </tr>
              <?php $no++; endforeach ; ?>
          </tbody>
       </table>
      </div><!-- table-responsive -->
      <div class="clearfix mb30"></div>
    </div><!-- panel-body -->
<div class="panel-footer">
</div>
</form>        
  </div><!-- panel -->                      
</div><!-- contentpanel -->