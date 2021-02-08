<nav class="w-full bg-transparent absolute top-0 left-0 z-50">
    <div class="container py-2 lg:px-10">
        <div class="flex flex-wrap justify-between items-center">
            <div class="flex flex-wrap items-center">
                <a href="javascript:;">About</a>
            </div>
            <a href="/" class="absolute left-1/2 transform -translate-x-1/2 w-12 h-12 flex justify-center items-center px-4 py-4 font-bold text-white text-xl"><img src="" alt="">Logo</a>
            <div class="flex flex-wrap space-x-4 items-center">
                <?php if(!isset($_SESSION["user_details"])){?>
                    <p class="cursor-pointer"><span><a href="/views/forms/users/login.php" class="hover:text-white">Login </a>/</span><span><a href="/views/forms/users/register.php" class="hover:text-white"> Register</a></span></p>
                <?php }else{ ?>
                    <a href="/method.php?action=logout">Logout</a>
                <?php } ?>
                <a href="javascript:;" class="px-4 bg-red-500 py-2 rounded-lg hover:bg-red-600 text-white font-bold shadow ">Contact Us</a>
            </div>
        </div>
    </div>
</nav>