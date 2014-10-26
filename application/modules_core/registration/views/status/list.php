<div class="pageheader">
    <h2><i class="fa fa-list-alt"></i>Student Status</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Registration Data </li>
        <li class="active">Student Status</li>
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

  <!-- Search Form -->  
  <div class="row">
	<div class="col-md-12">
	  <div class="panel panel-default">
	  
	    <div class="panel-heading">
	      <div class="panel-btns">
	        <a href="#" class="minimize">−</a>
	      </div>
	      <h4 class="panel-title">Student Registration Status of School Year: <strong><?php echo $active_school_year->name ?></strong></h4>
	      <p>This is form to search all student registration status</p>
	    </div>
	    
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table mb30" id="all-students" class="display" cellspacing="0" width="100%">
					<thead>
			            <tr>
			                <th>NIS</th>
			                <th>Name</th>
			                <th>Grades</th>
			                <th>Level</th>
			                <th>Status</th>
			                <th>Actions</th>
			            </tr>
			        </thead>
			 
			        <tfoot>
			            <tr>
			                <th colspan="2">Name</th>
			                <th>Grades</th>
			                <th>Level</th>
			                <th>Status</th>
			            </tr>
			        </tfoot>
			 
			        <tbody>
			            <tr>
			            	<td>0442</td>
			                <td>Tiger Nixon</td>
			                <td>SD</td>
			                <td>6</td>
			                <td>Registered</td>
							<td class="table-action">
			                  <a href="#"><i class="fa fa-pencil"></i></a>
			                </td>
			            </tr>
			            <tr>
			            	<td>0443</td>
			                <td>Garreth Winters</td>
			                <td>SMP</td>
			                <td>3</td>
			                <td>Unregistered</td>
							<td class="table-action">
			                  <a href="#"><i class="fa fa-pencil"></i></a>
			                </td>
			            </tr>
			            <tr>
			            	<td>0444</td>
			                <td>Ashton</td>
			                <td>KB</td>
			                <td>Pra Yuliang</td>
			                <td>Moved</td>
							<td class="table-action">
			                  <a href="#"><i class="fa fa-pencil"></i></a>
			                </td>
			            </tr>
			            <tr>
			            	<td>0445</td>
			                <td>Cedric Kelly</td>
			                <td>SD</td>
			                <td>1</td>
			                <td>Re-registration</td>
							<td class="table-action">
			                  <a href="#"><i class="fa fa-pencil"></i></a>
			                </td>
			            </tr>
			        </tbody>				
				</table>
			</div>
		</div><!-- panel-body -->
	    
	  </div><!-- panel -->
	</div>
  </div>
  <!-- end Search Form -->
  
</div><!-- contentpanel -->