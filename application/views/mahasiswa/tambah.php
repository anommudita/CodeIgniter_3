<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">

                    <!-- validation -->

                    <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                    <?php endif; ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" class="form-control" id="email" name="email" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jurusan</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jurusan">
                                <?php foreach ($jurusan as $jrs) : ?>
                                <option value="$jrs['nama_jurusan'] ?>"><?= $jrs['nama_jurusan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button class="btn btn-primary float-right" type="submit">Tambah Data</button>
                    </form>

                </div>
            </div>


        </div>
    </div>
</div>