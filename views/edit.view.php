<?php
require __DIR__ . '/partials/_header.php';
?>

<?php
// $query = "SELECT categories.name FROM categories
//     JOIN post_categories ON categories.id = post_categories.category_id
//     JOIN posts ON post_categories.post_id = posts.id
//     WHERE posts.id = 1;";

// $stm = connect()->prepare($query);
// $stm->execute();

// dd($stm->fetchAll(PDO::FETCH_OBJ));
// dd($selectedCategories);

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
                    <h3 class="mb-4 text-xl font-bold">Edit Post</h3>
                </div>
                <!-- <div class="relative overflow-x-auto shadow-md sm:rounded-lg"> -->
                <section class="mx-auto max-w-xl">
                    <div class="w-full">
                        <div id="message"></div>
                        <!-- <form action="/posts/store" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" enctype="multipart/form-data"> -->
                        <form action="/posts/update" id="myform" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                    Title
                                </label>
                                <input value="<?= $oldData->title ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focuse:outline-none focuse:shadow-outline" id="title" name="title" type="text" placeholder="Title">
                                <p id="title_err" class="text-red-500 text-sm italic error mt-2"></p>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">
                                    Slug
                                </label>
                                <input value="<?= $oldData->slug ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focuse:outline-none focuse:shadow-outline" id="slug" name="slug" type="text" placeholder="Slug">
                                <p id="slug_err" class="text-red-500 text-sm italic error mt-2"></p>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                                    Body
                                </label>
                                <input value="<?= $oldData->body ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focuse:outline-none focuse:shadow-outline" id="body" name="body" type="text" placeholder="Body">
                                <p id="body_err" class="text-red-500 text-sm italic error mt-2"></p>
                            </div>

                            <div class="grid grid-cols-2">
                                <?php foreach ($categories as $category) : ?>
                                    <div class="mb-2">
                                        <input class="pt-4" type="checkbox" name="categories[]" value="<?= $category->id ?>" id="<?= $category->name ?>" <?php if (in_array($category->id, $selectedCategories)) echo 'checked' ?>>
                                        <label class="" for="<?= $category->name ?>"><?= $category->name ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">
                                    Thumbnail
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focuse:outline-none focuse:shadow-outline" id="thumbnail" name="thumbnail" type="file" placeholder="Thumbnail" />
                                <img src="<?= "../../" . $oldData->thumbnail ?>" class="mt-3" alt="" height="80" width="120" id="imgTag" />
                                <p id="thumbnail_err" class="text-red-500 text-sm italic error mt-2"></p>
                            </div>

                            <div class="flex items-center justifiy-between mt-8">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focuse:outline-none focuse:shadow-outline" id="submitbtn" type="submit">
                                    Update
                                </button>
                            </div>
                            <input type="hidden" name="id" id="id" value="<?= $oldData->id ?>">
                            <input type="hidden" name="created_at" id="created_at" value="<?= $oldData->created_at ?>">
                            <input type="hidden" name="isPublished" id="isPublished" value="<?= $oldData->isPublished ?>">
                            <input type="hidden" name="oldThumnail" id="oldThumnail" value="<?= $oldData->thumbnail ?>">
                        </form>
                    </div>
                </section>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

<script src="../public/assets/js/updateValidation.js"></script>
<?php
require __DIR__ . '/partials/_footer.php';
?>