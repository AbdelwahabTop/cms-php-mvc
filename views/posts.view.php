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
                    <h3 class="mb-4 text-xl font-bold">Posts</h3>
                    <a href="/posts/create" class="px-4 py-2 bg-yellow-600 rounded-sm text-white">Add Post</a>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-white-500 dark:text-white-400">
                        <thead class="text-xs text-black-700 uppercase bg-gray-100 dark:bg-white-700 dark:text-black-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Image</th>
                                <th scope="col" class="px-6 py-3 w-60">Title</th>
                                <th scope="col" class="px-6 py-3">Author</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $post) : ?>
                                <tr class="bg-white border-b dark:bg-white-800 dark:border-gray-700 hover:bg-gray-50 hover:text-white dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">
                                        <img src="<?php echo $post->thumbnail ?>" alt="" class="w-16" />
                                    </td>
                                    <td class="px-6 py-4"><?php echo $post->title ?></td>
                                    <td class="px-6 py-4"><?php echo $post->slug ?></td>
                                    <td class="px-6 py-4"><?php echo $post->isPublished ? 'Published' : 'Not Published' ?></td>
                                    <td class="px-6 py-4 flex">
                                        <form action="/posts/edit" method="GET">
                                            <input type="hidden" name="id" value="<?php echo $post->id ?>" />
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-green-400 cursor-pointer">
                                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="/posts/delete" method="POST" class="mx-4 cursor-pointer">
                                            <input type="hidden" name="id" value="<?php echo $post->id ?>" />
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-5 w-5 text-red-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="/posts/view" method="GET">
                                            <input type="hidden" name="id" value="<?php echo $post->id ?>" />
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="h-5 w-5 text-blue-400 cursor-pointer">
                                                    &gt;
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require __DIR__ . '/partials/_footer.php';
?>