<?php

    session_start();

    include("connection.php");
    
    //If user is not logged in currently, take them to the index (home page)
    if(!isset($_SESSION['userid'])){
        header('Location:index.php');
        exit();
    }

//you must be logged in to view the article. *Find out how to display a timed message popup*

    $blogpost = $_GET["blogpost"];
    $query = "SELECT title,content FROM posts WHERE id='$blogpost'";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);




?>
<?php include ("header.php"); ?>

<body>
    <nav class="mx-auto p-3 pr-8 bg-green-400 flex">
        <div class="container mx-auto flex items-center">
            <a href="index.php" class="mx-4 hover:opacity-50 transition-opacity"><img src="./assets/logo.png" width="200"></a>
            <a href="index.php" class="mx-4 text-blue-700 hover:text-blue-300 transition-colors">Home</a>
            <a href="#" class="mx-4 text-blue-700 hover:text-blue-300 transition-colors">About Me</a>
            <a href="#" class="mx-4 text-blue-700 hover:text-blue-300 transition-colors">Contact</a>
        </div>
        <div class="flex items-center">
            <button class="text-white mr-10 bg-blue-400 px-8 py-2 rounded-md shadow-xl font-bold hover:shadow-none hover:bg-teal-600" type="button"><a href="write.php">Write</a></button>
            <button class="text-white bg-teal-800 px-8 py-2 rounded-md shadow-xl font-bold hover:shadow-none hover:bg-teal-600" type="button" id="toggleModal" aria-expanded="false"><a href="logout.php">Logout</a></button>
        <div>
    </nav>

    <section class="bg-green-100 mx-auto xl:w-3/4">

        <div class="flex items-center">
            <div class="px-24 py-10 text-4xl font-bold">
                <h2><?php echo $row['title']; ?></h2>
            </div>
            <button class="text-white ml-auto mr-24 bg-neutral-500 px-8 py-2 rounded-md shadow-xl font-bold hover:shadow-none hover:bg-neutral-300" type="button"><a href="<?php echo 'editarticle.php?blogpost='.$blogpost ?>">Edit Post</a></button>
        </div>
        <div class="px-24 py-10 text-xl">
            <p><?php echo $row['content']; ?></p>
        </div>

    </section>


</body>
<?php include ("footer.php"); ?>
