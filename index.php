<?php 

#Database connection
include("includes/database.php");

//SQL - get selected data from all records in posts-table
$sql = 'SELECT u.Username, p.Title, p.Category, p.Description, p.Image, p.Content, p.Date FROM posts as p
JOIN users as u WHERE p.UserID = u.ID';

$stm = $db->prepare($sql);

if($stm->execute()){

    while($row = $stm->fetch()){

        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";

    }

} else {
    echo "error";
    die();
}

?>


<?php include("includes/head.php") ?>
	<title>Blogg | Homepage </title>
</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container">

    
		<!-- navbar -->
		<?php include("includes/header.php") ?>
		<!-- // navbar -->

		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
			<!-- more content still to come here ... -->

            <!-- Example layout for blog posts -->
            <!-- Attributes to insert variables into: <time datetime="$date">,<a href="index.php/category/$categoryUrl">  -->
            <article class="post">
                <h3 class="post__title">New vision for the company</h3>
                <aside class="post__meta"><adress>By username</adress><time datetime="2021-02-18">2021-02-18</time><a href="">category</a></aside>
                <p class="post__content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti, maxime culpa nemo possimus fuga enim cumque est dicta. Fugiat molestias vel dolorum eaque nemo perferendis vero, esse officia impedit quas. Mollitia, facere dolor!</p>
            </article>
	    </div>


    </div>
	<!-- // Page content -->

	<!-- footer -->
	<?php include("includes/footer.php") ?>