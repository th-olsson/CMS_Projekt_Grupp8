<header class="navbar">
    <div class="logo_div">
        <a href="/CMS_Projekt_Grupp8/index.php">
            <h1>Millhouse</h1>
        </a>
    </div>
    <nav>
        <ul>
        
            <li><a class="active" href="/CMS_Projekt_Grupp8/index.php">Home</a></li>
            <li><a href="#about">About Millhouse</a></li>

            <?php //If not logged in, display 'login'
            if (!isset($_SESSION['is_Login'])) { ?>
                <li><a href="/CMS_Projekt_Grupp8/views/login.php">Login</a></li>
                <li><a href="/CMS_Projekt_Grupp8/views/register.php">Register</a></li>
            <?php  } ?>

            <?php //If admin is logged in, display 'create new post' and 'edit'
            if (@$_SESSION['role'] == "admin") { ?> 
                <li><a href="/CMS_Projekt_Grupp8/views/post.php">Create new Post</a></li>
                <li><a href="/CMS_Projekt_Grupp8/views/viewPost.php">Edit Post</a></li>
            <?php } ?>

            <?php //If any user is logged in, display 'logout'
            if (@$_SESSION['role'] == "admin" || @$_SESSION['role'] == "user") { ?>
                <li><a href="/CMS_Projekt_Grupp8/views/logout.php">Logout</a></li>
            <?php  } ?>

        </ul>
    </nav>
</header>