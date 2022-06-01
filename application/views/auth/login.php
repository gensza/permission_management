<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    <?= $this->session->flashdata('message') ?>
                                    <form class="user" method="POST" action="<?php base_url('Auth/index') ?>">
                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Username...">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="form-group mb-2">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <a type="button" onclick=" new_akun()" class="small">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css"></script> -->

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>

<script>
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

            },
            error: function(response) {
                alert('ERROR! ' + response.responseText);
            }
        });
    }
</script>