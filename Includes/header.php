<header class="navbar">
    <div class="logo_div">
        <a class=headerLinks href="/CMS_Projekt_Grupp8/index.php">
            <h1>Millhouse</h1>
        </a>
    </div>
    <nav>
        <ul>
            <li><a class=headerLinks href="/CMS_Projekt_Grupp8/index.php">Home</a></li>
            <li><a class=headerLinks href="#about">About Millhouse</a></li>
            <?php
            if (!isset($_SESSION['is_Login'])) { ?>

                <li><a class=headerLinks href="/CMS_Projekt_Grupp8/views/login.php">Login</a></li>
                <li><a class=headerLinks href="/CMS_Projekt_Grupp8/views/register.php">Register</a></li>
            <?php  } ?>

            <?php
            if (@$_SESSION['role'] == "admin") { ?> <li><a class=headerLinks href="/CMS_Projekt_Grupp8/views/post.php">Create new Post</a></li>

                <li><a class=headerLinks href="/CMS_Projekt_Grupp8/views/viewPost.php">Edit Post</a></li>


            <?php } ?>
            <?php
            if (@$_SESSION['role'] == "admin" || @$_SESSION['role'] == "user") { ?>

                <li><a class=headerLinks href="/CMS_Projekt_Grupp8/views/logout.php">Logout</a></li>

            <?php  } ?>
        </ul>
    </nav>
</header>