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
            <div class="card-title">Update <?= ucwords($update == 'user' ? $user['username'] : $comic['title']) ?>'s
            </div>
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
            <?php elseif ($update == 'comic') : ?>
            <form action="<?= base_url('admin/comic/update') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $comic['id'] ?>">
                <input type="hidden" name="oldCover" value="<?= $comic['cover'] ?>">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
                        value="<?= old('title', $comic['title']) ?>">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" class="form-control" id="author" placeholder="Enter author" name="author"
                        value="<?= old('author', $comic['author']) ?>">
                </div>
                <div class="form-group">
                    <label for="release_date">Release Date</label>
                    <input type="date" class="form-control" id="release_date" name="release_date"
                        value="<?= old('release_date', $comic['release_date']) ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Cover</label>
                    <div class="row">
                        <div class="col-3">
                            <img id="imgPreview" class="rounded" width="100px"
                                src="<?= base_url("img/$comic[cover]") ?>">
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
                <button type="submit" class="btn btn-primary">Confirm Update</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>