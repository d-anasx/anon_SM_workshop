<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonymous Forum - Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 py-12">
        <!-- Back to Posts Link -->
        <div class="mb-6">
            <a href="<!-- LINK_TO_POSTS_INDEX -->" class="text-gray-600 hover:text-gray-900 transition-colors">
                ← Back to Posts
            </a>
        </div>

        <!-- Post Content -->
        <article class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 mb-8">
            <h1 class="text-3xl font-semibold text-gray-900 mb-4">
                <!-- POST_TITLE -->
            </h1>
            <div class="text-sm text-gray-500 mb-6">
                <!-- POST_CREATED_AT -->
            </div>
            <div class="text-gray-700 leading-relaxed whitespace-pre-wrap">
                <!-- POST_BODY -->
            </div>
        </article>

        <!-- Comments Section -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Comments</h2>
            
            <!-- Comments List -->
            <div class="space-y-4 mb-8">
                <!-- COMMENT_START -->
                <div class="bg-white rounded-lg border border-gray-200 p-5">
                    <p class="text-gray-700 mb-3 whitespace-pre-wrap">
                        <!-- COMMENT_BODY -->
                    </p>
                    <div class="text-xs text-gray-500">
                        <!-- COMMENT_CREATED_AT -->
                    </div>
                </div>
                <!-- COMMENT_END -->

                <!-- REPEAT_COMMENT_FOR_EACH_COMMENT -->
            </div>

            <!-- Empty Comments State -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 text-center text-gray-500">
                <p>No comments yet. Be the first to comment!</p>
            </div>
            <!-- END_EMPTY_COMMENTS -->
        </section>

        <!-- Leave a Comment Form -->
        <section class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-6">Leave a Comment</h3>
            <form action="<!-- FORM_ACTION_TO_STORE_COMMENT -->" method="POST">
                <!-- CSRF_TOKEN -->
                <div class="mb-6">
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-2">
                        Your Comment
                    </label>
                    <textarea 
                        id="body" 
                        name="body" 
                        rows="5" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent resize-none"
                        placeholder="Share your thoughts..."
                        required
                    ></textarea>
                </div>
                <button 
                    type="submit" 
                    class="bg-gray-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-800 transition-colors"
                >
                    Submit Comment
                </button>
            </form>
        </section>
    </div>
</body>
</html>

