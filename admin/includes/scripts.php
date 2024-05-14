    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- JS FOR DATATABLE-->

    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="hhttps://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>





<!-- ADMIN SCRIPT CODE -->
<!-- EDIT SCRIPT -->
<script>

    $(document).ready(function (){

      $('.editbtn').on('click', function(){

        $('#editadminprofile').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#update_id').val(data[0]);
          $('#username').val(data[1]);
          $('#email').val(data[2]);
          $('#password').val(data[3]);

      });


    });
</script>

<!-- DELETE SCRIPT -->
<script>

    $(document).ready(function () {

      $('.deletebtn').on('click', function(){

        $('#deletemodal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#deleteuser_id').val(data[0]);

      });
    });

</script>


<!-- EMPLOYEE SCRIPT CODE -->

<!-- EDIT SCRIPT -->
<script>

    $(document).ready(function (){

      $('.edit_emp').on('click', function(){

        $('#editemployee').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#emp_id').val(data[0]);
          $('#fname').val(data[1]);
          $('#mname').val(data[2]);
          $('#lname').val(data[3]);
          $('#department').val(data[4]);
          $('#qr_code').val(data[5]);
          $('#password').val(data[6]);
          $('#update_usertype').val(data[7]);
      });


    });
</script>

<!-- DELETE SCRIPT -->
<script>

    $(document).ready(function () {

      $('.delete_emp').on('click', function(){

        $('#deleteemp_modal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#deleteemp_id').val(data[0]);

      });
    });

</script>


<!-- EDIT SCRIPT FOR AM ATTENDANCE -->
<script>

    $(document).ready(function (){

      $('.edit_am').on('click', function(){

        $('#edit_att').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);
          $('#edit_id').val(data[0]);
          $('#emp_id').val(data[1]);
          $('#date').val(data[2]);
          $('#log_in').val(data[3]);
          $('#b_out').val(data[4]);
          $('#b_in').val(data[5]);
          $('#log_out').val(data[6]);
      });


    });
</script>

<!-- DELETE SCRIPT FOR TIME IN -->
<script>

    $(document).ready(function () {

      $('.delete_am').on('click', function(){

        $('#delete_AM_att').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#delete_id_att').val(data[0]);

      });
    });

</script>


<!-- EDIT SCRIPT FOR PM ATTENDANCE -->
<script>

    $(document).ready(function (){

      $('.edit_pm').on('click', function(){

        $('#edit_pm_att').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);
          $('#edit_id').val(data[0]);
          $('#emp_id').val(data[1]);
          $('#date').val(data[2]);
          $('#break_in').val(data[3]);
          $('#time_out').val(data[4]);
      });


    });
</script>

<!-- DELETE SCRIPT FOR PM ATTENDANCE -->
<script>

    $(document).ready(function () {

      $('.delete_pm').on('click', function(){

        $('#delete_PM_att').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function(){
            return $(this).text();
          }).get();

          console.log(data);

          $('#delete_id_att').val(data[0]);

      });
    });

</script>



<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>

