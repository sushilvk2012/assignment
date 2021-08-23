<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Departement</a>
      </li>
      <li class="breadcrumb-item active"><?php echo $form['title']; ?> Departement</li>
    </ol>
    <form id="form-submit" action="<?php echo $form['action']?>" method="post" enctype="multipart/form-data">
      
      
      <div class="box_general padding_bottom">
        <div class="header_box version_2">
          <h2><i class="fa fa-file"></i>Departement</h2>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Select Company</label>
            
              <select class="form-control" data-selected="<?php echo $list['company_id'] ?>" name="company_id" data-required="text">
                <option value="">Select Company</option>
                <?php 
                foreach ($companies as $key => $value) {
                  
                 ?>
                 <option value="<?php echo $value['company_id']; ?>"><?php echo $value['company_name']; ?></option>
               <?php } ?>
              </select>
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Departement Name</label>
              <input type="text" class="form-control" name="department_name" value="<?php echo $list['department_name']; ?>" data-required="text" title="Departement Name" placeholder="Departement Name">
            </div>
          </div>
          
        </div>


        
          <button type="submit" class="btn_1 medium submitBtn" style="display: block;" frm-id="form-submit">Save</button>
      </div>
  
      <!-- /.container-fluid-->
    </div>
  </form>
</div>
</div>
