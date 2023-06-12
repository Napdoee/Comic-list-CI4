<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <?= $this->include('admin/layout/head.php') ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->include('admin/layout/navbar.php') ?>
        <?= $this->include('admin/layout/sidebar.php') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?= $this->include('admin/layout/content_head.php') ?>
            <!-- Main content -->
            <div class="content">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?= $this->include('admin/layout/script.php') ?>
</body>

</html>