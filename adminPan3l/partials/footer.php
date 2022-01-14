<script src="<?php echo BASE_URL . '/assets/js/bootstrap.bundle.min.js'; ?>"></script>
<script src="<?php echo BASE_URL .'/assets/plugins/datatable/datatables.min.js'; ?>"></script>
<script src="<?php echo BASE_URL .'/assets/js/app.js'; ?>"></script>
<script>
    $(function () {
        $('#dataTable').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
  });
</script>
</body>
</html>
