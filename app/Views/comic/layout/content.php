<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <?= $this->include('comic/layout/head') ?>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?= $this->include('comic/layout/navbar') ?>
        <div class="content-wrapper">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <?= $this->include('comic/layout/script') ?>
</body>

</html>