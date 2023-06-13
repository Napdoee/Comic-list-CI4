<?= $this->extend('comic/layout/content') ?>
<?= $this->section('content') ?>
<div class="content-header">
    <div class="container">
        <div class="row">
            <div class="offset-md-4">
                <a href="<?= base_url('comic') ?>" class="btn btn-default mb-2">
                    Back to Home
                </a>
                <div class="card card-primary card-tabs">
                    <div class="card-header">
                        <p class="card-title">
                            Title: <?= $comic['title'] ?> </br>
                            Author: <?= $comic['author'] ?> </br>
                            Release Date: <?= $comic['release_date'] ?>
                        </p>
                    </div>
                    <div class="card-body p-0">
                        <img src="<?= base_url("img/$comic[cover]") ?>" class="img-thumbnail"
                            style="min-width: 300px; width: auto; max-height: 420px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>