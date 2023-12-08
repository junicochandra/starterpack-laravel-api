<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      title="StarterPack Laravel API",
 *      version="1.0.0",      
 *      description="API Documentation",
 *      @OA\Contact(
 *          email="junicodwi.chandra@gmail.com",
 *          name="Junico Dwi Chandra"
 *      ),
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
