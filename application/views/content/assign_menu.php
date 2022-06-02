<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <div class="row">
                <h3 class="text-center">Data Module</h3>
            </div>
        </div>
        <div class="card-body">
            <button class="btn btn-success mb-2" onclick="new_module()">Add Module</button>
            <table class="table table-responsive" id="table_module">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Controller</th>
                        <th scope="col">Position</th>
                        <th scope="col">Have Child?</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true" id="modal_newModule">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="text-center modal-header">
                <h1 class="h4 text-gray-900">Create an Module!</h1>
            </div>
            <div class="modal-body mt-0">
                <div class="form-group mb-2">
                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group mb-2">
                    <input type="text" class="form-control form-control-user" id="controller" name="controller" placeholder="Controller">
                </div>
                <div class="form-group mb-2">
                    <select name="position" id="position" class="form-control" required>
                        <option value="" selected disabled>- Select Position - </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <select name="have_child" id="have_child" class="form-control" required onchange="cek_haveChild()">
                        <option value="" selected disabled>- have child? - </option>
                        <option value="Y">Y</option>
                        <option value="N">N</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <select name="parent" id="parent" class="form-control" required>
                        <option value="" selected disabled>- Select Parent - </option>
                        <?php foreach ($get_module as $p) : ?>
                            <option value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" onclick="simpan_newModule()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true" id="modal_detailModule">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="text-center modal-header">
                <h1 class="h4 text-gray-900">Detail Module Permission!</h1>
            </div>
            <div class="modal-body mt-0">
                <button class="btn btn-success mb-2" onclick="new_module_permission()">Add Module Permission</button>
                <table class="table table-responsive" id="table_detail_module">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Module Rule</th>
                            <th scope="col">Module</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true" id="modal_newModulePermission">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="text-center modal-header">
                <h1 class="h4 text-gray-900">Create Module Permission!</h1>
            </div>
            <div class="modal-body mt-0">
                <div class="form-group mb-2">
                    <select name="module_role" id="module_role" class="form-control" required>
                        <option value="" selected disabled>- Select module Role - </option>
                        <?php foreach ($get_module_role as $p) : ?>
                            <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <input type="hidden" class="form-control form-control-user" id="module" name="module" placeholder="module">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal" onclick="simpan_newModulePermission()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
    var table;
    $(document).ready(function() {
        cek_haveChild();

        //datatables
        table = $('#table_module').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Admin/get_module') ?>",
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

    function new_module() {
        $("#modal_newModule").modal('show');
    }

    function simpan_newModule() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Admin/simpan_newModule') ?>",
            dataType: "JSON",

            beforeSend: function() {},

            data: {
                name: $('#name').val(),
                controller: $('#controller').val(),
                position: $('#position').val(),
                have_child: $('#have_child').val(),
                parent: $('#parent').val(),
            },

            success: function(data) {
                console.log(data);
                alert('Data Berhasil Disimpan');
                $("#modal_newModule").modal('hide');

                var rel = setInterval(function() {
                    $('#table_module').DataTable().ajax.reload();
                    clearInterval(rel);
                }, 100);

            },
            error: function(response) {
                alert('ERROR! ' + response.responseText);
            }
        });
    }

    function cek_haveChild() {
        if ($.trim($('#have_child').val()) == 'Y') {
            $('#parent').removeAttr('disabled', '');
        } else {
            $('#parent').val('');
            $('#parent').attr('disabled', '');
        }
    }

    $(document).on('click', '#del_module', function() {

        var id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Admin/del_module') ?>",
            dataType: "JSON",

            beforeSend: function() {},

            data: {
                id: id,
            },

            success: function(data) {
                alert('Data Berhasil Dihapus');

                var rel = setInterval(function() {
                    $('#table_module').DataTable().ajax.reload();
                    clearInterval(rel);
                }, 100);

            },
            error: function(response) {
                alert('ERROR! ' + response.responseText);
            }
        });

    });

    $(document).on('click', '#detail_module', function() {

        var id = $(this).data('id');
        $('#module').val(id);
        $("#modal_detailModule").modal('show');

        $('#table_detail_module').DataTable().destroy();
        table = $('#table_detail_module').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('Admin/get_detail_module') ?>",
                "type": "POST",
                "data": {
                    id: id
                }
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

    function new_module_permission() {
        $("#modal_newModulePermission").modal('show');
    }

    function simpan_newModulePermission() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Admin/simpan_newModulePermission') ?>",
            dataType: "JSON",

            beforeSend: function() {},

            data: {
                module_role: $('#module_role').val(),
                module: $('#module').val()
            },

            success: function(data) {
                console.log(data);
                alert('Data Berhasil Disimpan');
                $("#modal_newModulePermission").modal('hide');

                var rel = setInterval(function() {
                    $('#table_detail_module').DataTable().ajax.reload();
                    clearInterval(rel);
                }, 100);

            },
            error: function(response) {
                alert('ERROR! ' + response.responseText);
            }
        });
    }

    $(document).on('click', '#del_module_perm', function() {

        var id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Admin/del_module_perm') ?>",
            dataType: "JSON",

            beforeSend: function() {},

            data: {
                id: id,
            },

            success: function(data) {
                alert('Data Berhasil Dihapus');

                var rel = setInterval(function() {
                    $('#table_detail_module').DataTable().ajax.reload();
                    clearInterval(rel);
                }, 100);

            },
            error: function(response) {
                alert('ERROR! ' + response.responseText);
            }
        });

    });
</script>