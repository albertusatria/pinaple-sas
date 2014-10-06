<div class="pageheader">
    <h2><i class="fa fa-archive"></i>Re-registration</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li>Registration Data </li>
        <li class="active">Re-registration</li>
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
  </div>
  <!-- end Search Form -->
        
  <!-- Search Result -->
  <div class="row" id="searchResult">
	 
  </div>
  <!-- end Search Result --> 
  
  <!-- Modal --> 
  <div id="initPacket" class="modal fade initPacket" tabindex="-1" role="dialog" aria-labelledby="initPacketLabel" aria-hidden="true">
	 <div class="modal-dialog">
	    <div class="modal-content">

		  <form method="POST" id="reRegis" action="<?php echo base_url(); ?>registration/re_registration/re_registration_process">

	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="initPacketLabel"><strong></strong> - Initialization Payment Packet</h4>
	      </div>

	      <div class="modal-body">
		    <input type="hidden" id="school_year_id" name="school_year_id" class="form-control"  value="<?php echo $active_school_year->id ?>"/>
		    <input type="hidden" id="nis_choosen" name="nis" class="form-control" value="" />

			<div class="form-group">
			  <label class="col-sm-3 control-label">Paket yang digunakan <span class="asterisk">*</span></label>
			  <div class="col-sm-9">
			  	<select class="form-control" id="pilihPaket" name="id_paket">
			  		<option value="">Paket Pra Yueliang dan Yueliang</option>
			  		<option value="">Paket Pra Taiyang</option>
			  	</select>
			  </div>
			</div>

			<div id="paymentItemList">
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