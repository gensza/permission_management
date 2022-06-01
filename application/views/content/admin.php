<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <h3 class="text-center">Data Users</h3>
            </div>
        </div>
        <div class="card-body">
            <button class="btn btn-success mb-2" onclick="new_akun()">Add Users</button>
            <table class="table table-responsive" id="table_users">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Level</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true" id="modal_newAkun">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="text-center modal-header">
                <h1 class="h4 text-gray-900">Create an Account!</h1>
            </div>
            <div class="modal-body mt-0">
                <div class="form-group mb-2">
                    <input type="text" class="form-control form-control-user" id="name_reg" name="name_reg" placeholder="Name">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control form-control-user" id="username_reg" name="username_reg" placeholder="Username">
                </div>
                <div class="form-group mb-2">
                    <input type="password" class="form-control form-control-user" id="password_reg" name="password_reg" placeholder="Password">
                </div>
                <div class="form-group mb-2">
                    <select name="level" id="level" class="form-control" required>
                        <option value="" selected disabled>- Select Level - </option>
                        <?php foreach ($get_module_role as $p) : ?>
                            <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" onclick="simpan_newAkun()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table_users').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Admin/get_data_users') ?>",
                "type": "POST"
            },

            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
            "language": {
                "infoFiltered": ""
            },
        });
    });

    function new_akun() {
        $("#modal_newAkun").modal('show');
    }

    function simpan_newAkun() {
        console.log($('#password_reg').val());
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Auth/registration') ?>",
            dataType: "JSON",

            beforeSend: function() {},

            data: {
                name: $('#name_reg').val(),
                username: $('#username_reg').val(),
                password: $('#password_reg').val(),
                level: $('#level').val(),
            },

            success: function(data) {
                console.log(data);
                alert('Data Berhasil Disimpan');
                $("#modal_newAkun").modal('hide');

                var rel = setInterval(function() {
                    $('#table_users').DataTable().ajax.reload();
                    clearInterval(rel);
                }, 100);

            },
            error: function(response) {
                alert('ERROR! ' + response.responseText);
            }
        });
    }

    $(document).on('click', '#del_users', function() {

        var id = $(this).data('id');

        console.log(id);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Admin/del_users') ?>",
            dataType: "JSON",

            beforeSend: function() {},

            data: {
                id: id,
            },

            success: function(data) {
                console.log(data);
                alert('Data Berhasil Dihapus');

                var rel = setInterval(function() {
                    $('#table_users').DataTable().ajax.reload();
                    clearInterval(rel);
                }, 100);

            },
            error: function(response) {
                alert('ERROR! ' + response.responseText);
            }
        });

    });
</script>