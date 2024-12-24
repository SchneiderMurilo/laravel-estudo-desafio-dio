<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function hello($name, Request $request) {
        return response()->json([
            'message' => 'Hello, ' . $name,
            'request' => $request->all()
        ]);
    }
}
