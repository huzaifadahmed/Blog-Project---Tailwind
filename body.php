<?php

    include("connection.php");

    $query = "SELECT * FROM posts";
    $result = mysqli_query($link,$query);
    $numRows = mysqli_num_rows($result);

    $query2 = "SELECT * FROM posts ORDER BY timestamp DESC";
    $result2 = mysqli_query($link,$query2);
    $row2 = mysqli_fetch_assoc($result2);

?>


<body>
    <section class="mx-auto xl:w-3/4">
        <section class="h-1/2 w-full mx-auto bg-no-repeat bg-cover text-center" style="background-image:url('./assets/jumbotronpic.jpg')">
            <div >
                <h2 class="pt-20 text-5xl font-medium text-green-800">Welcome to the Community Blog!</h2>
                <h3 class="pt-8 text-2xl text-green-700">Write about whatever interests you and share it with the world!</h3>
                <p class="text-lg pt-8 text-green-700">Join the mailing list to get updates on when a new article is posted!</p>
            </div>
            <div>
                <input type="text" placeholder="E-mail" class="my-8 h-8 w-1/6 text-lg p-1 border-solid border-2 rounded-md border-green-600 hover:border-green-400"></input>
                <button class="text-white bg-teal-800 px-8 py-1 rounded-md shadow-xl font-bold hover:shadow-none hover:bg-teal-600">Join!</button>
            </div>
        </section>

        <!--displays the latest post. -->
        <section class="px-36 pt-16 pb-6 bg-green-100">
            <?php
            $id = $row2['id'];
            $title = $row2["title"];
            $content = $row2["content"];
            $email = $row2["email"];
            $timestamp = $row2["timestamp"];
            echo "<div class='border-2 border-blue-400 rounded-2xl shadow-lg hover:shadow-xl'>
                <div class='p-4'>
                    <h4><a href=article.php?blogpost=$id class='text-blue-500 text-4xl hover:text-blue-200'>$title</a></h4>
                </div>
                <div class='p-4'>
                    <p>$content</p>
                    <p class='mt-4 text-sm font-thin'>Written by: $email</p>
                    <p class='text-sm font-thin italic'>Last updated: $timestamp</p>
                </div>
            </div>";?>
        </section>

        <section class="px-36 py-12 bg-green-100">
            <div class='grid grid-cols-3 gap-4'>
            <?php
            while($row =mysqli_fetch_assoc($result)){
                
                echo "<div class='border-2 border-blue-400 rounded-2xl p-4 hover:shadow-lg'>
                        <div><a href=article.php?blogpost=".$row['id']." class='text-2xl text-blue-500 hover:text-blue-200'>".$row['title']."</a></div>
                        <p class='max-h-56 overflow-hidden'>".$row['content']."</p>
                        <p class='mt-4 text-sm font-thin'>Written by: ".$row['email']."</p>
                        <p class='text-sm font-thin italic'>Last updated: ".$row['timestamp']."</p>
                    </div>";
            }
            ?>
            </div>
        </section>

    </section>

</body>
