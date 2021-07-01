
<script src="{{ url('apps/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
<script src="{{ url('apps/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Chartist JS -->
<script src="{{ url('apps/assets/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ url('apps/assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ url('apps/assets/js/material-dashboard.min.js?v=2.1.0') }}" type="text/javascript"></script>
<!-- Include SmartWizard JavaScript source -->
<script type="text/javascript" src="{{ url('apps/assets/js/jquery.smartWizard.js') }}"></script>
<script type="text/javascript" src="{{ url('apps/assets/js/datatables.min.js') }}"></script>
<!--  js country -->
<script src="{{ url('apps/assets/js/countrySelect.min.js') }}"></script>
<script>
  $(document).ready(function() {
    // activeating tooltips
    $('[data-toggle="tooltip"]').tooltip();
    $("a").tooltip();
    $("button").tooltip();
    // country Flag
    $("#country").countrySelect({

    });
    // modal
    $('#send_request_modal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    })
    // wizard

        $('#smartwizard').smartWizard({
          theme: 'dots'
        });

        // Datatable
        // $('#v_schedule').DataTable();
        // Datatable_vessel
        oTable = $('#v_realization').DataTable({
             "searching": true,
             "paging": true,
             "info": true,
             "lengthChange":false
        });

        $('#search_vessel').on('keyup change', function(){
          oTable.search($(this).val()).draw();
        })

  });
</script>
</body>

</html>
