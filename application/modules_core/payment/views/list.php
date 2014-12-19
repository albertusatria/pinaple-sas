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
  	<div class="col-md-4 search-wrapper">

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
                    <a href="" id="no-nis-transaction-mode">Tanpa NIS</a>
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
	<div class="col-md-8 invoice-wrapper">
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
                    
                    <h5 class="subtitle mb10 addressed-to">To</h5>
                    <address>
                    	<input type="hidden" id="nisPembayar" value="" />
                        <strong><input type="text" id="namaPembayar" placeholder="Payer name here ..." readonly></strong><br>
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
                <th>Fine</th>
                <th class="right">Subtotal</th>
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
                <button class="btn btn-primary mr5" data-toggle="modal" data-target="#confirmationPayment" id="makePayment"><i class="fa fa-money mr5"></i> Make A Payment</button>                
            </div>
            
            <div class="mb40"></div>

		</div><!-- panel-body -->
	    
	  </div><!-- panel -->
	</div>
	
  </div>
  <!-- end Search Form -->
        
  
  
</div><!-- contentpanel -->

<!-- Modal -->
<div class="modal fade" id="confirmationPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi Pembelian</h4>
      </div>
      <div class="modal-body">
        <div class="table-item">
        </div>
        <hr/>
        <div class="metode-pembayaran">
			<div class="col-sm-12">
				<div class="rdio rdio-primary">
				  <input type="radio" id="cash" value="cash" name="payment_method" required="">
				  <label for="cash">Cash</label>
				</div><!-- rdio -->
				
				<div class="rdio rdio-primary">
				  <input type="radio" value="cc/debet" id="cards" name="payment_method">
				  <label for="cards">Credit Card / Debet</label>
				</div><!-- rdio -->
				<label class="error" for="payment_method"></label>
			</div> 
			<div class="col-sm-7">
            <select id="cardsOption" class="form-control input-sm" >
				<option value="">Choose one from available CC or Debet cards</option>
				<option value="BCA">BCA</option>
				<option value="BNI">BNI</option>
				<option value="BRI">BRI</option>
				<option value="HSBC">HSBC</option>
            </select>
            <label class="error" for="fruits"></label>
          </div>       	
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="doPayment">Bayar dan Cetak</button>
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->