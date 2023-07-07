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
                <h1 class="text-right mb-8 font-bold text-blue-400">
                    Welcome
                </h1>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">
                            <!-- <p class="pb-4">Total Users: 5</p>
                            <hr /> -->
                            <p class="pt-4">Total Posts: <?= $numOfPosts ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require __DIR__ . '/partials/_footer.php';
?>