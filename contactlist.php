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
					<th>Action</th>
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

<tr id="row_<?php echo $row['id'] ?>">
  <td><?php  echo ( isset($row['user_pic']) ) ?  '<img width="50px;" src="'.$row['user_pic'].'">' : '' ?></td>
   <td class='_name'>
     
     <?php  echo ( isset($row['name']) ) ? $row['name'] : '' ?>
   </td>
    <td class='_email'>   <?php  echo ( isset($row['email']) ) ? $row['email'] : '' ?></td>
     <td class='_phone'>  <?php  echo ( isset($row['phone']) ) ? $row['phone'] : '' ?></td>

	     <td><a data-id="<?php echo $row['id'];?>"  class="btn btn-primary editClick">Ajax Edit</a>  /   <a href="editcontact.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>  / <a href="deletecontact.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>


	</tr>

<?php
      }

    } 
        


                    ?>

                    
                  </tbody>

            </table>
			
			
			<button style="display:none;" id="EditBtnModal" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Default Modal
                </button>
				
				<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div id="updateres"></div>
            <div class="modal-body">
             <form class="form" id="updatecontactForm">
				
					<div class="form-group">
					<label>Email</label>
						<input type="text" id="Email" class="form-control">
					</div>
					<div class="form-group">
					<label>Name</label>
						<input type="text" id="Name" class="form-control">
					</div>
					
					<div class="form-group">
					<label>Phone</label>
						<input type="text" id="Phone" class="form-control">
					</div>

            
            <input type="hidden" id="hid" class="form-control">
        
			 </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="updatecontacts" type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
	  
	  
	  
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
		
	$(".editClick").click(function(){
				
		var ID=$(this).data("id");
		
			console.log(ID);
			
			 /* Get from elements values */
		
		 $.ajax({
        url: "<?php echo $base_url; ?>action/get_contactdata.php",
        type: "get",
        dataType:"json",
        data: {
			   id:ID
		  } ,
        success: function (response) {
		console.log("============= start ===============");
		console.log(response);
    let res=response.data;
    console.log("============= end  ==========");
		$("#Email").val(res.email);
    $("#Name").val(res.name);
    $("#Phone").val(res.phone);

    $("#hid").val(ID);

    
		$("#EditBtnModal").trigger("click");
           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
   
	});	
		
	});
		



  /* Update Contacts Onclick Method */

  $("#updatecontacts").click(function(){
        

          var form = $("#updatecontactForm");


    var ID=$("#hid").val();

    var Email=$("#Email").val();

    var Name=$("#Name").val();
    var Phone=$("#Phone").val();
      console.log(ID);
      
       /* Get from elements values */
    
     $.ajax({
        url: "<?php echo $base_url; ?>action/post_contactdata.php",
        type: "post",
        dataType:"json",
        data: {
         ID:ID,
         Email:Email,
         Name:Name,
         Phone:Phone
      } ,
        success: function (response) {
    console.log("============= start ===============");
    console.log(response);
  $("#updateres").html(response.msg);
  if(response.status==1){

    console.log("This is row test "+"#row_"+ID+" ._name")
  $("#row_"+ID+" ._name").text(Name);
  }
    console.log("============= end  ==========");


           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
   
  }); 
    
  });
    

    



    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
 
  });

</script>
  <?php include('includes/footer.php'); ?>