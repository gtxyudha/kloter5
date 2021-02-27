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
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
            <h1>Books</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            <form method="get">
                <label>Pilih Category</label>
                                 <select name="carikategori" style="width:160px;">
                                        <?php
                                            if(isset($_GET['carikategori'])){  
                                              include "koneksi.php";
                                              $cari = $_GET['carikategori'];
                                              $query = mysqli_query($conn, "SELECT id, name FROM categories where id='$cari'");
                                              while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                                <option value="<?=$data['id'];?>"><?php echo $data['name'];?></option>
                                        <?php
                                              }
                                            } else {
                                                include "koneksi.php";
                                                $query = mysqli_query($conn, "SELECT id, name FROM categories");
                                                while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                                  <option value="<?=$data['id'];?>"><?php echo $data['name'];?></option>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </select>
                <input type="submit" value="FILTER">
            </form>
                <div class="card">
                    <div class="card-header">
                        <a href="tambahbooks.php"><input type="button" value="Tambah Books" class="btn btn-warning"></a>
                    </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Stok</th>
                                        <th>Image</th>
                                        <th>Deskripsi</th>
                                        <th colspan="4" class="text-center">Action</th>
                                    </tr>
                                    <tbody>
                                        <?php
                                            include "koneksi.php";
                                            if(isset($_GET['carikategori'])){      
                                            $cari = $_GET['carikategori'];
                                                $sql = mysqli_query($conn,"select * from books where category_id='$cari'");
                                            }else{
                                                $sql = mysqli_query($conn,"select * from books");
                                            } 
                                            while($data = mysqli_fetch_array($sql)){
                                                echo "<tr>";
                                                echo "<td>".$data['id']."</td>";
                                                echo "<td>".$data['name']."</td>";
                                                echo "<td>".$data['stok']."</td>";
                                                echo "<td align='center'><img src='image/".$data['image']."' width='100px' height='100px'/></td>";
                                                echo "<td>".$data['deskripsi']."</td>";
                                                if ($data['stok'] == 0) {
                                                    echo "<td align='center'><a href='editbooks.php?id=".$data['id']."' class='fa fa-edit'>Ubah</a></td>";
                                                    echo "<td align='center'><a href='proseshapusbooks.php?id=".$data['id']."' class='fa fa-trash'>Hapus</a></td>";
                                                } else {
                                                    echo "<td align='center'><a href='editbooks.php?id=".$data['id']."' class='fa fa-edit'>Ubah</a></td>";
                                                    echo "<td align='center'><a href='proseshapusbooks.php?id=".$data['id']."' class='fa fa-trash'>Hapus</a></td>";
                                                    echo "<td align='center'><a href='editbooks.php?id=".$data['id']."' class='fa fa-edit'>Pinjam</a></td>";
                                                    echo "<td align='center'><a href='proseshapusbooks.php?id=".$data['id']."' class='fa fa-trash'>Kembali</a></td>";
                                                }

                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </thead>

                            </table>
                        </div>
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

<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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

</body>
</html>
