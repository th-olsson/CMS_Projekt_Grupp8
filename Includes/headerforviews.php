<header class="navbar">
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

            <li><a href="login.php">Login</a></li>
        <?php  } ?>

        <li><a href="register.php">Register</a></li>
        <?php
        if (@$_SESSION['role'] == "admin") { ?>
            <li><a href="post.php">Create new Post</a></li>

            <li><a href="viewPost.php">Edit Post</a></li>


        <?php } ?>
        <?php
        if (@$_SESSION['role'] == "admin" || @$_SESSION['role'] == "user") { ?>

            <li><a href="logout.php">Logout</a></li>

        <?php  } ?>

    </ul>
</header>