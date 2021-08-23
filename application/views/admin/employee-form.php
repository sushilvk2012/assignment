<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Employee</a>
      </li>
      <li class="breadcrumb-item active"><?php echo $form['title']; ?> Employee</li>
    </ol>
    <form id="form-submit" action="<?php echo $form['action']?>" method="post" enctype="multipart/form-data">
      
      
      <div class="box_general padding_bottom">
        <div class="header_box version_2">
          <h2><i class="fa fa-file"></i>Employee</h2>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Select Company</label>
            
              <select class="form-control" id="company" data-selected="<?php echo $list['company_id'] ?>" name="company_id" data-required="text">
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
              <label>Select Department</label>
            
              <select class="form-control" id="department" data-selected="<?php echo $list['department_id'] ?>" name="department_id" data-required="text">
                <option value="">Select Department</option>
                <?php 
                foreach ($employee as $key => $value) {
                  
                 ?>
                 <option value="<?php echo $value['department_id']; ?>"><?php echo $value['department_name']; ?></option>
               <?php } ?>
              </select>
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="emp_name" value="<?php echo $list['emp_name']; ?>" data-required="text" title="Employee Name" placeholder="Employee Name">
            </div>
          </div>
          
        </div>

         <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Mobile</label>
              <input type="text" class="form-control" name="emp_mobile" value="<?php echo $list['emp_mobile']; ?>" data-required="mobile" title="Employee Mobile" placeholder="Employee Mobile">
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control"  placeholder="Employee Address" data-required="text" name="emp_address"><?php echo $list['emp_address']; ?></textarea>
             
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
