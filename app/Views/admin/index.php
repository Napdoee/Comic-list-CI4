<?= $this->extend('admin/layout/content') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Home Section</div>
        </div>
        <div class="card-body">
            <p class="card-text">
                Hi, welcome back <?= session()->get('username') ?>! <br>
                You're logged as <?= session()->get('level') ?>
            </p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>