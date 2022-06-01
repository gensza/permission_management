<!doctype html>
<html lang="en">

<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" rel="stylesheet">

      </link>

      <title>Hello, world!</title>
</head>

<body>
      <div class="container">
            <nav class="navbar navbar-expand-lg bg-light">
                  <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                              <ul class="navbar-nav">
                                    <?php foreach ($get_module_permission as $mod_perm) {

                                          foreach ($get_module as $mod) {
                                                if ($mod['id'] == $mod_perm['id_module'] and $mod_perm['id_module_role'] == $this->session->userdata('id_module_role')) { // id module role di isi sesi user login
                                    ?>
                                                      <li class="nav-item">
                                                            <a class="nav-link" href="<?= base_url($mod['controller']) ?>"><?= $mod['name'] ?></a>
                                                      </li>

                                    <?php
                                                }
                                          }
                                    } ?>
                              </ul>
                        </div>
                  </div>
            </nav>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>