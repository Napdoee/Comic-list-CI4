<?= $this->extend('admin/layout/content') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <?php if (!empty(validation_errors())) : ?>
    <div class="alert alert-danger" role="alert">
        <!-- <ul> -->
        <?php foreach (validation_errors() as $error) : ?>
        <li><?= esc($error) ?></li>
        <?php endforeach; ?>
        <!-- </ul> -->
    </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('msg_e')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('msg_e') ?>
    </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Update <?= ucwords($user['username']) ?>'s</div>
        </div>
        <div class="card-body">
            <?php if ($update == 'user') : ?>
            <form action="<?= base_url('admin/user/update') ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter username"
                        name="username" value="<?= old('username', $user['username']) ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
                        name="email" value="<?= old('email', $user['email']) ?>">
                </div>
                <div class=" form-group">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-control">
                        <option value="admin" <?= old('level', $user['level']) == 'admin' ? 'selected' : '' ?>>Admin
                        </option>
                        <option value="guest" <?= old('level', $user['level']) == 'guest' ? 'selected' : '' ?>>Guest
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                        name="password">
                </div>
                <button type="submit" class="btn btn-primary">Confirm Update</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>