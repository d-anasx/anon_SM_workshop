<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonymous Forum - Posts</title>
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
        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-4xl font-semibold text-gray-900 mb-2">Anonymous Forum</h1>
            <p class="text-gray-600">Share your thoughts anonymously</p>
        </header>

        <!-- Create Post Button -->
        <div class="mb-8">
            <a href="<!-- LINK_TO_CREATE_POST -->" class="inline-block bg-gray-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-800 transition-colors">
                Create New Post
            </a>
        </div>

        <!-- Posts Feed -->
        <div class="space-y-6">
            <!-- POST_CARD_START -->
            <article class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <h2 class="text-xl font-semibold text-gray-900 mb-3">
                    <!-- POST_TITLE -->
                </h2>
                <p class="text-gray-700 mb-4 line-clamp-3">
                    <!-- POST_BODY_SNIPPET -->
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-500">
                        <!-- POST_CREATED_AT -->
                    </span>
                    <a href="<!-- LINK_TO_POST_SHOW -->" class="text-gray-900 font-medium hover:text-gray-700 transition-colors">
                        View →
                    </a>
                </div>
            </article>
            <!-- POST_CARD_END -->

            <!-- REPEAT_POST_CARD_FOR_EACH_POST -->
        </div>

        <!-- Empty State (if no posts) -->
        <div class="text-center py-12 bg-white rounded-lg border border-gray-200">
            <p class="text-gray-500">No posts yet. Be the first to share!</p>
        </div>
        <!-- END_EMPTY_STATE -->
    </div>
</body>
</html>

