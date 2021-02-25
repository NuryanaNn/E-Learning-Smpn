<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">

            <?php echo form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?php echo $this->session->flashdata('message'); ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newTeacherModal">Tambah</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nis</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Handphone</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($manageStudent as $ms) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $ms['nip'] ?></td>
                                        <td><?php echo $ms['name'] ?></td>
                                        <td><?php echo $ms['email'] ?></td>
                                        <td><?php echo $ms['handphone'] ?></td>
                                        <td><?php echo $ms['is_active'] ?></td>
                                        <td>
                                            <button type="button" class="badge badge-warning" data-toggle="modal" data-toggle="modal" data-target="#newEditSubjectModal<?= $ms["id"]; ?>">Edit</a></button>
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-toggle="modal" data-target="#newDeleteSubjectModal<?= $ms["id"]; ?>">Delete</a></button>
                                        </td>
                                    </tr>

                                    <!-- Modals Edit Teacher-->
                                    <div class="modal fade" id="newEditSubjectModal<?= $ms["id"]; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit <?= $ms['nip'] ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?php echo base_url('admin/editGuru') ?>" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?php echo $ms['id']; ?>">
                                                        <div class="form-group row">
                                                            <label for="nip" class="col-sm-2 col-form-label">Nip</label>
                                                            <div class="col-sm">
                                                                <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $ms['nip']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="nama" class="col-sm-2 col-form-label">Nama Guru</label>
                                                            <div class="col-sm">
                                                                <input type="text" class="form-control" id="nama" name="name" value="<?= $ms['name'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat / Tanggal Lahir</label>
                                                            <div class="col-sm">
                                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $ms['tempat_lahir'] ?>">
                                                            </div>
                                                            <div class="col-sm">
                                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $ms['tanggal_lahir'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                                            <div class="col-sm">
                                                                <select class="custom-select" name="jk">
                                                                    <option selected><?= $ms['jk'] ?></option>
                                                                    <option>Laki-Laki</option>
                                                                    <option>Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="agama" name="agama" class="col-sm-2 col-form-label">Agama</label>
                                                            <div class="col-sm">
                                                                <select class="custom-select" name="agama">
                                                                    <option selected><?= $ms['agama'] ?></option>
                                                                    <option>Islam</option>
                                                                    <option>Kristen</option>
                                                                    <option>Katolik</option>
                                                                    <option>Budha</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                                            <div class="col-sm">
                                                                <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= $ms['alamat']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="handphone" class="col-sm-2 col-form-label">Handphone</label>
                                                            <div class="col-sm">
                                                                <input type="text" class="form-control" id="handphone" name="handphone" value="<?= $ms['handphone'] ?>">
                                                            </div>
                                                            <div class="col-sm">
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" value="<?= $ms['email'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="role_id" class="col-sm-2 col-form-label">Role</label>
                                                            <div class="col-sm">
                                                                <select class="custom-select" name="role_id">
                                                                    <option selected><?= $ms['role_id'] ?></option>
                                                                    <option>2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="is_active" class="col-sm-2 col-form-label">Aktif</label>
                                                            <div class="col-sm">
                                                                <select class="custom-select" name="is_active">
                                                                    <option selected><?= $ms['is_active'] ?></option>
                                                                    <option>1</option>
                                                                    <option>0</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer ml-auto">
                                                            <button type="submit" name="edit" class="btn btn-primary">Ubah</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Delete mata Pelajaran -->
                                    <div class="modal fade" id="newDeleteSubjectModal<?= $ms["id"]; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete <?= $ms['nip'] ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?php echo base_url('admin/deleteGuru') ?>" method="POST">

                                                    <input type="hidden" name="id" value="<?php echo $ms['id']; ?>">
                                                    <div class="modal-footer ml-auto">
                                                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                    </div>
                <?php endforeach; ?>
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newTeacherModal" tabindex="-1" role="dialog" aria-labelledby="newTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="text-align: right;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTeacherModalLabel">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('admin/tambahSiswa') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label">Nip</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="nip" name="nip">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Guru</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="nama" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat / Tanggal Lahir</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                        </div>
                        <div class="col-sm">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm">
                            <select class="custom-select" name="jk">
                                <option selected>--Pilih Jenis Kelamin--</option>
                                <option>Laki-Laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="agama" name="agama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm">
                            <select class="custom-select" name="agama">
                                <option selected>--Pilih Agama--</option>
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Katolik</option>
                                <option>Budha</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm">
                            <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="handphone" class="col-sm-2 col-form-label">Handphone</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="handphone" name="handphone">
                        </div>
                        <div class="col-sm">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="is_active" class="col-sm-2 col-form-label">Aktif</label>
                        <div class="col-sm">
                            <select class="custom-select" name="is_active">
                                <option selected>--Pilih--</option>
                                <option>1</option>
                                <option>0</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>