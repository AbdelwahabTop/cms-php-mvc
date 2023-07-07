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
                    <h3 class="mb-4 text-xl font-bold">View Posts</h3>
                </div>

                <div class="lg:flex items-center border-b pb-2">
                    <div class="min-w-max">
                        <h2 class="font-bold text-lg mr-4">TITLE:</h2>
                    </div>
                    <div class="w-3/5">
                        <p><?= $post->title; ?></p>
                    </div>
                </div>
                <div class="lg:flex items-center border-b pb-2">
                    <div class="min-w-max">
                        <h2 class="font-bold text-lg mr-4">AUTHOR:</h2>
                    </div>
                    <div class="w-3/5">
                        <p><?= $post->slug; ?></p>
                    </div>
                </div>
                <div class="lg:flex items-center border-b pb-2">
                    <div class="min-w-max">
                        <h2 class="font-bold text-lg mr-4">BODY:</h2>
                    </div>
                    <div class="w-3/5">
                        <p><?= $post->body; ?></p>
                    </div>
                </div>
                <div class="lg:flex items-center border-b pb-2">
                    <div class="min-w-max">
                        <h2 class="font-bold text-lg mr-4">STATUS:</h2>
                    </div>
                    <div class="w-3/5">
                        <p><?= $post->isPublished ? 'yes' : 'no'; ?></p>
                    </div>
                </div>
                <div class="lg:flex items-center border-b pb-2">
                    <div class="min-w-max">
                        <h2 class="font-bold text-lg mr-4">IMAGE:</h2>
                    </div>
                    <div class="w-3/5">
                        <img src="<?= $post->isPublished ? 'Published' : 'Not Published'; ?>" alt="" class="w-16" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require __DIR__ . '/partials/_footer.php';
?>