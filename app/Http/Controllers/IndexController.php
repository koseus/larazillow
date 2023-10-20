<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        // dd(Auth::user());

        // dd(Listing::all());

        // dd(Auth::check());

        return inertia(
            'Index/Index',
            [
                'message' => 'Welcome!'
            ]
        );
    }



    public function display()
    {
        return inertia('Index/Display');
    }
}

?>
