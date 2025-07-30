<?php

namespace App\Http\Controllers;


/**
 * @OA\SecurityScheme(
 *   securityScheme="apiToken",
 *   type="apiKey",
 *   in="header",
 *   name="Authorization"
 * )
 * @OA\Info(
 *     title="Eyehealth API",
 *     version="1.0.0",
 *     description="Documentation API Eyehealth."
 * )
 * 
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Local Server"
 * )
 */
abstract class Controller
{
    //
}
