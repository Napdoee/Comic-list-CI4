<?= $this->extend('admin/layout/content') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <?php if (!empty(validation_errors())) : ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach (validation_errors() as $error) : ?>
        <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('msg_c')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('msg_c') ?>
    </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mt-2"><?= $title ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Add New Comic
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th class="text-center" style="width: 17%">Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Release Date</th>
                        <th class="text-center" style="width: 18%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($comics as $comic) : ?>
                    <tr>
                        <td class="align-middle"><?= $no++ ?></td>
                        <td class="text-center">
                            <img src="<?= base_url("img/$comic[cover]") ?>" class="rounded" width="100px">
                        </td>
                        <td class="align-middle"><?= $comic['title'] ?></td>
                        <td class="align-middle"><?= $comic['author'] ?></td>
                        <td class="align-middle"><?= $comic['release_date'] ?></td>
                        <td class="align-middle">
                            <a href="<?= base_url("admin/comic/$comic[slug]") ?>" class="btn
                                btn-warning">Update</a>
                            <form action="<?= base_url("admin/comic/$comic[id]") ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure want delete <?= $comic['title'] ?> comic? ')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New Comic</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/comic/new') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                            value="<?= old('title') ?>">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" placeholder="Enter author" name="author"
                            value="<?= old('author') ?>">
                    </div>
                    <div class="form-group">
                        <label for="release_date">Release Date</label>
                        <input type="date" class="form-control" id="release_date" name="release_date"
                            value="<?= old('release_date') ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Cover</label>
                        <div class="row">
                            <div class="col-3">
                                <img id="imgPreview" class="rounded" width="100px"
                                    src="<?= base_url('img/default.png') ?>">
                            </div>
                            <div class="col-9">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cover" name="cover"
                                            oninput="previewImg()">
                                        <label class="custom-file-label" for="cover">
                                            Chosee Cover
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?= $this->endSection() ?>