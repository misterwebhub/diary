<?php include('includes/header.php'); 
include('config.php');
?>


  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
     
     <div class="row">

        <div class="col-md-12">
           <div class="card card-primary mb-2">
              <div class="card-header">
                <h3 class="card-title">Contact List</h3>
              </div>
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                  <thead>
                 <tr>
                    <th>Pic</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                 </tr>
                  </thead>
                  <tbody>

                    <?php 

  
    $sql = "SELECT * FROM ".tbl_users_contacts." where user_id='".$_SESSION['user_id']."' and deleted_at is null";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

?>

<tr>
  <td><?php  echo ( isset($row['user_pic']) ) ?  '<img width="50px;" src="'.$row['user_pic'].'">' : '' ?></td>
   <td>
     
     <?php  echo ( isset($row['name']) ) ? $row['name'] : '' ?>
   </td>
    <td>   <?php  echo ( isset($row['email']) ) ? $row['email'] : '' ?></td>
     <td>  <?php  echo ( isset($row['phone']) ) ? $row['phone'] : '' ?></td>

</tr>

<?php
      }

    } 
        


                    ?>

                    
                  </tbody>

            </table>
              </div>
        </div>
     </div>
        <!-- /.row -->
        <!-- Main row -->
  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Bootstrap 4 -->
<!-- DataTables  & Plugins -->
<script src="<?php echo $base_url; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $base_url; ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $base_url; ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 
  });

</script>
  <?php include('includes/footer.php'); ?>