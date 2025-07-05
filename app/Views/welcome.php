<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --primary: #3a86ff;
            --accent: #8338ec;
            --bg: #f9f9ff;
            --text: #2d2d2d;
            --muted: #888;
        }

        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #eef2ff, #fefefe);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
        }

        .container {
            max-width: 960px;
            margin: auto;
            padding: 80px 20px;
            text-align: center;
        }

        .logo {
            font-size: 60px;
            font-weight: 900;
            letter-spacing: 2px;
            color: var(--primary);
            margin-bottom: 10px;
            animation: slideDown 1s ease-out;
        }

        .logo span {
            color: var(--accent);
        }

        @keyframes slideDown {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        h1 {
            font-size: 40px;
            margin-bottom: 15px;
        }

        p {
            font-size: 18px;
            color: var(--muted);
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .feature {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }

        .feature:hover {
            transform: translateY(-5px);
        }

        .feature h3 {
            color: var(--accent);
            font-size: 20px;
            margin-bottom: 10px;
        }

        code {
            background: #f4f4f4;
            padding: 5px 10px;
            border-radius: 5px;
            color: var(--accent);
            font-size: 15px;
            display: inline-block;
            margin: 10px 0;
        }

        .footer {
            margin-top: 60px;
            font-size: 14px;
            color: #aaa;
        }

        .btn {
            padding: 10px 20px;
            background: var(--primary);
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #265df2;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="logo">sleek<span>PHP</span></div>
        <h1>Welcome to sleekPHP</h1>
        <p>A lightweight and beginner-friendly PHP framework with MVC, routing, migration, and a simple ORM system.</p>

        <code>Route::get('/', 'WelcomeController@index');</code>

        <div class="features">
            <div class="feature">
                <h3>🧭 MVC Architecture</h3>
                <p>Organize your app into Models, Views, and Controllers — clean and scalable.</p>
            </div>
            <div class="feature">
                <h3>⚡ Blade-like Views</h3>
                <p>Use Laravel-style directives: <code>@if</code>, <code>@foreach</code>, <code>{{ '$var' }}</code>, and more.</p>
            </div>
            <div class="feature">
                <h3>🧰 Easy Commands</h3>
                <p>Create controllers, models, and migrations using <code>php sleek make:*</code>.</p>
            </div>
            <div class="feature">
                <h3>🗄️ Migrations</h3>
                <p>Define and run your schema changes with versioned migration classes.</p>
            </div>
        </div>

        <a class="btn" href="https://github.com/sleekphp/sleekphp/blob/main/README.md" target="_blank">View Documentation</a>

        <div class="footer">
            &copy; {{ date('Y') }} sleekPHP. Crafted with ❤️ in PHP.
        </div>
    </div>

</body>
</html>
