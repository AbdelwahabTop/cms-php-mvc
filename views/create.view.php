<?php
require __DIR__ . '/partials/_header.php';
?>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 md:grid md:grid-cols-5 gap-4">
            <div class="col-span-1">
                <?php
                require __DIR__ . '/partials/_nav.php';
                ?>
            </div>
            <div class="col-span-4">
                <div class="flex justify-between mb-4">
                    <h3 class="mb-4 text-xl font-bold">Add Post</h3>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <section class="mx-auto max-w-xl">
                        <div class="w-full">
                            <div id="message"></div>
                            <!-- <form action="/posts/store" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" enctype="multipart/form-data"> -->
                            <form id="myform" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                        Title
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focuse:outline-none focuse:shadow-outline" id="title" name="title" type="text" placeholder="Title">
                                    <p id="title_err" class="text-red-500 text-sm italic error mt-2"></p>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">
                                        Slug
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focuse:outline-none focuse:shadow-outline" id="slug" name="slug" type="text" placeholder="Slug">
                                    <p id="slug_err" class="text-red-500 text-sm italic error mt-2"></p>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                                        Body
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focuse:outline-none focuse:shadow-outline" id="body" name="body" type="text" placeholder="Body">
                                    <p id="body_err" class="text-red-500 text-sm italic error mt-2"></p>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">
                                        Thumbnail
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focuse:outline-none focuse:shadow-outline" id="thumbnail" name="thumbnail" type="file" placeholder="Thumbnail" />
                                    <img src="../images/upload.png" class="mt-3" alt="" height="80" width="120" id="imgTag" />
                                    <p id="thumbnail_err" class="text-red-500 text-sm italic error mt-2"></p>
                                </div>

                                <div class="flex items-center justifiy-between mt-8">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focuse:outline-none focuse:shadow-outline" id="submitbtn" type="submit">
                                        Save Data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../public/assets/js/validation.js"></script>
<?php
require __DIR__ . '/partials/_footer.php';
?>