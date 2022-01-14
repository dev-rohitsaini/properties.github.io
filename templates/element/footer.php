<footer class="main-footer">
            <div class="float-right d-none d-sm-block">
              

            
            
            
            <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <?= $this->Html->Script('../plugins/jquery/jquery.min')  ?>
        <?= $this->Html->Script('../plugins/bootstrap/js/bootstrap.bundle.min')  ?>
        <?= $this->Html->Script('../plugins/datatables/jquery.dataTables.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-bs4/js/dataTables.bootstrap4.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-responsive/js/dataTables.responsive.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-responsive/js/responsive.bootstrap4.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-buttons/js/dataTables.buttons.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-buttons/js/buttons.bootstrap4.min')  ?>
        <?= $this->Html->Script('../plugins/jszip/jszip.min')  ?>
        <?= $this->Html->Script('../plugins/pdfmake/pdfmake.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-buttons/js/buttons.html5.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-buttons/js/buttons.print.min')  ?>
        <?= $this->Html->Script('../plugins/datatables-buttons/js/buttons.colVis.min')  ?>
        <?= $this->Html->Script('../dist/js/adminlte.min')  ?>
        <?= $this->Html->Script('../dist/js/demo')  ?>
        <?php 
  echo $this->Html->script('jquery.validate.js');
echo $this->Html->script('regit.js');
?>
 







                    <!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <!-- <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- DataTables  & Plugins -->
    <!-- <script src="../plugins/datatables/jquery.dataTables.min.js"></script> -->
    <!-- <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> -->
    <!-- <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
    <!-- <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> -->
    <!-- <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->
    <!-- <script src="../plugins/jszip/jszip.min.js"></script> -->
    <!-- <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> -->
    <!-- AdminLTE App -->
    <!-- <script src="../dist/js/adminlte.min.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../dist/js/demo.js"></script> -->
    
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
        <!-- <script href="jquery-3.6.0.min.js"></script>
    <script href="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script href="regit.js"></script> -->
 
    