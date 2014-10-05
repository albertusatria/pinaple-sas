<div class="pageheader">
  <h2><i class="fa fa-group"></i> Manage Extrakurikuler </h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
      <li>Initiation Data</li>
      <li><a href="<?php echo base_url();?>initiation/extra_open">Extra Open</a></li>
      <li class="active">Menu <?php echo $unit->name ?> </li>
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
      <h3 class="panel-title">Manage Extras on Unit <?php echo $unit->name ?></h3>
      <p>
          <a class="btn btn-danger" href="<?php echo base_url(); ?>initiation/extra_open/add/<?php echo $unit->id; ?>" data-title="Add Data" class="tip">Add Extra</a>
      </p>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <th style="width:10%;">#</th>
            <th style="width:20%;">Extrakurikuler</th>
            <th style="width:20%;">Coach 1</th>
            <th style="width:20%;">Coach 2</th>
            <th style="width:20%;">Monthly Cost</th>
            <th style="width:20%;"></th>
          </thead>
          <tbody>
            <?php if (count($extras) > 0) : ?>
              <?php $no = 1; foreach ($extras as $extra): ?>
                  <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $extra->name; ?></td>
                      <td><?php echo $extra->homeroom_1_name; ?></td>
                      <td><?php echo $extra->homeroom_2_name; ?></td>
                      <td>Rp. <?php echo $extra->amount; ?></td>
                      <td>
                         <a href="<?php echo base_url(); ?>initiation/extra_open/edit/<?php echo $unit->id; ?>/<?php echo $extra->id; ?>">
                          <i class="fa fa-pencil"></i></a>
                          &nbsp;&nbsp;
                         <a href="<?php echo base_url(); ?>initiation/extra_open/delete/<?php echo $unit->id; ?>/<?php echo $extra->id; ?>"
                          onsubmit="return confirm('Do you want to delete the following data? All of students who enrolled will be remove as well')">
                          <i class="fa fa-trash-o"></i></a>                                            
                      </td>
                  </tr>
              <?php $no++; endforeach ; ?>
            <?php else : ?>
                  <tr>
                    <td colspan='6'>No Extra yet!</td>
                  </tr>
            <?php endif; ?>
          </tbody>
       </table>
      </div><!-- table-responsive -->
      <div class="clearfix mb30"></div>
    </div><!-- panel-body -->
  </div><!-- panel -->
    
</div><!-- contentpanel -->