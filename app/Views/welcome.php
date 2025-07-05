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
            --muted: #666;
            --white: #fff;
        }

        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, #eef2ff, #fefefe);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
        }

        .text-white {
            color: var(--white) !important;
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
        }

        .logo span {
            color: var(--accent);
        }

        .links {
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .links a {
            text-decoration: none;
            color: var(--text);
            margin: 0 10px;
            font-size: 16px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .links svg {
            width: 18px;
            height: 18px;
            fill: var(--text);
        }

        .btn {
            padding: 10px 20px;
            background: var(--primary);
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn:hover {
            background: #265df2;
        }

        h1 {
            font-size: 38px;
            margin-bottom: 15px;
        }

        p {
            font-size: 18px;
            color: var(--muted);
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
            padding: 6px 10px;
            border-radius: 5px;
            color: var(--accent);
            font-size: 15px;
            display: inline-block;
        }

        .footer {
            margin-top: 60px;
            font-size: 14px;
            color: #aaa;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="logo">sleek<span>PHP</span></div>

        <div class="links">
            <a href="https://github.com/sleekphp/sleekphp" target="_blank">
                <svg viewBox="0 0 16 16"><path fill-rule="evenodd"
                    d="M8 0C3.58 0 0 3.58 0 8a8 8 0 005.47 7.59c.4.07.55-.17.55-.38 
                    0-.19-.01-.82-.01-1.49-2 .37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52
                    0-.53.63-.01 1.08.58 1.23.82.72 1.2 1.87.86 2.33.66.07-.52.28-.86.5-1.06-1.78-.2-3.64-.89-3.64-3.95
                    0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82a7.54 
                    7.54 0 012-.27c.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 
                    2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 
                    2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 
                    1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 
                    8.01 0 0016 8c0-4.42-3.58-8-8-8z"/></svg>
                GitHub
            </a>
            <a href="https://github.com/sleekphp/sleekphp/blob/main/README.md" class="btn text-white" target="_blank">📘 Documentation</a>
        </div>

        <h1>🚀 Welcome to sleekPHP</h1>
        <p>A lightweight and beginner-friendly PHP framework with MVC, routing, migration, and ORM support.</p>

        <code>Route::get('/', 'WelcomeController@index');</code>

        <div class="features">
            <div class="feature">
                <h3>🧭 MVC Architecture</h3>
                <p>Organize your app into Models, Views, and Controllers — clean and scalable.</p>
            </div>
            <div class="feature">
                <h3>⚡ Blade-like Views</h3>
                <p>Use Laravel-style directives: <code>@if</code>, <code>@foreach</code>, <code>{{ '$var' }}</code>.</p>
            </div>
            <div class="feature">
                <h3>🧰 Easy CLI Commands</h3>
                <p>Generate files with <code>php sleek make:controller Name</code> and more.</p>
            </div>
            <div class="feature">
                <h3>🗄️ Migrations</h3>
                <p>Version-controlled schema management using simple migration classes.</p>
            </div>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} sleekPHP — Built with ❤️ in PHP.
        </div>
    </div>

</body>
</html>
