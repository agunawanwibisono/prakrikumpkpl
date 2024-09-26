<nav class="navbar navbar-expand sticky-top" style="background-color: #000000;">
  <div class="container-lg">
    <img src="Assets/mafiapentol.png" alt="" style="width: 110px; height: auto;">
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="." role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #FFFFFF; border-radius: 10px; box-shadow: 3px 3px 10px grey;">
          <?php
          echo $hasil['username'];
          ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end mt-2">
            <li><a class="dropdown-item" href="#"><i class="bi bi-incognito"></i> Pofile</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                    data-bs-target="#ModalUbahPassword"><i class="bi bi-key"></i> Ubah Password</a></li>
            <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-right"></i> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- awal modal Edit -->
<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input disabled type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="username" required value="<?php echo $_SESSION['cuanki_viral'] ?>">
                      <label for="floatingInput">Username</label>
                      <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="floatingPassword"
                        name="passwordlama" required>
                      <label for="floatingInput">Password Lama</label>
                      <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="floatingPassword"
                        name="passwordbaru" required>
                      <label for="floatingInput">Password Baru</label>
                      <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="floatingPassword"
                        name="repasswordbaru" required>
                      <label for="floatingInput">Masukkan Ulang Password Baru</label>
                      <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                      </div>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="ubah_password_validate" value="12345">Save
                  changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- akhir modal Edit -->