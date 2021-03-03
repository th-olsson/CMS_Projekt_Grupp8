<?php include("includes/database.php") ?>
<?php include("includes/head.php") ?>
<?php session_start(); ?>
<title>Blogg | Homepage </title>
</head>

<body>
    <!-- container - wraps whole page -->
    <div class="container">
        <!-- navbar -->
        <?php include("includes/header.php"); ?>
        <!-- navbar -->

        <!-- // navbar -->

        <!-- Page content -->
        <div class="content">
            <h2 class="content-title">Recent Articles</h2>
            <hr>
        </div>
        <!-- // Page content -->
        <?php include("includes/postsClass.php") ?>



        <!-- footer -->
        <?php include("includes/footer.php") ?>