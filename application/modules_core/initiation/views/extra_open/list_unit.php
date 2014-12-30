<div class="pageheader">
  <h2><i class="fa fa-group"></i>Setup Extracuriculer</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>Initiation Data</li>
      <li class="active">Setup Extracuriculer</li>
    </ol>
  </div>
</div>
    
<div class="contentpanel">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Setup Extracuriculer for School Year: <?php echo $active_school_year->name?></h3>
      <small>
      This menu is used for setting list of extracuriculer of school in respected year
      </small>
    </div>
    
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <th style="width:5%;">#</th>
            <th style="width:40%;">Unit</th>
            <th style="width:10%;"></th>
          </thead>
          <tbody>
              <?php $no = 1; foreach ($units as $unit): ?>
                  <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $unit->name; ?></td>
                      <td>
                         <a href="<?php echo base_url(); ?>initiation/extra_open/extra_list/<?php echo $unit->id; ?>">
                          <i class="fa fa-eye"></i>
                         List Extracuriculer</a>
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