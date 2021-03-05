<!-- navbar -->
<header class="navbar">
    <div class="logo_div">
        <a href="index.php">
            <h1>Millhouse</h1>
        </a>
    </div>
    <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="#about">About Millhouse</a></li>
        <?php
        if (!isset($_SESSION['is_Login'])) { ?>

            <li><a href="views/login.php">Login</a></li>
            <li><a href="views/register.php">Register</a></li>
        <?php  } ?>

        <?php
        if (@$_SESSION['role'] == "admin") { ?> <a href="views/post.php">Create new Post</a>

            <li><a href="views/viewPost.php">Edit Post</a></li>


        <?php } ?>
        <?php
        if (@$_SESSION['role'] == "admin" || @$_SESSION['role'] == "user") { ?>

            <li><a href="views/logout.php">Logout</a></li>

        <?php  } ?>

    </ul>
</header>