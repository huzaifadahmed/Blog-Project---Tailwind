<?php

    session_start();
    
    //If user is not logged in currently, take them to the index (home page)
    if(!isset($_SESSION['userid'])){
        header('Location:index.php');
        exit();
    }



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

</body>
<?php include ("body.php"); ?>
<?php include ("footer.php"); ?>



