  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Edit Produk</h1>
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
              <form role="form" action="<?= BASEURL; ?>/produk/updateProduk" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?= $data['produk']['id']; ?>">
                  <div class="card-body">
                      <div class="form-group">
                          <label>Nama Makanan</label>
                          <input type="text" class="form-control" placeholder="Masukkan Nama Makanan..." name="nama_makanan" value="<?= $data['produk']['nama_makanan']; ?>">
                      </div>
                      <div class="form-group">
                          <label>Keterangan</label>
                          <input type="text" class="form-control" placeholder="Masukkan Keterangan..." name="ket" value="<?= $data['produk']['ket']; ?>">
                      </div>
                      <div class="form-group">
                          <label>Harga</label>
                          <input type="text" class="form-control" placeholder="Masukkan Harga Makanan..." name="harga" value="<?= $data['produk']['harga']; ?>">
                      </div>
                      <div class="form-group">
                          <label>Gambar</label>
                          <input type="text" class="form-control" placeholder="Masukkan gambar..." name="gambar" value="<?= $data['produk']['gambar']; ?>">
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