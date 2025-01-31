<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    // Esto son traits que se importan para que el controlador tenga las funciones de AuthorizesRequests y ValidatesRequests
    use AuthorizesRequests, ValidatesRequests;
}
