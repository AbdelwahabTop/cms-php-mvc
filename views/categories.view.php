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
                    <h3 class="mb-4 text-xl font-bold">Categories</h3>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <section class="mx-auto max-w-xl">
                        <div class="w-full">
                            <div class="grid grid-cols-1">
                                <?php foreach ($categories as $category) : ?>
                                    <div class="mb-6 font-bold">
                                        <label class=" mr-2" for="<?= $category->name ?>"><?= $category->name ?> :</label>
                                        <?php
                                        if (array_key_exists($category->id, $numOfCategories)) {
                                            echo $numOfCategories[$category->id];
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                        posts
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require __DIR__ . '/partials/_footer.php';
?>