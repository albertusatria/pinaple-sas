    <div class="pageheader">
      <h2><i class="fa fa-group"></i>Employees Management</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li>Master</li>
          <li class="active">Employees Management </li>
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
          <h3 class="panel-title">Employees Management</h3>
          <p>
        Don't Touch this data unless you're confident. <br><br>
            <a href="<?php echo base_url(); ?>master/employees/add" data-title="Add Data" class="tip"><i class="fa fa-plus"></i> Add New Employee</a>
          </p>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>NIK</th>
                      <th>Full Name</th>
                      <th>Sex</th>
                      <th>Birthplace</th>
                      <th>Birthday</th>
                      <th>Cellphone</th>
                      <th>Email</th>
                      <th>Class</th>
                      <th style="width:10%;"></th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no = 1; foreach ($rs_employees as $result): ?>
                      <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $result->nik; ?></td>
                          <td><?php echo $result->full_name; ?></td>
                          <td><?php echo $result->sex; ?></td>
                          <td><?php echo $result->pob; ?></td>
                          <td><?php echo date("d-m-Y",strtotime($result->dob)); ?></td>
                          <td><?php echo $result->cell_phone; ?></td>
                          <td><?php echo $result->email; ?></td>
                          <td><?php echo $result->class; ?></td>                                            
                          <td>
                               <a href="<?php echo base_url(); ?>master/employees/edit/<?php echo $result->nik; ?>">
                                <i class="fa fa-file"></i></a>
                                &nbsp;&nbsp;
                                <i class="fa fa-trash-o" onclick="hapus(<?php echo $result->nik ?>,'<?php echo $result->full_name ?>')"></i>
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