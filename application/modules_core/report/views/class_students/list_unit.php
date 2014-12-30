<div class="pageheader">
  <h2><i class="fa fa-group"></i>Class Students of School Year: <?php echo $active_school_year->name?></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>General Reports</li>
      <li class="active">Class Students for School Year: <?php echo $active_school_year->name?></li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Class Students for School Year: <?php echo $active_school_year->name?></h3>
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
              <?php $no = 1; foreach ($units as $unit): ?>
                  <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $unit->name; ?></td>
                      <td>
                         <a href="<?php echo base_url(); ?>report/class_students/class_list/<?php echo $unit->id; ?>">
                         Buka Kelas</a>
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