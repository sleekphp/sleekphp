# sleekPHP Framework Documentation

**sleekPHP** is a lightweight, beginner-friendly PHP framework inspired by Laravel, designed to simplify web development with an MVC structure, basic ORM, and migration capabilities.

---

## Table of Contents

* [Installation](#installation)
* [Folder Structure](#folder-structure)
* [Core Components](#core-components)
* [Creating Routes](#creating-routes)
* [Creating Controllers](#creating-controllers)
* [Using Views](#using-views)
* [Command Line Interface (CLI)](#command-line-interface-cli)
* [Using Models and ORM](#using-models-and-orm)
* [Database Migrations](#database-migrations)
* [Running the Development Server](#running-the-development-server)
* [Environment Configuration](#environment-configuration)
* [License](#license)

---

## Installation

1. Clone or download the **sleekPHP** repository.

2. Navigate to the project root directory and install dependencies using Composer:

   ```bash
   composer install
   ```

3. Run the following command to set up autoloading for the framework:

   ```bash
   composer dump-autoload
   ```

4. Start a local development server (details provided in [Running the Development Server](#running-the-development-server)).

---

## Folder Structure

Here’s the basic structure of the **sleekPHP** framework:

```plaintext
sleekPHP/
├── app/
│   ├── Controllers/      # Application controllers
│   ├── Models/           # Application models (e.g., User.php)
│   └── Views/            # View files (.php)
├── config/               # Configuration files
├── database/             # Database migrations and seeds
│   ├── migrations/       # Stores migration files
├── public/               # Public files, including index.php
├── routes/               # Route files for web and API
├── storage/              # Cache and logs
├── system/               # Core framework files
│   ├── Core/             # Core components for MVC and ORM
│   ├── Database/         # Handles Schema and Blueprint for migrations
│   └── Console/          # CLI-related functionality
├── .env                  # Environment configuration file
├── composer.json         # Composer dependencies
└── README.md             # Documentation
```

---

## Core Components

### 1. Router

The router handles HTTP requests and directs them to the appropriate controllers. Define routes in the `routes/web.php` and `routes/api.php` files.

### 2. Controller

Controllers are located in `app/Controllers`. Each controller is responsible for handling requests and returning a response, usually by rendering a view.

### 3. View Engine

The view engine is designed to parse custom directives (`@if`, `@foreach`, `@include`) in `.php` files. Views are stored in `app/Views`.

### 4. ORM and Model

The base `Model` class in `system/Core/Model.php` provides a simple ORM, enabling basic CRUD operations, along with querying methods.

### 5. Database Migrations

The `Schema` and `Blueprint` classes in `system/Database` provide migration capabilities, allowing you to create and drop tables.

---

## Creating Routes

Define routes in the `routes/web.php` file. Routes can be mapped to controller methods:

```php
// routes/web.php

use System\Core\Router;

$router = new Router();

$router->get('/home', 'HomeController@index');
```

* **GET** and **POST** routes are supported using `get()` and `post()` methods.
* Use `dispatch()` in `public/index.php` to handle routing based on the URL and request method.

---

## Creating Controllers

Controllers are PHP classes located in `app/Controllers`. Each method in the controller can be mapped to a route.

```php
// app/Controllers/HomeController.php

namespace App\Controllers;

use System\Core\View;

class HomeController {
    public function index() {
        $data = ['name' => 'John Doe', 'tasks' => ['Task 1', 'Task 2']];
        return View::make('home', $data);
    }
}
```

In this example, `HomeController` has an `index` method that loads the `home.php` view with data.

---

## Using Views

View files are stored in `app/Views` and use the `.php` extension. The view engine supports:

* **Variables** with `{{ $variable }}` syntax.
* **Conditional Statements** with `@if`, `@elseif`, `@else`, and `@endif`.
* **Loops** with `@foreach` and `@endforeach`.
* **Includes** with `@include('viewName')`.

Example view file:

```php
<!-- app/Views/home.php -->

<h1>Welcome, {{ $name }}</h1>

@if ($loggedIn)
    <p>You are logged in!</p>
@else
    <p>Please log in.</p>
@endif

<h2>Your Tasks</h2>
@foreach ($tasks as $task)
    <p>{{ $task }}</p>
@endforeach
```

---

## Command Line Interface (CLI)

The `sleek` command file provides several commands for easy project management.

1. **Make Controller**:

   ```bash
   php sleek make:controller ControllerName
   ```

   This command creates a new controller in `app/Controllers`.

2. **Make Model**:

   ```bash
   php sleek make:model ModelName
   ```

   This command creates a new model in `app/Models` with an ORM structure.

3. **Make View**:

   ```bash
   php sleek make:view ViewName
   ```

   This command creates a new view file in `app/Views`.

4. **Make Migration**:

   ```bash
   php sleek make:migration MigrationName
   ```

   Creates a new migration file in `database/migrations`.

5. **Run Migrations**:

   ```bash
   php sleek migrate
   ```

   Runs all migrations, executing each `up` method to apply database changes.

6. **Run Development Server**:

   ```bash
   php sleek run
   ```

   Starts a development server at `http://localhost:8000`.

---

## Using Models and ORM

The base `Model` class provides basic CRUD operations and querying capabilities.

Example usage:

* **Creating a Record**:

  ```php
  User::create([
      'name' => 'John Doe',
      'email' => 'john@example.com',
      'password' => password_hash('secret', PASSWORD_BCRYPT),
  ]);
  ```

* **Finding a Record by ID**:

  ```php
  $user = User::find(1);
  echo $user->name;
  ```

* **Using Where Clauses**:

  ```php
  $users = User::where('email', '=', 'john@example.com')->get();
  ```

* **First Record with Where**:

  ```php
  $user = User::where('email', '=', 'john@example.com')->first();
  ```

---

## Database Migrations

Define migrations to create or modify tables in `database/migrations`.

Example migration to create a `users` table:

```php
<?php

namespace Database\Migrations;

use System\Database\Schema;

class Migration_2024_10_30_093031_CreateUsersTable {
    public function up() {
        Schema::create('users', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
}
```

To apply migrations, run:

```bash
php sleek migrate
```

---

## Running the Development Server

To start the server, run:

```bash
php sleek run
```

The server will start at `http://localhost:8000`.

---

## Environment Configuration

Environment variables are managed through the `.env` file. Common variables include:

```plaintext
APP_NAME=sleekPHP
DB_HOST=localhost
DB_NAME=sleekphp
DB_USER=root
DB_PASS=root
```

Use `getenv('VARIABLE_NAME')` in your code to access these variables.

---

## License

**sleekPHP** is open-source software, and you're free to modify and distribute it.

---

This documentation provides a foundational guide for **sleekPHP**. Let me know if you have further questions or would like more details!
