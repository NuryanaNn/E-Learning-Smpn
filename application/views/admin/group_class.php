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
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Wali Kelas</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($groupClass as $ms) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $ms['kelas'] ?></td>
                                        <td><?= $ms['semester'] ?></td>
                                        <td><?= $ms['wali_kelas'] ?></td>
                                        <td>
                                            <button type="button" class="badge badge-warning" data-toggle="modal" data-toggle="modal" data-target="#newEditSubjectModal<?= $ms["id"]; ?>">Edit</a></button>
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-toggle="modal" data-target="#newDeleteGroupModal<?= $ms["id"]; ?>">Delete</a></button>
                                        </td>
                                    </tr>

                                    <!-- Modal Ubah Grup -->
                                    <div class="modal fade" id="newEditSubjectModal<?= $ms["id"]; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit <?= $ms['kelas'] ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?php echo base_url('admin/editGroup') ?>" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?php echo $ms['id']; ?>">
                                                        <div class="form-group row">
                                                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                                                            <div class="col-sm">
                                                                <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $ms['kelas']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                                            <div class="col-sm">
                                                                <select class="custom-select" name="semester">
                                                                    <option selected><?= $ms['semester'] ?></option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="wali_kelas" class="col-sm-2 col-form-label">Semester</label>
                                                            <div class="col-sm">
                                                                <select class="custom-select" name="wali_kelas">
                                                                    <option selected>--Pilih Guru--</option>
                                                                    <?php
                                                                    foreach ($guru as $g) : ?>
                                                                        <option><?= $g['name'] ?></option>
                                                                    <?php endforeach; ?>
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
                                    <div class="modal fade" id="newDeleteGroupModal<?= $ms["id"]; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?php echo base_url('admin/deleteGroup') ?>" method="POST">

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

<!-- Modal Tambah Data Pelajaran-->
<div class="modal fade" id="newTeacherModal" tabindex="-1" role="dialog" aria-labelledby="newTeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="text-align: right;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newTeacherModalLabel">Add Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('admin/tambahGroupKelas') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="kelas" name="kelas">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                        <div class="col-sm">
                            <select class="custom-select" name="semester">
                                <option selected>--Pilih Semester--</option>
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="wali_kelas" class="col-sm-2 col-form-label">Guru</label>
                        <div class="col-sm">
                            <select class="custom-select" name="wali_kelas">
                                <option selected>--Pilih Guru--</option>
                                <?php $no = 1;
                                foreach ($guru as $g) : ?>
                                    <option><?= $g['name'] ?></option>
                                <?php endforeach; ?>
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