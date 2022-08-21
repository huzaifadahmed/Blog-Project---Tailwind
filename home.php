<body id="body">

    <nav class="mx-auto p-3 pr-8 bg-green-400 flex">
        <div class="container mx-auto flex items-center">
            <a href="index.php" class="mx-4 hover:opacity-50 transition-opacity"><img src="./assets/logo.png" width="200"></a>
            <a href="index.php" class="mx-4 text-blue-700 hover:text-blue-300 transition-colors">Home</a>
            <a href="#" class="mx-4 text-blue-700 hover:text-blue-300 transition-colors">About Me</a>
            <a href="#" class="mx-4 text-blue-700 hover:text-blue-300 transition-colors">Contact</a>
        </div>
        <button class="text-white bg-teal-800 px-8 py-2 rounded-md shadow-xl font-bold hover:shadow-none hover:bg-teal-600" type="button" id="toggleModal" aria-expanded="false">Login</button>
    </nav>

</body>

<?php include ("body.php"); ?>
<?php include ("footer.php"); ?>

<body>
    

    <div id="modal" class="bg-black bg-opacity-50 absolute top-0 w-full h-full hidden">

        <div class="bg-slate-200 rounded-xl p-8 w-96 mx-auto relative top-32">

            <div id="modalTitle" class="text-2xl pb-4 border-b-2 border-blue-200 text-blue-600 font-bold">Login</div>
            <div id="error"></div>
            <p class="mt-4 mb-2">Email Address</p>
            <input id="email" type="text" placeholder="E-mail" class="h-8 w-full text-lg p-1 border-solid border-2 rounded-md border-blue-500 hover:border-blue-400"></input>
            <p class="mt-4 mb-2">Password</p>
            <input id="password" type="password" placeholder="Password" class="h-8 w-full text-lg p-1 border-solid border-2 rounded-md border-blue-500 hover:border-blue-400"></input>
            <button id="loginActive" value="1" class="text-blue-600 mt-4 p-2 border-b-2 w-24 border-blue-600 font-bold hover:text-blue-400">Sign Up</button>
            <button id="enterBtn" class="text-white bg-blue-600 p-2 px-4 rounded-md shadow-xl w-24 font-bold hover:shadow-none hover:bg-blue-400 transition-colors ml-8">Login</button>
            <button id="closeModal" class="text-white bg-neutral-600 ml-3 p-2 px-4 rounded-md shadow-xl font-bold hover:shadow-none hover:bg-neutral-400 transition-colors">Close</button>

        </div>

    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        toggleModal.addEventListener('click', function(){
            modal.classList.toggle('hidden');
            body.classList.add('overflow-hidden');
            body.classList.remove('overflow-scroll');

        })

        closeModal.addEventListener('click', function(){
            modal.classList.toggle('hidden');
            body.classList.add('overflow-scroll');
            body.classList.remove('overflow-hidden');

        })

        loginActive.addEventListener('click', function(){
            if(loginActive.value=="1"){
                document.getElementById("modalTitle").innerHTML = "Sign Up";
                document.getElementById("loginActive").innerHTML= "Login";
                document.getElementById("enterBtn").innerHTML = "Sign Up";
                loginActive.value = "0";
            }
            else if(loginActive.value=="0"){
                document.getElementById("modalTitle").innerHTML = "Login";
                document.getElementById("loginActive").innerHTML= "Sign Up";
                document.getElementById("enterBtn").innerHTML = "Login";
                loginActive.value = "1";
            }
        })


        $("#enterBtn").click(function(){
            $.ajax({
                url: 'loginSignup.php',
                method: 'POST',
                data:{
                    loginActivephp: $("#loginActive").val(),
                    emailphp: $("#email").val(),
                    passwordphp: $("#password").val(),
                    buttonClicked: 1,
                },
                success: function(result){
                    if(result=='1'){
                        window.location = 'loggedinpage.php';
                    }
                    else{
                        $("#error").html(result).show();

                    }
                }

            })
        })
        
        
    </script>

</body>