<?php include('includes/header.php'); ?>

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
      
      <div class="col-md-6">
        <?php 

       

  
    $sql = "SELECT * FROM ".tbl_users_contacts." where id='".$_GET['id']."'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
    $row = $result->fetch_assoc();

      }


    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
        ?>
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Contact</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data" method="post" name="NewContactForm" action="<?php echo $base_url ?>action/edit_contact.php">
                <div class="card-body">
                  <div class="form-group">

                    <input type="hidden"  value="<?php echo $_GET['id']?>" name="contact_id" >
                    
                    <label for="exampleInputEmail1">Email address</label>
                    <input required type="email" value="<?php echo $row['email']?>" class="form-control" name="Email" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input required type="text" class="form-control" value="<?php echo $row['name']?>"  name="Name" id="Name" placeholder="Enter Name">
                  </div>

                    <div class="form-group">
                    <label for="exampleInputPassword1">Phone Number</label>
                    <input required type="number" value="<?php echo $row['phone']?>"  class="form-control" name="PhoneNUmber" id="number" placeholder="Enter Phone Number">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputFile">User Pic</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="UserProfile" id="UserProfile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
              
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->
            
            

            
            
            
            
            
            <!-- /.card -->

          </div>

    </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include('includes/footer.php'); ?>