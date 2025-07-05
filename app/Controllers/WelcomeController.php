<?php

namespace App\Controllers;

use System\Core\View;

class WelcomeController {
    public function index() {
         return View::make('welcome', [
            'title' => 'Welcome to sleekPHP'
        ]);
    }
}
