<div class="pageheader">
    <h2><i class="fa fa-strikethrough"></i>Scholarship</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Administration School</li>
        <li class="active">Scholarship</li>
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

  <?php if ($eror != null ) : ?>
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Warning!</strong>   <?php echo $eror; ?>
  </div>
  <?php endif ; ?>

	<!-- Panel Top -->  
	<div class="row">
		<!-- Search Result -->
		<div class="col-md-8">
		  <div class="panel panel-default">
		  
		    <div class="panel-heading">
		      <div class="panel-btns">
		        <a href="#" class="minimize">−</a>
		      </div>
		      <h4 class="panel-title">Search Scholarship Recepients for <strong><?php echo $school_year->name ?></strong> School Year Calendars</h4>
		      <p>This is form to search students who wants to <strong> next year register </strong> their ID</p>
		    </div>
		    
			<div class="panel-body">
			  <div class="row row-pad-5">
				  <div class="form-group">
					  
			          <div class="col-lg-8">
			            <input type="text" name="name" id="keyword" class="form-control" placeholder="Type student's Name or NIS..." required="">
			          </div>
			          
			          <div class="col-lg-4">
			            <a id="btnCari" class="btn btn-primary btn-block">Search</a>
			          </div>      
			                  	
			    </div>
			  </div><!-- row -->
			</div><!-- panel-body -->
		    
		  </div><!-- panel -->
		</div>
		
		<!-- Setup Scholarship-->
		<div class="col-md-4">
			<form id="newScholarship" method="POST" action="<?php echo base_url(); ?>administration/scholarship/add_process" class="form-horizontal">
			  <div class="panel panel-default">
			      <div class="panel-heading">
			        <div class="panel-btns">
			          <a href="#" class="minimize maximize">&plus;</a>
			        </div>
			        <h4 class="panel-title">New Scholarship Form</h4>
			      </div>
			      <div class="panel-body" style="display:none;">
					<!--
					<?php if ($message != null ) : ?>
						<?php if ($message == "Data successfully added"):?>
						<div class="alert alert-success">
				            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				            <strong>Well done!</strong> <?php echo $message; ?>
						</div>
						<?php elseif ($message == "Data successfully deleted"):?>
						 
						<?php elseif ($message == "Data successfully edited"):?> 
						 
						<?php else : ?>
						<div class="alert alert-danger">
				            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				            <?php echo $message; ?>
						</div>					
						<?php endif ; ?>
					<?php endif;?>
					-->
			        <div class="form-group">
			          <div class="col-sm-12">
			            <input type="text" name="name" class="form-control" placeholder="Type Scholarship name..." value="<?php echo $this->session->flashdata('name'); ?>" required />
			          </div>
			        </div>
					
			        <input type="hidden" id="school_year_id" name="school_year_id" class="form-control" value="<?php echo $school_year->id ?>"/>

					<div class="form-group">
					  <div class="col-sm-12">
					  	<div class="input-group">
					  		<span class="input-group-addon">Rp</span>
					  		<input name="amount" type="text" class="form-control" placeholder="example: 3000000" value="<?php echo $this->session->flashdata('amount'); ?>">
					  		<!--<span class="input-group-addon">.00</span>-->
		                </div>
					  </div>
					</div>
								        
			        <div class="form-group">
			          <div class="col-sm-12">
			            <textarea rows="5" name="description" class="form-control" placeholder="Type Scholarship notes..." required><?php echo $this->session->flashdata('description'); ?></textarea>
			          </div>
			        </div>
			      </div><!-- panel-body -->
			      <div class="panel-footer" style="display:none">
			        <div class="row">
			          <div class="col-sm-9 col-sm-offset-3">
			            <button class="btn btn-primary">Submit</button>
			            <button type="reset" class="btn btn-default">Reset</button>
			          </div>
			        </div>
			      </div>
			    
			  </div><!-- panel -->
          </form>
          		<div class="panel panel-default">
			      <div class="panel-heading">
			        <div class="panel-btns">
			          <a href="#" class="minimize maximize">&plus;</a>
			        </div>
			        <h4 class="panel-title">Scholarship List</h4>
			      </div>
				  <div class="panel-body" style="display:none;">
					<table class="table">		
			          <tr>
			            <th width="5%" style="padding:2px;">No</th>
			            <th style="padding:2px;">Name</th>
			            <th colspan="2" style="padding:2px; text-align:center;">Amount</th>
			            <th width="15%" style="padding:2px;"></th>
			          </tr>
				       	<?php if(empty($ls_scholarship)){ ?>
				       		<tr><td colspan="4" align="center"> -- there is no scholarship -- </td></tr>
				       	<?php }else{ ?>	
					        <?php $no = 1; foreach ($ls_scholarship as $result): ?>
					          <tr>				          
					            <td><?php echo @$no; ?></td>
					            <td><?php echo @$result->name; ?></td>
					            <td>Rp</td>
								<td style="text-align:right"><?php echo number_format(@$result->amount,2,",",".");?></td>
				                <td>
				                  <a href="<?php echo base_url(); ?>administration/scholarship/edit/<?php echo $result->id; ?>"><i class="fa fa-pencil"></i></a>
				                  <a href="#" class="delete-row" onclick="hapus('<?php echo $result->id ?>','<?php echo $result->name ?>')">
				                  	<i class="fa fa-trash-o"></i>
				                  </a>
				                </td>
					          </tr>
					         <?php $no++; endforeach ; ?>
				       	<?php } ?>
				    </table>
				  </div>
			  </div>
		</div>
	</div>
	<!-- end Panel Top -->

<!-- Search Result -->
	<div class="row" id="searchResult"></div>
<!-- end Search Result --> 

  <!-- Modal --> 
  <div id="initScholarship" class="modal fade initPacket" tabindex="-1" role="dialog" aria-labelledby="initPacketLabel" aria-hidden="true">
	 <div class="modal-dialog">
	    <div class="modal-content">

		  <form method="POST" id="scholarshipForm" action="<?php echo base_url(); ?>">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="initPacketLabel"><strong></strong>Scholarship Forms</h4>
	      </div>

	      <div class="modal-body">
		    <input type="hidden" id="school_year_id" name="school_year_id" class="form-control"  value="<?php echo $school_year->id ?>"/>
		    <input type="hidden" id="nis_choosen" name="nis" class="form-control" value="" />

			<div class="form-group">
			  <label class="col-sm-3 control-label">Allocations Fund<span class="asterisk">*</span></label>
			  <div class="col-sm-9">
			  	<div class="input-group">
			  		<span class="input-group-addon">Rp</span>
			  		<input type="text" class="form-control" placeholder="example: 3000000">
			  		<!--<span class="input-group-addon">.00</span>-->
                </div>
			  </div>
			</div>
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>

		  </form>

	    </div><!-- modal-content -->
	  </div><!-- modal-dialog -->  
  </div>
  <!-- end Modal -->   
  
</div><!-- contentpanel -->