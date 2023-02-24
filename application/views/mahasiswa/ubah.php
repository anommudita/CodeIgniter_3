<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="post">

                        <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= $mahasiswa['nama']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                value="<?= $mahasiswa['nim']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= $mahasiswa['email']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jurusan</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jurusan">
                                <?php foreach ($jurusan as $jrs) : ?>
                                <?php if ($jrs['nama_jurusan'] == $mahasiswa['jurusan']) : ?>
                                <option value="<?= $jrs['nama_jurusan'] ?>" selected><?= $jrs['nama_jurusan'] ?>
                                </option>
                                <?php else : ?>
                                <option value="<?= $jrs['nama_jurusan'] ?>"><?= $jrs['nama_jurusan'] ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button class="btn btn-primary float-right" type="submit">Ubah Data</button>
                    </form>

                </div>
            </div>


        </div>
    </div>
</div>