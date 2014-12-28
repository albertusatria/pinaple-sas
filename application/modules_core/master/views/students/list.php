<div class="pageheader">
    <h2><i class="fa fa-sort-alpha-asc"></i>Student Management</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Master</li>
        <li class="active">Student Management</li>
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
  	
  	<div class="row">
  		<div class="col-md-12">
		  	<div class="panel panel-default">
		        <div class="panel-heading">
		          <h4 class="panel-title">Manage Student</h4>
		        </div><!-- panel-heading -->
		        
		        <div class="panel-body">

 					<div class="table-container">
						<div class="table-actions-wrapper">
						<!--
							<div class="col-md-4 col-sm-12 right bulk-actions">
								<button class="btn btn-sm btn-success table-group-action-submit"><i class="fa fa-check"></i> Submit</button>							
							<select class="table-group-action-input form-control input-inline input-small input-sm">
								<option value="">Select...</option>
								<option value="Cancel">Cancel</option>
								<option value="Cancel">Hold</option>
								<option value="Cancel">On Hold</option>
								<option value="Close">Close</option>
							</select>
							<label class="bulk-label">Bulk Actions</label>
							</div>
						-->
						</div>
						<table class="table table-striped table-bordered table-hover table-students" id="datatable_orders">
						<thead>
						<tr role="row" class="heading">
							<th width="2%">
								 No <!--<input type="checkbox" class="group-checkable">-->
							</th>
							<th width="10%">
								 NIS&nbsp;#
							</th>
							<th width="15%">
								 Name
							</th>
							<th width="14%">
								 Unit
							</th>
							<th width="8%">
								 Current Level
							</th>
							<th width="8%">
								 Status
							</th>
							<th width="12%">
								 Actions
							</th>
						</tr>
						<tr role="row" class="filter">
							<td>
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm nis_student" name="nis_student">
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm name_student" name="name_student">
							</td>
							<td>
								<select name="unit_student" class="form-control form-filter input-sm unit_student">
									<option value="">Select...</option>
									<option value="KB">KB</option>
									<option value="TK">TK</option>
									<option value="SD">SD</option>
									<option value="SMP">SMP</option>
								</select>
							</td>
							<td>
								<input type="text" class="form-control form-filter input-sm current_level_student" name="current_level_student">
							</td>
							<td>
								<select name="status_student" class="form-control form-filter input-sm status_student">
									<option value="">Select...</option>
									<option value="SISWA">Siswa</option>
									<option value="ALUMNI">Alumni</option>
								</select>
							</td>
							<td class="actions">
								<div class="margin-bottom-5">
									<button class="btn btn-sm btn-warning filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
								</div>
								<button class="btn btn-sm btn-info filter-cancel"><i class="fa fa-times"></i> Reset</button>
							</td>
						</tr>
						</thead>
						<tbody>
							<?php if(empty($ls_students)){ ?>
					       		<tr><td colspan="7" align="center"> -- there is no students -- </td></tr>
					       	<?php }else{ ?>	
						        <?php $no = 1; foreach ($ls_students as $result): ?>
						          <tr>
						          	<td><?php echo $no; ?><!--<input type="checkbox" class="checkable">--></td>
									<td class="td-nis"><?php echo @$result->nis; ?></td>
									<td class="td-full_name"><?php echo @$result->full_name; ?></td>
									<td class="td-unit_name"><?php echo @$result->unit_name; ?></td>
									<td class="td-current_level"><?php echo @$result->current_level; ?></td>
									<td class="td-status"><?php echo @$result->status; ?></td>
									<td><a href="students/manage_profile/<?php echo $result->nis; ?>" class="view-student">Details</a></td>
						          </tr>
						         <?php $no++; endforeach ; ?>
					       	<?php } ?>
						</tbody>
						</table>
						</div>
					</div>										
		        </div>
		        <!-- /panel-body -->
		        
			</div>
			<!-- /panel -->
  		</div>
  		<!-- /col-md-12 -->
  	</div>
  	<!-- /row -->

</div><!-- /contentpanel -->