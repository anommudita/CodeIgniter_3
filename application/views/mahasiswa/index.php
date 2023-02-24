<?php //var_dump($mahasiswa); 
?>


<div class="container">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>

    <!-- Flashdata! -->
    <?php if ($this->session->flashdata('flash')) : ?>
        <!-- <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">Data Mahasiswa
                    <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div> -->

    <?php endif; ?>



    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url() ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group ">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari data mahasiswa....">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-md-6">
            <h3><?= $judul; ?></h3>
            <?php if (empty($mahasiswa)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data mahasiswa tidak ditemukan!
                </div>
            <?php endif; ?>


            <ul class="list-group">
                <?php foreach ($mahasiswa as $mhs) : ?>
                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <a href="<?= base_url(); ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right tombol-hapus">hapus</a>

                        <a href="<?= base_url(); ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success float-right">ubah</a>

                        <a href="<?= base_url(); ?>/mahasiswa/details/<?= $mhs['id']; ?>" class="badge badge-primary float-right">details</a>
                    </li>


                <?php endforeach; ?>
            </ul>
        </div>
    </div>


</div>