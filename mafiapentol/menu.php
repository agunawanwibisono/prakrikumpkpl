<?php
include "proses/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM tb_daftar_menu
  LEFT JOIN tb_kategori_menu ON tb_kategori_menu.id = tb_daftar_menu.kategori");
while ($record = mysqli_fetch_array($query)) {
  $result[] = $record;
}
?>


<div class="col-lg-9 mt-2">
  <div>
    <div class="card-body">
      <div class="row">
        <div class="col d-flex justify-content-end">
            <button class="btn link-light" data-bs-toggle="modal" data-bs-target="#ModalTambahUser" style="background-color: green; cursor: pointer;" onmouseover="this.style.backgroundColor='#15610B'" onmouseout="this.style.backgroundColor='green'">Tambah Menu</button>
        </div>



        <!-- Modal Tambah Menu baru -->
        <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-xl modal-fullscreen-md-down">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="input-group mb-3">
                        <input type="file" class="form-control py-3" id="uploadfoto" placeholder="Nama Kamu" name="foto"
                          required>
                        <label class="input-group-text" for="uploadfoto">Upload Foto Menu</label>
                        <div class="invalid-feedback">
                          Masukkan file foto menu
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu"
                          name="nama_menu" required>
                        <label for="floatingInput">Nama Menu</label>
                        <div class="invalid-feedback">
                          Masukkan Nama Menu
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan"
                          name="password" required>
                        <label for="floatingPassword">Keterangan</label>
                        <div class="invalid-feedback">
                        Tidak Boleh Kosong!
                        </div>
                      </div>
                  </div>

                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-floating mb-3">
                        <select class=" form-select mb-3" aria-label="Default select example" name="level" required>
                          <option selected hidden value="">Pilih Level</option>
                          <option value="0">Customer</option>
                          <option value="1">Kasir</option>
                          <option value="2">Dapur</option>
                          <option value="3">Owner/Admin</option>
                        </select>
                        <label for="floatingInput">Level User</label>
                        <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-8">
                      <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="08xxx" name="nohp" required>
                        <label for="floatingInput">No. HP</label>
                        <div class="invalid-feedback">
                      Tidak Boleh Kosong!
                    </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-floating">
                    <input class="form-control" id="" style="height: 150px;" name="alamat" required></input>
                    <label for="floatingInput">Alamat</label>
                    <div class="invalid-feedback">
                      Tidak Boleh Kosong!
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save
                  changes</button>
              </div>
              </form>
            </div>

          </div>
        </div>


      <!-- akhir Modal Tambah User baru -->
      <?php
    foreach ($result as $row) {
      ?>
      <!-- awal modal view -->
      <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Data User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input disabled type="text" class="form-control" id="floatingInput" placeholder="Nama Kamu"
                        name="nama" value="<?php echo $row['nama'] ?>">
                      <label for="floatingInput">Nama</label>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input disabled type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="username" value="<?php echo $row['username'] ?>">
                      <label for="floatingInput">Username</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                    <select disabled class="form-select" aria-label="Default select example" required name="levl" id="">
                      <?php
                      $data = array("Customer", "Kasir", "Dapur", "Owner/Admin");
                      foreach($data as $key => $value){
                        if($row['level']==$key){
                        echo "<option selcted value='$key'>$value</option>";
                      }else{
                        echo "<option value='$key'>$value</option>";
                      }
                    }
                      ?>
                      </select>
                      <label for="floatingInput">Level</label>
                    </div>
                  </div>

                  <div class="col-lg-8">
                    <div class="form-floating mb-3">
                      <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxx"
                        name="nohp" value="<?php echo $row['nohp'] ?>">
                      <label for="floatingInput">No. HP</label>
                    </div>
                  </div>
                </div>
                <div class="form-floating">
                  <input disabled class="form-control" id="" style="height: 150px;" name="alamat"
                    value="<?php echo $row['alamat'] ?>"></input>
                  <label for="floatingInput">Alamat</label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    
    <!-- akhir modal view -->

<!-- awal modal Edit -->
<div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_edit_user.php" method="POST">
              <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="Nama Kamu"
                        name="nama" required value="<?php echo $row['nama'] ?>">
                      <label for="floatingInput">Nama</label>
                      <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating mb-3">
                      <input <?php echo($row['username'] == $_SESSION['cuanki_viral']) ? 'disabled': '' ;  ?> type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                        name="username" required value="<?php echo $row['username'] ?>">
                      <label for="floatingInput">Username</label>
                      <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-floating mb-3">
                      <select class="form-select" aria-label="Default select example" required name="level" id="">
                      <?php
                      $data = array("Customer", "Kasir", "Dapur", "Owner/Admin");
                      foreach($data as $key => $value){
                        if($row['level']==$key){
                        echo "<option selcted value='$key'>$value</option>";
                      }else{
                        echo "<option value='$key'>$value</option>";
                      }
                    }
                      ?>
                      </select>
                      <label for="floatingInput">Level</label>
                      <div class="invalid-feedback">
                          Pilih Level User
                        </div>
                    </div>
                  </div>

                  <div class="col-lg-8">
                    <div class="form-floating mb-3">
                      <input type="number" class="form-control" id="floatingInput" placeholder="08xxx"
                        name="nohp" required value="<?php echo $row['nohp'] ?>">
                      <label for="floatingInput">No. HP</label>
                      <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                        </div>
                    </div>
                  </div>
                </div>
                <div class="form-floating">
                  <input class="form-control" id="" style="height: 150px;" name="alamat"required
                    value="<?php echo $row['alamat'] ?>"></input>
                    <div class="invalid-feedback">
                          Tidak Boleh Kosong!
                        </div>
                  <label for="floatingInput">Alamat</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="input_user_validate" value="12345">Save
                  changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    

    <!-- akhir modal Edit -->

    <!-- awal modal Hapus -->
<div class="modal fade" id="ModalHapus<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_delete_user.php" method="POST">
              <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                <div class="col-lg-12">
                  <?php
                  if($row['username'] == $_SESSION['cuanki_viral']){
                    echo "<div class='alert alert-danger'>Anda Tidak Dapat Menghapus Anda Sendiri</div>";
                  }else {
                    echo "Apakah Yakin Untuk Menghapus?<b>$row[username]</b>";
                  }
                  ?>
                 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345" <?php echo($row['username'] == $_SESSION['cuanki_viral']) ? 'disabled': '' ; ?>>Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    

    <!-- akhir modal Hapus -->

        <!-- awal reset password -->
<div class="modal fade" id="Modalresetpassword<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-fullscreen-md-down">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation" novalidate action="proses/proses_reset_password.php" method="POST">
              <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                <div class="col-lg-12">
                  <?php
                  if($row['username'] == $_SESSION['cuanki_viral']){
                    echo "<div class='alert alert-danger'>Anda Tidak Dapat Mereset Password Anda Sendiri</div>";
                  }else {
                    echo "Apakah Yakin Untuk Mereset password user <b>$row[username]</b> menjadi password bawaansistem yaitu <b>password</b>";
                  }
                  ?>
                 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345" <?php echo($row['username'] == $_SESSION['cuanki_viral']) ? 'disabled': '' ; ?>>Reset Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    

    <!-- akhir modal reset password-->

      <?php
    }
    if (empty ($result)) {
      echo "Data User Tidak Ada";
    } else {
      ?>
      <div class="table-responsive">
        <table class="table table table-hover">
          <thead>
            <tr class="text-nowrap">
              <th scope="col">No.</th>
              <th scope="col">Foto</th>
              <th scope="col">Nama Menu</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Jenis Menu</th>
              <th scope="col">Kategori</th>
              <th scope="col">Harga</th>
              <th scope="col">stok</th>
              <th scope="col">aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($result as $row) {

              ?>

              <tr>
                <th scope="row">
                  <?php echo $no++ ?>
                </th>
                <td>
                  <div style="width: 80px">
                <img src="Assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                  </div>
                </td>
                <td>
                  <?php echo $row['nama_menu'] ?>
                </td>
                <td>
                  <?php echo $row['keterangan'] ?>
                </td>
                <td>
                  <?php echo ($row['jenis_menu']== 1)? "Makanan" : "Minuman" ?>
                </td>
                <td>
                  <?php echo $row['kategori_menu'] ?>
                </td>
                <td>
                  <?php echo $row['harga'] ?>
                </td>
                <td>
                  <?php echo $row['stok'] ?>
                </td>
                <td>
                  <div class="d-flex ">
                    <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal"
                      data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye"></i></button>
                    <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal"
                      data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-danger btn-sm me-2" data-bs-toggle="modal"
                      data-bs-target="#ModalHapus<?php echo $row['id'] ?>"><i class="bi bi-trash"></i></button>
                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                      data-bs-target="#Modalresetpassword<?php echo $row['id'] ?>"><i class="bi bi-key"></i></button>
                  </div>
                </td>
              </tr>

              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>

    <?php
    }
    ?>
</div>
</div>
</div>
</div>

<script>
  (() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>