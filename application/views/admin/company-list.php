
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Company</a>
        </li>
        <li class="breadcrumb-item active">List</li>
      </ol>
    <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Company List</div>
        <div class="card-body">
          <div class="col-xs-12 text-right"> <div class="form-group">
           <a href="admin/company/add" class="btn_1 small"><i class="fa fa-plus"></i> Add Company</a>
           <!-- <a href="#0" class="btn_1 small"><i class="fa fa-trash"></i> Delete</a> -->
        </div> </div>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Company</th>
                
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
         
              <tbody>
                <?php 
                $i = 1;
                foreach ($lists as $key => $value) {
                 
                 ?>
                <tr>
                  <td><?php echo $i++; ?></td>
               
                  <td><?php echo $value['company_name']; ?></td>
          
                  <td><a href="<?php echo base_url('admin/company/edit/').$value['company_id']; ?>"><i class="fa fa-edit"></i></a></td>
                   <td><a href="<?php echo base_url('admin/company/delete/').$value['company_id']; ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php } ?>
              
              </tbody>
            </table>
          </div>
        </div>
       
      </div>
    <!-- /tables-->
    </div>
    <!-- /container-fluid-->
    </div>
