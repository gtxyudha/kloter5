<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kloter 5</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

  <!-- Edit Category -->
  <link rel="stylesheet" href="css/tambahbooks.css">

  <script type='text/javascript'>
        function preview_image(event){
                    var reader = new FileReader();
                    reader.onload = function(){
                        var output = document.getElementById('uploadPreview');
                        output.src = reader.result;
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }
  </script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="image/yd.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dyan Permana Yudha</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Index
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="category.php" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="books.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Books
              </p>
            </a>
          </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Books</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
            <div class="formtambah">
                        <form method="post" action="prosestambahbooks.php" enctype="multipart/form-data">
                        <table cellpadding="8">
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="namebooks"></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><input type="text" name="stok"></td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td><img id="uploadPreview" style="width: 150px; height: 150px;" /><br>
                                    <input type="file" id="uploadImage" name="image" onchange="preview_image(event)"></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><textarea name="deskripsi" style="width:350px;  height: 150px;"></textarea></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>
                                <select name="categoryid" style="width:160px;">
                                        <?php
                                        include "koneksi.php";
                                        $query = mysqli_query($conn, "SELECT id, name FROM categories");
                                        while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$data['id'];?>"><?php echo $data['name'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </td>  
                            </tr>
                        </table>
                        <hr>
                        <input type="submit" value="Simpan" class="btnsimpan">
                        <a href="books.php"><input type="button" value="Batal" class="btnbatal"></a>
                        </form>
                    </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Kloter 5</b> 
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>


</body>
</html>
