<div class="pageheader">
    <h2><i class="fa fa-money"></i>Payment and Invoice</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li class="active">Student Payment &nbsp;/&nbsp; Payment</li>
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
  	<div class="col-md-4">

    <!-- search panel -->
    <div class="panel panel-default search-panel" id="searchPanel">
    <div class="panel-heading">
      	<h5 class="panel-title">Search Invoice by NIS / Student's Name</h5>
    </div>
	<div class="panel-body">
	  	<div class="row row-pad-5">
		  	<div class="form-group">				  
	          	<div class="col-lg-8">
	            	<input type="text" name="name" id="keyword" class="form-control" 
	            	placeholder="Type student's Name or NIS..." required="" value="0496">
	          	</div>
	        
	         	<div class="col-lg-4">
	        	    <a id="btnCari" class="btn btn-primary btn-block">Search</a>
	         	 </div>      		                  	

	          	<div class="table-responsive">
	            	<table class="table" id="resultSiswa">
	              		<thead>
							<tr>
    	                		<th></th>
	        	            	<th></th>
							</tr>
		             	</thead>
	              		<tbody class="table-striped">
 	              			 <tr>
 	              			 	<td colspan="2">No result found</td>
 	              			 </tr>
		              </tbody>
		           </table>
				 </div><!-- table-responsive -->		  

	    	</div>
	  	</div><!-- row -->
		</div><!-- panel-body -->
  	</div><!-- panel search container-->
  
	<!-- invoice panel -->
    <div class="panel panel-default result-panel" id="invoicePanel" style="display:none">
    	<div class="panel-heading">
			<select id="filter" class="form-control input-lg">
		    	<option value="">Show all</option>
		    	<option value="Billed Invoice">Billed Invoice</option>
		    	<option value="Invoice Accidental">Invoice Accidental</option>
			</select>	      
    	</div>
		<div class="panel-body">
		  	<div class="row row-pad-5">
	          	<div class="table-responsive">
	            	<table class="table" id="resultsInvoice">
	              		<thead>
							<tr>
    	                		<th></th>
	        	            	<th></th>
							</tr>
		             	</thead>
	              		<tbody class="table-striped">
<!-- 	                 <tr class="even accidental">
	                    <td class="items">
	                    	<h4>Seragam</h4>
							<a href="#" class="add all">
								<i class="fa fa-plus"></i>
							</a>  
							<div class="bills-info">
					          <div class="panel-group">
					            <div class="panel">
					            	<h5><span class="price" value="500000">500000</span></h5>
					            </div>
					          </div>
							</div>							          	
	                    </td>
	                    <td>Invoice Accidental</td>	                    
	                 </tr> -->
	              </tbody>
	           </table>
			 </div><!-- table-responsive -->		  
		  </div><!-- row -->
		</div><!-- panel-body -->
	    
	  </div><!-- panel result container-->
	  <!-- result panel -->
	  	  
	</div>
	
	<!-- Form Invoice--> 
	<div class="col-md-8">
	  <div class="panel panel-default">
	  
		<div class="panel-body">
			<div class="row">
                <div class="col-sm-6">
                    
                    <h5 class="subtitle mb10">From</h5>
                    <img src="<?php echo base_url()?>bracket/images/themeforest.png" class="img-responsive mb10" alt="" />
                    <address>
                        <strong>Yayasan Pendidikan Budi Utama</strong><br>
                        Kelompok Bermain<br>
                        Jl. Wijaya Kusama 121 B, Yogyakarta<br>
                        <abbr title="Phone">P:</abbr> (0274) 855-9117
                    </address>
                    
                </div><!-- col-sm-6 -->
                
                <div class="col-sm-6 text-right">
                    <h5 class="subtitle mb10">Invoice No.</h5>
                    <h4 class="text-primary">INV-000464F4-00</h4>
                    
                    <h5 class="subtitle mb10">To</h5>
                    <address>
                    	<input type="hidden" id="nisPembayar" value="" />
                        <strong><input type="text" id="namaPembayar" value="Payer name here ..."></strong><br>
                        Kelas 7 , Sekolah Menengah Pertama<br>
                        Tahun Ajaran 2014/2015<br>
                    </address>
                    
                    <p><strong>Invoice Date:</strong> <?php echo date('d-m-Y')?></p>
                    
                </div>
            </div><!-- row -->
            
            <div class="table-responsive">
            <table class="table table-invoice" id="invoiceTable">
            <thead>
              <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
          </div><!-- table-responsive -->
          
            <table class="table table-total">
                <tbody>
                    <tr>
                    	<input type="hidden" id="totalPayment" value="0" />
                        <td><strong>TOTAL :</strong></td>
                        <td class="price"></td>
                    </tr>
                </tbody>
            </table>
            
            <div class="text-right btn-invoice">
                <button class="btn btn-white"><i class="fa fa-print mr5"></i> Print Invoice</button>
                <button class="btn btn-primary mr5" id="bayarDab"><i class="fa fa-money mr5"></i> Make A Payment</button>                
            </div>
            
            <div class="mb40"></div>

		</div><!-- panel-body -->
	    
	  </div><!-- panel -->
	</div>
	
  </div>
  <!-- end Search Form -->
        
  
  
</div><!-- contentpanel -->