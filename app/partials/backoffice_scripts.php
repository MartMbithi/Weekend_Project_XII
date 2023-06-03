<!-- Global Min Js -->
<script src="../public/backoffice/vendor/global/global.min.js"></script>
<!-- Bootstrap Select -->
<script src="../public/backoffice/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<!-- Custom Min Js -->
<script src="../public/backoffice/js/custom.min.js"></script>
<!-- Deznav Js -->
<script src="../public/backoffice/js/deznav-init.js"></script>
<!-- Sweet Alerts -->
<script src="../public/backoffice/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- Light Gallery -->
<script src="../public/backoffice/lightgallery/js/lightgallery-all.min.js"></script>
<!-- Datatable -->
<script src="../public/backoffice/vendor/datatables/js/jquery.dataTables.min.js"></script>
<!-- Back Office Scripts -->
<script src="../public/backoffice/js/plugins-init/datatables.init.js"></script>
<!-- Data Table Export -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<!-- Init Light Gallery  -->
<script>
    $('#lightgallery').lightGallery({
        thumbnail: true,
    });
</script>
<script>
    $(document).ready(function() {
        $('.report_table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
<!-- Load Alerts -->
<?php include('alerts.php'); ?>