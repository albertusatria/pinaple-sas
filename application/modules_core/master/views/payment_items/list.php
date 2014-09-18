<div class="pageheader">
    <h2><i class="fa fa-money"></i>Payment Items</h2>
    <div class="breadcrumb-wrapper">
      <span class="label">You are here:</span>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
        <li class="active">Payment Configuration&nbsp;&nbsp;/&nbsp;&nbsp;Payment Items</li>
      </ol>
    </div>
</div>
<div class="contentpanel">
	<div class="row">

		<div class="col-md-12">
		  <div class="panel panel-default">
		  
		    <div class="panel-heading">
		      <div class="panel-btns">
		        <a href="#" class="minimize">−</a>
		      </div>
		      <h4 class="panel-title">Manage Payment Items</h4>
		      <p>This is form to search Payment Items based on <strong> academic year </strong> and <strong>units</strong></p>
		    </div>
		    
		    <form>
		    <div class="panel-body">
		      <div class="row row-pad-5">
		        <div class="col-lg-5">
		          <select class="form-control chosen-select" data-placeholder="Choose Academic Year..." required>
					  <option value=""></option>
		              <option value="2013/2014">2013/2014</option>                  
		          </select>
		        </div>
		        <div class="col-lg-5">
		          <select class="form-control chosen-select" data-placeholder="Choose Units..." required>
					  <option value=""></option>
		              <option value="United States">KB</option>                  
		          </select>
		        </div>
		        <div class="col-lg-2">
					<button class="btn btn-primary btn-block">Search</button>
		        </div>
		      </div><!-- row -->
		    </div><!-- panel-body -->
		    </form>
		    
		  </div><!-- panel -->
          
			<!-- Table Results -->
			<div class="panel panel-default">
				<div class="panel-body">			
					<div class="row row-pad-5">        
				      <div class="table-responsive">
				      <table class="table table-hidaction table-hover mb30">
				        <thead>
				          <tr>
				            <th>#</th>
				            <th>Items Name</th>
				            <th>Cost</th>
				            <th></th>
				          </tr>
				        </thead>
				        <tbody>
				          <tr>
				            <td>1</td>
				            <td>DPP</td>
				            <td class="price">300000</td>
			                <td class="table-action-hide">
			                  <a href="#"><i class="fa fa-pencil"></i></a>
			                  <a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
			                </td>
				          </tr>
				          <tr>
				            <td>2</td>
				            <td>SPP</td>
				            <td class="price">500000</td>
			                <td class="table-action-hide">
			                  <a href="#"><i class="fa fa-pencil"></i></a>
			                  <a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
			                </td>
				          </tr>
				          <tr>
				            <td>3</td>
				            <td>Uniform</td>
				            <td class="price">30000</td>
			                <td class="table-action-hide">
			                  <a href="#"><i class="fa fa-pencil"></i></a>
			                  <a href="#" class="delete-row"><i class="fa fa-trash-o"></i></a>
			                </td>
				          </tr>
				        </tbody>
				      </table>
				      </div><!-- table-responsive -->
					</div>		
				</div><!-- panel-body -->
			</div><!-- 2nd panel -->
          
        </div>	<!-- col-12 -->			
        
	</div>
</div>
