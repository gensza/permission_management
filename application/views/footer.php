<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>

<script>
    // $(document).ready(function() {
    //       $("p").click(function() {
    //             $(this).hide();
    //       });
    // });

    // $(document).ready(function() {
    //       $(document).on('click', '#hapus_produk', function() {

    //             var id_produk = $(this).data('id_produk');

    //             console.log(id_produk);
    //             $.ajax({
    //                   type: "POST",
    //                   url: "<?php echo base_url('Admin/del_dataproduk') ?>",
    //                   dataType: "JSON",

    //                   beforeSend: function() {},

    //                   data: {
    //                         id_produk: id_produk,
    //                   },

    //                   success: function(data) {
    //                         console.log(data);
    //                         alert('Data Berhasil Dihapus');

    //                         var rel = setInterval(function() {
    //                               $('#dataproduk').DataTable().ajax.reload();
    //                               clearInterval(rel);
    //                         }, 100);

    //                   },
    //                   error: function(response) {
    //                         alert('ERROR! ' + response.responseText);
    //                   }
    //             });

    //       });
    // });

    // $(document).ready(function() {
    //       $(document).on('click', '#edit_produk', function() {
    //             $("#modal_editdata").modal('show');

    //             var id_produk = $(this).data('id_produk');
    //             var kode_barang = $(this).data('kode_barang');
    //             var nama_barang = $(this).data('nama_barang');
    //             var kode_ukuran = $(this).data('kode_ukuran');
    //             var kode_warna = $(this).data('kode_warna');
    //             var harga = $(this).data('harga');
    //             var harga_dasar = $(this).data('harga_dasar');

    //             console.log(kode_barang + 'ni');

    //             $('#kode_barang_e').val(kode_barang);
    //             $('#nama_barang_e').val(nama_barang);
    //             $('#kode_ukuran_e').val(kode_ukuran);
    //             $('#kode_warna_e').val(kode_warna);
    //             $('#harga_e ').val(harga);
    //             $('#harga_dasar_e').val(harga_dasar);

    //             console.log(id_produk);

    //       });
    // });

    // function update_produk() {
    //       $.ajax({
    //             type: "POST",
    //             url: "<?php echo base_url('Admin/update_dataproduk') ?>",
    //             dataType: "JSON",

    //             beforeSend: function() {},

    //             data: {
    //                   kode_barang: $('#kode_barang_e').val(),
    //                   nama_barang: $('#nama_barang_e').val(),
    //                   kode_ukuran: $('#kode_ukuran_e').val(),
    //                   kode_warna: $('#kode_warna_e').val(),
    //                   harga: $('#harga_e').val(),
    //                   harga_dasar: $('#harga_dasar_e').val(),
    //             },

    //             success: function(data) {
    //                   console.log(data);
    //                   alert('Data Berhasil Diupdate');
    //                   $("#modal_editdata").modal('hide');
    //                   // $('#dataproduk').DataTable().destroy();

    //                   var rel = setInterval(function() {
    //                         $('#dataproduk').DataTable().ajax.reload();
    //                         clearInterval(rel);
    //                   }, 100);

    //             },
    //             error: function(response) {
    //                   alert('ERROR! ' + response.responseText);
    //             }
    //       });
    // }

    // function add_data() {
    //       $("#modal_adddata").modal('show');
    // }


    // function simpan_produk() {
    //       $.ajax({
    //             type: "POST",
    //             url: "<?php echo base_url('Admin/save_dataproduk') ?>",
    //             dataType: "JSON",

    //             beforeSend: function() {},

    //             data: {
    //                   kode_barang: $('#kode_barang').val(),
    //                   nama_barang: $('#nama_barang').val(),
    //                   kode_ukuran: $('#kode_ukuran').val(),
    //                   kode_warna: $('#kode_warna').val(),
    //                   harga: $('#harga').val(),
    //                   harga_dasar: $('#harga_dasar').val(),
    //             },

    //             success: function(data) {
    //                   console.log(data);
    //                   alert('Data Berhasil Disimpan');
    //                   $("#modal_adddata").modal('hide');
    //                   // $('#dataproduk').DataTable().destroy();

    //                   var rel = setInterval(function() {
    //                         $('#dataproduk').DataTable().ajax.reload();
    //                         clearInterval(rel);
    //                   }, 100);

    //             },
    //             error: function(response) {
    //                   alert('ERROR! ' + response.responseText);
    //             }
    //       });
    // }
</script>