<!-- navbar -->
<header class="navbar">
<<<<<<< HEAD
            <div class="logo_div">
                <a href="../index.php">
                    <h1>Millhouse</h1>
                </a>
            </div>
            <ul>
                <li><a class="active" href="../index.php">Home</a></li>
                <li><a href="#about">About Millhouse</a></li>
                <?php
                if (!isset($_SESSION['is_Login'])) { ?>
=======
    <div class="logo_div">
        <a href="index.php">
            <h1>Millhouse</h1>
        </a>
    </div>
    <ul>
        <li><a class="active" href="/CMS_Projekt_Grupp8/index.php">Home</a></li>
        <li><a href="#about">About Millhouse</a></li>
        <?php
        if (!isset($_SESSION['is_Login'])) { ?>
>>>>>>> 38f5152f4392023318bbfa48890ab9054e3fdc77

            <li><a href="/CMS_Projekt_Grupp8/views/login.php">Login</a></li>
            <li><a href="/CMS_Projekt_Grupp8/views/register.php">Register</a></li>
        <?php  } ?>

        <?php
        if (@$_SESSION['role'] == "admin") { ?> <a href="/CMS_Projekt_Grupp8/views/post.php">Create new Post</a>

            <li><a href="/CMS_Projekt_Grupp8/views/viewPost.php">Edit Post</a></li>


        <?php } ?>
        <?php
        if (@$_SESSION['role'] == "admin" || @$_SESSION['role'] == "user") { ?>

            <li><a href="/CMS_Projekt_Grupp8/views/logout.php">Logout</a></li>

        <?php  } ?>

    </ul>
</header>