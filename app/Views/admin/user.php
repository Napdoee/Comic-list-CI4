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
                    Add New User
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th class="text-center" style="width: 18%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['level'] ?></td>
                        <td>
                            <a href="<?= base_url("admin/user/$user[username]") ?>" class="btn btn-warning">Update</a>
                            <form action="<?= base_url("admin/user/$user[id]") ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure want delete <?= $user['username'] ?> Account? ')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/user/new') ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter username"
                            name="username" value="<?= old('username') ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                            name="email" value="<?= old('email') ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                            name="password" value="<?= old('password') ?>">
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="admin" <?= old('level') == 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="guest" <?= old('level') == 'guest' ? 'selected' : '' ?>>Guest</option>
                        </select>
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