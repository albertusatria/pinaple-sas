<div class="pageheader">
    <h2><i class="fa fa-archive"></i>Re-registration</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li class="active">Registration Data &nbsp;/&nbsp; Re-registration</li>
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
	      <h4 class="panel-title">Search Students</h4>
	      <p>This is form to search students who wants to <strong> re-register </strong> their ID</p>
	    </div>
	    
		<form method="POST" id="reRegis" action="<?php echo base_url(); ?>">
			<div class="panel-body">
			  <div class="row row-pad-5">
				  <div class="form-group">
					  
			          <div class="col-lg-8">
			            <input type="text" name="name" class="form-control" placeholder="Type student's Name or NIS..." required="">
			          </div>
			          
			          <div class="col-lg-4">
			            <button class="btn btn-primary btn-block">Search</button>
			          </div>      
			                  	
			    </div>
			  </div><!-- row -->
			</div><!-- panel-body -->
		</form>
	    
	  </div><!-- panel -->
	</div>
  </div>
  <!-- end Search Form -->
        
  <!-- Search Result -->
  <div class="row">
  
	<div class="col-md-6 students-id" data-toggle="modal" data-target="#initPacket">
		<div class="people-item">
		  <div class="media">
		    <div class="media-body">
		      <h5 class="student-id text-info">23090479</h5>
		      <h4 class="student-name text-primary">Simon Megadewandanu</h4>
		      <div class="text-muted"><i class="fa fa-puzzle-piece"></i> SMP, 3th Grade</div>
		      <div class="text-muted"><i class="fa fa-map-marker"></i> Jalan Dr. Wahidin 5 - 25 Yogyakarta</div>
		    </div>
		  </div>
		</div>
	</div> 

	<div class="col-md-6 students-id" data-toggle="modal" data-target="#initPacket">
		<div class="people-item">
		  <div class="media">
		    <div class="media-body">
		      <h5 class="student-id text-info">23090470</h5>
		      <h4 class="student-name text-primary">Awan Megadewandanu</h4>
		      <div class="text-muted"><i class="fa fa-puzzle-piece"></i> SMP, 2nd Grade</div>
		      <div class="text-muted"><i class="fa fa-map-marker"></i> Jalan Dr. Wahidin 5 - 25 Yogyakarta</div>
		    </div>
		  </div>
		</div>
	</div> 
	 
  </div>
  <!-- end Search Result --> 
  
  <!-- Modal --> 
  <form method="POST" id="reRegis" action="<?php echo base_url(); ?>">
  <div id="initPacket" class="modal fade initPacket" tabindex="-1" role="dialog" aria-labelledby="initPacketLabel" aria-hidden="true">
	 <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="initPacketLabel"><strong></strong> - Initialization Payment Packet</h4>
	      </div>
	      <div class="modal-body">
			<div class="form-group">
			  <label class="col-sm-3 control-label">DPP <span class="asterisk">*</span></label>
			  <div class="col-sm-9">
			    <input type="text" name="dpp" class="form-control dpp price" placeholder="DPP Cost..." value="2300000" required />
			  </div>
			</div>
			
			<div class="form-group">
			  <label class="col-sm-3 control-label">SPP <span class="asterisk">*</span></label>
			  <div class="col-sm-9">
			    <input type="text" name="SPP" class="form-control spp price" placeholder="SPP Cost per month..." value="130000" required />
			  </div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary">Save</button>
	      </div>
	    </div><!-- modal-content -->
	  </div><!-- modal-dialog -->  
  </div>
  </form>
  <!-- end Modal --> 
  
</div><!-- contentpanel -->