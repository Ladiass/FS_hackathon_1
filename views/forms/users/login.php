<?php 
    include_once __DIR__."/../../partials/layout.php";
    $title = "Login";
    if(isset($_SESSION["user_details"])){
        header("Location: /");
    }
    function get_content(){
    ?>  
    <link rel="stylesheet" href="/assets/css/login">
    <section>
        <div class="container">
            <div class="absolute transform top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">
                <div class=" max-w-xs py-10 px-5 bg-gray-500">
                    <p class="text-center text-2xl font-bold text-white mb-2">Login</p>
                    <form action="/method.php" method="POST" class="flex flex-wrap space-y-4">
                        <input type="hidden" name="action" value="login">
                        <input type="text" name="username" class="outline-none w-full px-4 py-2" placeholder="Username/Email">
                        <input type="password" name="pass" class="outline-none w-full px-4 py-2" placeholder="pass">
                        <input type="submit" value="Login" class="px-5 py-2 rounded bg-blue-500 hover:bg-blue-400 active:bg-blue-600 outline-none block mx-auto">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php 
    }
?>