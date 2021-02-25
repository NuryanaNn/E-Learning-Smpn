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
                                    <th scope="col">Code</th>
                                    <th scope="col">Pelajaran</th>
                                    <th scope="col">Semester</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($manageSubject as $ms) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $ms['code'] ?></td>
                                        <td><?= $ms['nama_pelajaran'] ?></td>
                                        <td><?= $ms['semester'] ?></td>
                                        <td>
                                            <button type="button" class="badge badge-warning" data-toggle="modal" data-toggle="modal" data-target="#newEditSubjectModal<?= $ms["id"]; ?>">Edit</a></button>
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-toggle="modal" data-target="#newDeleteSubjectModal<?= $ms["id"]; ?>">Delete</a></button>
                                        </td>
                                    </tr>

                                    <!-- Modal Ubah Mata Pelajaran -->
                                    <div class="modal fade" id="newEditSubjectModal<?= $ms["id"]; ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit <?= $ms['nama_pelajaran'] ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?php echo base_url('admin/editPelajaran') ?>" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?php echo $ms['id']; ?>">
                                                        <div class="form-group row">
                                                            <label for="code" class="col-sm-2 col-form-label">Kode Pelajaran</label>
                                                            <div class="col-sm">
                                                                <input type="text" class="form-control" id="code" name="code" value="<?php echo $ms['code']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="nama_pelajaran" class="col-sm-2 col-form-label">Nama Pelajaran</label>
                                                            <div class="col-sm">
                                                                <input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran" value="<?php echo $ms['nama_pelajaran']; ?>">
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
                                                    <h4 class="modal-title">Delete <?= $ms['nama_pelajaran'] ?></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="<?php echo base_url('admin/deleteData') ?>" method="POST">

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
                <h5 class="modal-title" id="newTeacherModalLabel">Tambah Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('admin/tambahPelajaran') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="code" class="col-sm-2 col-form-label">Kode Pelajaran</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="code" name="code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subject" class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran">
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