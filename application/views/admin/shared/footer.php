 <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Admin <?php echo date('Y'); ?></small>
        </div>
      </div>
    </footer>


  <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="admin/logout">Logout</a>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="assets/vendor/ckfinder/ckfinder.js" type="text/javascript"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sweetalert/sweetalert.min.js"></script>
    <script src="assets/js/admin.js"></script>
     <script src="assets/js/js_class.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src=" https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.jqueryui.min.js"></script>

    -->

    <script type="text/javascript">
      $(document).ready( function () {
    $('#dataTable').DataTable();
} );
    </script>

    <?php 
     $message = $this->session->flashdata('message');
    if(count($message) > 0 ){
    ?>
    <script>
     swal("<?php echo $message['title'] ?>", "<?php echo $message['msg'] ?>", "<?php echo $message['type'] ?>");
    </script>
    <?php } ?>


</body>
</html>

 