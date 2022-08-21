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

    <div class="bg-green-100 mx-auto xl:w-3/4">
        <div id="error" class="text-red-600"></div>

        <div class="flex items-center">
            <div class="px-24 py-10 text-4xl font-bold"> 
                <textarea id="inputTitle" class="resize-none" type="text"></textarea>
            </div>
            <button id="submitPost" name="submitPost" class="text-white ml-auto mr-24 bg-neutral-500 px-8 py-2 rounded-md shadow-xl font-bold hover:bg-neutral-300" type="button">Submit Post</button>
        </div>

        <div class="px-24 py-10 text-xl">
            <textarea id="input" class="w-full h-full resize-none" type="text"></textarea>
        </div>

    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">


        $("#submitPost").click(function(){
            
            $.ajax({
                method:'POST',
                url: 'submitpost.php',
                data:{
                    titlephp: $("#inputTitle").val(),
                    inputphp: $("#input").val(),
                    buttonClicked:1,
                },
                success: function(result){
                    if(result == '1'){
                        window.location = 'loggedinpage.php'
                    }
                    else{
                        $("#error").html(result).show();
                    }       
                }
            })
        })

    </script>

</body>
<?php include ("footer.php"); ?>
