# 🤫 The Whisper Gallery: Developer Workshop

Welcome to **The Whisper Gallery**. This is an anonymous forum where anyone can post "Whispers" and others can comment. No accounts, no passwords, just code.

## 🚀 Getting Started

1. **Clone the repo:** `git clone  https://github.com/Is-2m/laravel-anon-formu-workshop.git`
2. **Install dependencies:** `composer install`
3. **Setup Environment:** `cp .env.example .env`
4. **Generate Key:** `php artisan key:generate`
5. **Migrate & Seed:** `php artisan migrate:fresh --seed`
6. **Run it:** `php artisan serve`

---

## 🛠 Your Mission: "Wiring the Gallery"

The views are currently **Static HTML**. Your job is to replace the HTML comments (like ``) with real Laravel **Blade** logic.

### 1. The Controller "Cheat Sheet"

In your `PostController.php`, you need to fetch the data.

* **To get all posts:** `$posts = Post::latest()->get();`
* **To find one post:** `$post = Post::findOrFail($id);`
* **To save data:** `Post::create($request->all());`

### 2. The Blade "Cheat Sheet"

Replace the placeholders in the `.blade.php` files using these tools:

| Task | Blade Directive |
| --- | --- |
| **Display a Variable** | `{{ $post->title }}` |
| **Loop through items** | `@foreach($posts as $post) ... @endforeach` |
| **Check a condition** | `@if($posts->isEmpty()) ... @endif` |
| **Form Security** | `@csrf` (Always put this inside your `<form>`) |
| **Method Spoofing** | `@method('DELETE')` (For delete buttons) |

---

## 🗺 The Map (Routes)

Run `php artisan route:list` to see your map. Here are the main routes you need to handle:

* `GET /posts` -> `index()` (The Gallery)
* `GET /posts/create` -> `create()` (The Form)
* `POST /posts` -> `store()` (Save the Whisper)
* `GET /posts/{id}` -> `show()` (Read one Whisper + Comments)

---

## 🚢 The "Final Boss": Deployment to Render.com

When your app works locally, it's time to go live.

1. **Push your code** to your own GitHub repository.
2. **Create a Web Service** on [Render.com](https://render.com).
3. **Select Docker** as the runtime.
4. **Add Environment Variables**:
* `APP_KEY`: (Copy from your `.env`)
* `DB_CONNECTION`: `sqlite` (Easiest for this workshop)
* `DB_DATABASE`: `/var/www/database/database.sqlite`


5. **Deploy!** Watch the logs to see your container come to life.

---

## 🆘 Troubleshooting

* **404 Not Found?** Check your `web.php` routes.
* **MassAssignmentException?** Did you add `$fillable` to your Model?
* **CSS not working?** Make sure the Tailwind CDN link is in your `<head>`.
* **White screen on Render?** Check the "Logs" tab in the Render dashboard.

---

### 💡 Pro Tip

Use `php artisan tinker` to test your database queries in the terminal before you write them in the Controller!
