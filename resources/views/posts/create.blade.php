<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonymous Forum - Create Post</title>
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
    <div class="max-w-2xl mx-auto px-4 py-12">
        <!-- Back to Posts Link -->
        <div class="mb-6">
            <a href="<!-- LINK_TO_POSTS_INDEX -->" class="text-gray-600 hover:text-gray-900 transition-colors">
                ← Back to Posts
            </a>
        </div>

        <!-- Create Post Form Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8">
            <h1 class="text-3xl font-semibold text-gray-900 mb-8">Create New Post</h1>
            
            <form action="<!-- FORM_ACTION_TO_STORE_POST -->" method="POST">
                <!-- CSRF_TOKEN -->
                
                <!-- Title Input -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Title
                    </label>
                    <input 
                        type="text" 
                        id="title" 
                        name="title" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent"
                        placeholder="Enter post title..."
                        required
                    >
                </div>

                <!-- Body Textarea -->
                <div class="mb-6">
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-2">
                        Content
                    </label>
                    <textarea 
                        id="body" 
                        name="body" 
                        rows="10" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-900 focus:border-transparent resize-none"
                        placeholder="Share your thoughts..."
                        required
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center gap-4">
                    <button 
                        type="submit" 
                        class="bg-gray-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-800 transition-colors"
                    >
                        Submit Post
                    </button>
                    <a 
                        href="<!-- LINK_TO_POSTS_INDEX -->" 
                        class="text-gray-600 hover:text-gray-900 transition-colors"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

