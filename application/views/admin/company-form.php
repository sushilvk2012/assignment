<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Company</a>
      </li>
      <li class="breadcrumb-item active"><?php echo $form['title']; ?> Company</li>
    </ol>
    <form id="company-form" action="<?php echo $form['action']?>" method="post" enctype="multipart/form-data">
      
      
      <div class="box_general padding_bottom">
        <div class="header_box version_2">
          <h2><i class="fa fa-file"></i>Company Details</h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Company Name</label>
              <input type="text" class="form-control" name="company_name" value="<?php echo $list['company_name']; ?>" data-required="text" title="Company Name" placeholder="Company Name">
            </div>
          </div>
          
        </div>
        
          <button type="submit" class="btn_1 medium submitBtn" style="display: block;" frm-id="company-form">Save</button>
      </div>
  
      <!-- /.container-fluid-->
    </div>
  </form>
</div>
</div>
