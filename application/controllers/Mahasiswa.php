<?php

class Mahasiswa extends CI_Controller
{

    // Membuat constructor agar tidak mengulang ulang
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->database();
    // }


    // constructor untuk memanggil database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'mahasiswa');
        $this->load->model('Jurusan_model', 'jurusan');

        //  fitur form validation untuk CI
        $this->load->library('form_validation');
    }

    // jika semua controler membutuhkan database maka aktifkan di autoload 'database'

    public function index()
    {

        // modul database untuk CI
        // method langsung ke database
        // $this->load->database();

        // load model
        // $this->load->model('Mahasiswa_model');

        // mengambil seluruh database
        $data['mahasiswa'] = $this->mahasiswa->getAllMahasiswa();
        $data['judul'] = 'Daftar Mahasiswa';

        // perkondisian untuk searching 
        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->mahasiswa->cariDataMahasiswa();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }


    // method untuk menambahkan data mahasiswa!
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mahasiswa';
        $data['jurusan'] = $this->jurusan->getAllJurusan();

        // $data['mahasiswa'] = $this->mahasiswa->addMahasiswa();

        // rules untuk form validation dengan mengambil name dari form
        // parameter pertama adalah name dari form
        // parameter kedua adalah alias dari name untuk menampikan pesan errornya
        // parameter ketiga adalah rules yang akan dijalankan
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

        // jika form tidak diisi maka akan muncul pesan error
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            // jika berhasil maka kita akan lempar ke model untuk menambahkan data
            $this->mahasiswa->tambahDataMahasiswa();


            // mengakifkan session untuk flashdata
            // parameter pertama adalah nama session
            // parameter kedua adalah isi dari session (isinya apa!)
            $this->session->set_flashdata('flash', 'Ditambahkan');

            // langsung redirect ke halaman mahasiswa atau ke controler mahasiswa (mahasiswa/index)
            redirect('mahasiswa');
        }
    }


    public function hapus($id)
    {
        $this->mahasiswa->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }

    // method details
    public function details($id)
    {

        $data['judul'] = 'Details Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa->getMahasiswaById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/details', $data);
        $this->load->view('templates/footer');
    }


    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa->getMahasiswaById($id);
        $data['jurusan'] = $this->jurusan->getAllJurusan();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        // jika form tidak diisi maka akan muncul pesan error
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            // jika berhasil maka kita akan lempar ke model untuk menambahkan data
            $this->mahasiswa->ubahDataMahasiswa();


            // mengakifkan session untuk flashdata
            // parameter pertama adalah nama session
            // parameter kedua adalah isi dari session (isinya apa!)
            $this->session->set_flashdata('flash', 'Diubah');

            // langsung redirect ke halaman mahasiswa atau ke controler mahasiswa (mahasiswa/index)
            redirect('mahasiswa');
        }
    }
}
