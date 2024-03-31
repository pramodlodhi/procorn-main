 <!-- /.content-wrapper -->
 <footer class="main-footer text-center ">
     <strong>Copyright &copy; <?php echo date('Y') . "-" . date('Y', strtotime('+1 year')) ?> <a href="../index.php">PropCorn</a>.</strong>
     All rights reserved.
 </footer>

 <aside class="control-sidebar control-sidebar-dark">
 </aside>
 <!-- /.control-sidebar -->
 </div>

 <!-- jQuery -->
 <script src="plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- DataTables  & Plugins -->
 <script src="plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="plugins/jszip/jszip.min.js"></script>
 <script src="plugins/pdfmake/pdfmake.min.js"></script>
 <script src="plugins/pdfmake/vfs_fonts.js"></script>
 <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <!-- AdminLTE App -->
 <script src="dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="dist/js/demo.js"></script>
 <script src="dist/js/main.js"></script>
 <!-- switch checkbox -->
 <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
 <!-- Page specific script -->
 <!-- select2 -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <!-- select2 -->
 <script>
     $(function() {
         $("#example1").DataTable({
             //  "responsive": true,
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
 <script>
     $(document).ready(function() {
         $('.js-example-basic-multiple').select2();
     })
 </script>
 <script>
     CKEDITOR.replace('editor');
 </script>
 <!-- sate and district -->
 <?php include 'models.php'; ?>