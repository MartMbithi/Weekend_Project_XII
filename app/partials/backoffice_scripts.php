<!-- jQuery  -->
<script src="../public/backoffice/js/jquery.min.js"></script>
<script src="../public/backoffice/js/bootstrap.bundle.min.js"></script>
<script src="../public/backoffice/js/waves.js"></script>
<script src="../public/backoffice/js/jquery.nicescroll.js"></script>
<script src="../public/backoffice/plugins/switchery/switchery.min.js"></script>

<!--Morris Chart-->
<script src="../public/backoffice/plugins/morris/morris.min.js"></script>
<script src="../public/backoffice/plugins/raphael/raphael.min.js"></script>

<!-- Counter Up  -->
<script src="../public/backoffice/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src=".../public/backoffice/plugins/counterup/jquery.counterup.js"></script>

<!-- Page specific js -->
<script src="../public/backoffice/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="../public/backoffice/js/jquery.core.js"></script>
<script src="../public/backoffice/js/jquery.app.js"></script>

<!-- Sweet Alerts -->
<script src="../public/landing/js/sweetalert2/sweetalert2.min.js"></script>

<!-- Required datatable js -->
<script src="../public/backoffice/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/backoffice/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="../public/backoffice/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../public/backoffice/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="../public/backoffice/plugins/datatables/jszip.min.js"></script>
<script src="../public/backoffice/plugins/datatables/pdfmake.min.js"></script>
<script src="../public/backoffice/plugins/datatables/vfs_fonts.js"></script>
<script src="../public/backoffice/plugins/datatables/buttons.html5.min.js"></script>
<script src="../public/backoffice/plugins/datatables/buttons.print.min.js"></script>

<!-- Alerts -->
<?php include('alerts.php'); ?> <script>
    $(document).ready(function() {

        // Default Datatable
        $('.table_dt').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['excel', 'pdf']
        });


        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
</script>