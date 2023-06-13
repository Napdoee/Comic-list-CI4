<?= $this->extend('comic/layout/content') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
        <h1 class="m-0"> Comic List <small>v 1.0</small></h1>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row">
            <?php $no = 1;
            foreach ($comics as $comic) : ?>
            <div class="col-md-3">
                <div class="card card-outline card-primary text-center">
                    <div class="card-header">
                        <h3 class="card-title"><?= $comic['title'] ?></h3>
                    </div>
                    <div class="card-body p-2">
                        <img src="<?= base_url("img/$comic[cover]") ?>" class="rounded img-thumbnail"
                            style="width: 100%; height: 300px;">
                        <a href="<?= base_url("comic/$comic[slug]") ?>" class="btn btn-primary w-100 mt-2">More
                            Detail</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<?= $this->endSection() ?>