<?php
require __DIR__ . '/partials/_header.php';
?>

<?php var_dump($_POST) ?>

<div class="flex flex-col items-center justify-center h-screen">
    <h2 class="text-2xl font-semibold text-gray-700 dark:text-white mb-3">Login</h2>
    <form id="myform" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" enctype="multipart/form-data">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Username
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Username">
            <p id="username_err" class="text-red-500 text-sm italic error mt-2"></p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email">
            <p id="email_err" class="text-red-500 text-sm italic error mt-2"></p>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Password">
            <p id="password_err" class="text-red-500 text-sm italic error mt-2"></p>
        </div>

        <div class="flex items-center justify-between mt-8">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" id="submitbtn" type="submit">
                Register
            </button>
        </div>
    </form>
</div>

<script src="../public/assets/js/loginValidation.js"></script>
<?php
require __DIR__ . '/partials/_footer.php';
?>