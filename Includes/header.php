<header class="navbar">
    <div class="logo_div">
        <a class=headerLinks href="/CMS_Projekt_Grupp8/index.php">
            <div class="title">
                <h1 class="h1Header">Millhouse</h1>
                <p class="info">"The blogg"</p>
            </div>    
            <p class="slogan">"Where shopping meets destination"</p>
        </a>
    </div>
    <nav>
        <ul class="headerUl">
            <li class="headerLi"><a class=headerLinks href="/CMS_Projekt_Grupp8/index.php">Home</a></li>
            <li class="headerLi"><a class=headerLinks href="/CMS_Projekt_Grupp8/views/aboutUs.php">About Millhouse</a></li>


        <!--Login and register links are not visible to logged in users-->
            <?php
            if (!isset($_SESSION['is_Login'])) { ?>
            <li class="headerLi"><a class=headerLinks href="/CMS_Projekt_Grupp8/views/login.php">Login</a></li>
            <li class="headerLi"><a class=headerLinks href="/CMS_Projekt_Grupp8/views/register.php">Register</a></li>
            <?php  } ?>
            <!--Create post is visible only to user with role admin-->
            <?php
            if (@$_SESSION['role'] == "admin") { ?> <li class="headerLi"><a class=headerLinks href="/CMS_Projekt_Grupp8/views/post.php">Create new Post</a></li>
            <?php } ?>

            <?php //If any user is logged in, display 'logout'
            if (@$_SESSION['role'] == "admin" || @$_SESSION['role'] == "user") { ?>
            <li class="headerLi"><a class=headerLinks href="/CMS_Projekt_Grupp8/views/logout.php">Logout</a></li>
            <?php  } ?>

        </ul>
    </nav>
</header>