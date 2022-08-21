
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


<?php

    session_start();

    include("connection.php");

    $blogpost = $_GET['blogpost'];
    $owner = $_SESSION['userid'];

    //if users id equals owner of that post.
    $query = "SELECT * FROM posts WHERE id='$blogpost'";
    $result = mysqli_query($link,$query);

    $query2 = "SELECT title,content FROM posts WHERE id='$blogpost'";
    $result2 = mysqli_query($link,$query2);
    $row2 = mysqli_fetch_assoc($result2);

    while($row = mysqli_fetch_assoc($result)){

        if($row['owner']==$_SESSION['userid']){
            echo '<div class="bg-green-100 mx-auto xl:w-3/4">
            <div id="error2" class="text-red-600"></div>

            <div class="flex items-center">
                <div class="px-24 py-10 text-4xl font-bold"> 
                    <textarea id="editBlogTitle" class="resize-none" type="text">'.$row2["title"].'</textarea>
                </div>
                <button id="saveEditButton" name="saveEditButton" class="text-white ml-auto mr-24 bg-neutral-500 px-8 py-2 rounded-md shadow-xl font-bold hover:bg-neutral-300" type="button">Save Edit</button>
            </div>

            <div class="px-24 py-10 text-xl">
                <textarea id="editBlogArticle" class="w-full h-full resize-none" type="text">'.$row2["content"].'</textarea>
            </div>

        </div>';
        }

        else{
            echo '<div class="bg-green-100 mx-auto xl:w-3/4">

                    <div class="text-lg px-24 py-10 bg-red-100">
                        <p class="text-red-600">This post can only be edited by the owner.</p>
                    </div>

                    <div class="flex items-center">
                        <div class="px-24 py-10 text-4xl font-bold"> 
                            <textarea id="editBlogTitle" class="resize-none" type="text" placeholder ="'.$row2['title'].'" readonly></textarea>
                        </div>
                        <button id="saveEditButton" name="saveEditButton" class="text-white ml-auto mr-24 bg-neutral-500 px-8 py-2 rounded-md shadow-xl font-bold" type="button">Save Edit</button>
                    </div>

                    <div class="px-24 py-10 text-xl">
                        <textarea id="editBlogArticle" class="w-full h-full resize-none" type="text" placeholder ="'.$row2['content'].'" readonly></textarea>
                    </div>

                </div>';

        }

    }


?>

<body>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        var blogpostno = location.search.split('blogpost=')[1];
        $("#saveEditButton").click(function(){
            $.ajax({
                method: 'POST',
                url: 'submiteditpost.php',
                data:{
                    editTitlephp: $("#editBlogTitle").val(),
                    editArticlephp: $("#editBlogArticle").val(),
                    buttonClicked:1,
                    blogpostedited: blogpostno,
                },
                success:function(result){
                    //if inserting edited blog is successful, take user back to the article post.
                    if(result=='1'){
                        window.location = 'article.php?blogpost='+blogpostno;
                    }
                    else{
                        $("#error2").html(result).show();

                    }
                    
                }
            })
        })

    </script>

</body>


<?php include ("footer.php"); ?>
