  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Tambah Produk</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= BASEURL; ?>/produk/simpanProduk" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                      <div class="form-group">
                          <label>Nama Makanan</label>
                          <input type="text" class="form-control" placeholder="Masukkan nama makanan..." name="nama_makanan">
                      </div>
                      <div class="form-group">
                          <label>Keterangan</label>
                          <input type="text" class="form-control" placeholder="Masukkan keterangan produk..." name="ket">
                      </div>
                      <div class="form-group">
                          <label>Harga</label>
                          <input type="text" class="form-control" placeholder="Masukkan harga produk..." name="harga">
                      </div>
                      <div class="form-group">
                          <label>Gambar</label>
                          <input type="text" class="form-control" placeholder="Masukkan gambar produk..." name="gambar">
                      </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
          </div>


      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->