<?php
namespace App\Controller;

use Core\View;



class HomeController 
{
    public function index()
    {        
        return View::redirect('/users');
    }
}
