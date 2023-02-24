
// call sweetalert2

const flashdata = $('.flash-data').data('flashdata');
console.log(flashdata);

if(flashdata){
    Swal.fire({
        title: 'Data Mahasiswa',
        text: 'Berhasil ' + flashdata,
        icon: 'success'
    });
}


// Tombol Hapus untuk memanggil sweetalert2 dan 
$('.tombol-hapus').on('click', function(e){

    // e = event
    // mematikan funtion href yang seharusnya berjalan jika di klick
    e.preventDefault();
    
    //var href 
    const href = $(this).attr('href');

    Swal.fire({
                title: 'Apakah anda yakin?',
                text: "data mahasiswa akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
            })

});