# Laravel Eloquent ORM & Development Cheat Sheet

## 📋 Development Workflow Steps

Follow these steps in order to build your anonymous forum application:

### Step 1: Database Setup
1. **Configure your database** in `.env` file (use SQLite for simplicity)
2. **Create migrations** for your tables (posts, comments)
3. **Run migrations** to create tables in your database: `php artisan migrate`
4. **Verify tables** were created correctly

### Step 2: Models Setup
1. **Define relationships** in your models (Post hasMany Comment, Comment belongsTo Post)
2. **Add `$fillable` array** to specify which fields can be mass-assigned
3. **Test relationships** using `php artisan tinker`

### Step 3: Controllers Implementation
1. **Implement `index()` method** - Fetch all posts and pass to view
2. **Implement `create()` method** - Return the create form view
3. **Implement `store()` method** - Validate input, create post, redirect
4. **Implement `show()` method** - Fetch single post with comments, pass to view
5. **Implement CommentController `store()`** - Validate, create comment, redirect

### Step 4: Routes Configuration
1. **Verify resource routes** for posts are defined
2. **Add POST route** for comments
3. **Test routes** using `php artisan route:list`

### Step 5: Views Implementation
1. **Add Blade directives** to display data (`@foreach`, `{{ }}`)
2. **Add form actions** and CSRF tokens
3. **Add route helpers** for navigation links
4. **Add error handling** and success messages
5. **Test all views** in browser

### Step 6: Testing & Seeding
1. **Create factories** for generating fake data
2. **Create seeders** to populate database
3. **Run seeders**: `php artisan db:seed`
4. **Test CRUD operations** manually in browser

---

## 🔥 Eloquent ORM Methods Cheat Sheet

### 📖 Retrieving Records

#### Get All Records
```php
Post::all();
// Returns: Collection of all Post models
// Use when: You need all records from a table
```

#### Get All with Conditions
```php
Post::where('likes', '>', 10)->get();
// Returns: Collection of Post models where likes > 10
// Use when: Filtering records by conditions
```

#### Get Single Record by ID
```php
Post::find(1);
// Returns: Single Post model or null if not found
// Use when: You know the ID and want one record
```

#### Get Single Record or Fail
```php
Post::findOrFail(1);
// Returns: Single Post model or throws 404 error
// Use when: You expect the record to exist (used in route model binding)
```

#### Get First Record
```php
Post::first();
// Returns: First Post model or null
// Use when: You want the first record matching conditions
```

#### Get Latest Records
```php
Post::latest()->get();
// Returns: Collection ordered by created_at descending
// Use when: Displaying newest posts first
```

#### Get Oldest Records
```php
Post::oldest()->get();
// Returns: Collection ordered by created_at ascending
// Use when: Displaying oldest posts first
```

#### Limit Results
```php
Post::take(5)->get();
// Returns: Collection of first 5 records
// Use when: Pagination or limiting results
```

#### Skip Records
```php
Post::skip(10)->take(5)->get();
// Returns: Collection of 5 records, skipping first 10
// Use when: Pagination
```

---

### ✏️ Creating Records

#### Create Single Record
```php
Post::create([
    'title' => 'My Post',
    'body' => 'Post content',
    'likes' => 0
]);
// Returns: Created Post model
// Use when: Creating from validated request data
// Requires: $fillable array in model
```

#### Create or Ignore Duplicate
```php
Post::firstOrCreate([
    'title' => 'My Post'
], [
    'body' => 'Post content',
    'likes' => 0
]);
// Returns: Existing or newly created Post model
// Use when: Avoid duplicates based on unique field
```

#### Create New Instance (Don't Save)
```php
$post = new Post();
$post->title = 'My Post';
$post->body = 'Post content';
$post->save();
// Returns: Saved Post model
// Use when: You need more control over assignment
```

#### Mass Assignment (Alternative)
```php
$post = new Post([
    'title' => 'My Post',
    'body' => 'Post content'
]);
$post->save();
// Returns: Saved Post model
// Use when: Creating without using create()
```

---

### 🔄 Updating Records

#### Update Single Record
```php
$post = Post::find(1);
$post->title = 'Updated Title';
$post->save();
// Returns: Updated Post model
// Use when: Updating specific fields
```

#### Mass Update
```php
Post::where('id', 1)->update([
    'title' => 'Updated Title',
    'likes' => 5
]);
// Returns: Number of affected rows
// Use when: Updating multiple records with same values
```

#### Update or Create
```php
Post::updateOrCreate(
    ['title' => 'My Post'], // Search criteria
    ['body' => 'Updated content', 'likes' => 10] // Update/create data
);
// Returns: Post model (updated or created)
// Use when: Upsert operation (update if exists, create if not)
```

#### Increment/Decrement
```php
$post = Post::find(1);
$post->increment('likes'); // Add 1
$post->increment('likes', 5); // Add 5
$post->decrement('likes'); // Subtract 1
// Returns: Updated Post model
// Use when: Updating numeric values
```

---

### 🗑️ Deleting Records

#### Delete Single Record
```php
$post = Post::find(1);
$post->delete();
// Returns: true on success
// Use when: Deleting a specific model instance
```

#### Delete by ID
```php
Post::destroy(1);
Post::destroy([1, 2, 3]); // Multiple IDs
// Returns: Number of deleted records
// Use when: You know the ID(s) to delete
```

#### Delete with Conditions
```php
Post::where('likes', '<', 0)->delete();
// Returns: Number of deleted records
// Use when: Deleting multiple records matching conditions
```

#### Soft Delete (if enabled)
```php
$post->delete(); // Marks as deleted but keeps in database
Post::withTrashed()->get(); // Include soft deleted
Post::onlyTrashed()->get(); // Only soft deleted
$post->restore(); // Restore soft deleted
// Use when: You want to keep deleted records for recovery
```

---

### 🔍 Querying & Filtering

#### Where Clauses
```php
Post::where('title', 'My Post')->get();
Post::where('likes', '>', 10)->get();
Post::where('title', 'LIKE', '%Laravel%')->get();
Post::where('likes', '>=', 5)->where('likes', '<=', 20)->get();
// Returns: Collection of matching records
// Use when: Filtering by conditions
```

#### Or Where
```php
Post::where('title', 'Post 1')
    ->orWhere('title', 'Post 2')
    ->get();
// Returns: Collection matching either condition
// Use when: Multiple OR conditions
```

#### Where In
```php
Post::whereIn('id', [1, 2, 3, 4])->get();
// Returns: Collection with IDs in array
// Use when: Matching multiple values
```

#### Where Null / Where Not Null
```php
Post::whereNull('deleted_at')->get();
Post::whereNotNull('title')->get();
// Returns: Collection based on null checks
// Use when: Checking for null values
```

#### Order By
```php
Post::orderBy('created_at', 'desc')->get();
Post::orderBy('likes', 'desc')->orderBy('title', 'asc')->get();
// Returns: Sorted Collection
// Use when: Sorting results
```

---

### 🔗 Relationships

#### HasMany (One to Many)
```php
// In Post model:
public function comments()
{
    return $this->hasMany(Comment::class);
}

// Usage:
$post = Post::find(1);
$post->comments; // Get all comments for this post
$post->comments()->where('created_at', '>', now())->get(); // Query comments
```

#### BelongsTo (Many to One)
```php
// In Comment model:
public function post()
{
    return $this->belongsTo(Post::class);
}

// Usage:
$comment = Comment::find(1);
$comment->post; // Get the post this comment belongs to
$comment->post->title; // Access post properties
```

#### Eager Loading (Prevent N+1 Problem)
```php
Post::with('comments')->get();
// Returns: Posts with comments already loaded
// Use when: Displaying posts with their comments (much faster!)
```

#### Lazy Eager Loading
```php
$posts = Post::all();
$posts->load('comments');
// Returns: Loads relationships after initial query
// Use when: You already have collection and need relationships
```

---

### 📊 Aggregates & Counting

#### Count
```php
Post::count();
Post::where('likes', '>', 10)->count();
// Returns: Number of records
// Use when: Counting total records or filtered records
```

#### Sum
```php
Post::sum('likes');
// Returns: Sum of all likes
// Use when: Calculating totals
```

#### Average
```php
Post::avg('likes');
// Returns: Average of likes
// Use when: Calculating averages
```

#### Max / Min
```php
Post::max('likes');
Post::min('likes');
// Returns: Maximum or minimum value
// Use when: Finding extremes
```

---

### 🎯 Common Patterns

#### Pagination
```php
Post::paginate(10);
Post::simplePaginate(10);
// Returns: Paginated results
// Use when: Displaying large datasets
// In view: {{ $posts->links() }}
```

#### Chunking (Process Large Datasets)
```php
Post::chunk(100, function ($posts) {
    foreach ($posts as $post) {
        // Process each post
    }
});
// Use when: Processing many records without loading all at once
```

#### Pluck (Get Single Column)
```php
Post::pluck('title');
Post::pluck('title', 'id'); // id as key
// Returns: Collection of values
// Use when: You only need one column
```

#### Select Specific Columns
```php
Post::select('title', 'body')->get();
// Returns: Collection with only specified columns
// Use when: Optimizing queries (don't fetch all columns)
```

---

### 🛡️ Validation & Mass Assignment

#### Mass Assignment Protection
```php
// In Model:
protected $fillable = ['title', 'body', 'likes'];
// OR
protected $guarded = []; // Allow all except specified

// Usage:
Post::create($request->validated()); // Only fillable fields assigned
```

#### Validation in Controller
```php
$validated = $request->validate([
    'title' => 'required|string|max:255',
    'body' => 'required|string',
]);
// Returns: Validated data array
// Throws: ValidationException if validation fails
```

---

### 💡 Tips & Best Practices

1. **Always use `$fillable` or `$guarded`** to protect against mass assignment
2. **Use eager loading** (`with()`) when displaying relationships to avoid N+1 queries
3. **Use route model binding** in controllers: `public function show(Post $post)`
4. **Validate input** before saving to database
5. **Use `findOrFail()`** in routes that expect a record to exist
6. **Use `latest()` or `oldest()`** for chronological ordering
7. **Use `diffForHumans()`** on dates for user-friendly display: `$post->created_at->diffForHumans()`
8. **Use `Str::limit()`** for truncating text: `Str::limit($post->body, 150)`

---

### 🚀 Quick Reference Table

| Task | Method | Example |
|------|--------|---------|
| Get all | `all()` | `Post::all()` |
| Get one | `find()` | `Post::find(1)` |
| Get latest | `latest()->get()` | `Post::latest()->get()` |
| Create | `create()` | `Post::create([...])` |
| Update | `save()` | `$post->save()` |
| Delete | `delete()` | `$post->delete()` |
| Count | `count()` | `Post::count()` |
| Where | `where()->get()` | `Post::where('likes', '>', 10)->get()` |
| With | `with()` | `Post::with('comments')->get()` |
| Paginate | `paginate()` | `Post::paginate(10)` |

---

## 📝 Common Controller Patterns

### Index (List All)
```php
public function index()
{
    $posts = Post::latest()->get();
    return view('posts.index', compact('posts'));
}
```

### Show (Single Record)
```php
public function show(Post $post)
{
    $post->load('comments'); // Eager load comments
    return view('posts.show', compact('post'));
}
```

### Store (Create)
```php
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ]);
    
    $post = Post::create($validated);
    return redirect()->route('posts.show', $post);
}
```

---

Happy coding! 🎉

