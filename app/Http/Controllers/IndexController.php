<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        // dd(Listing::all());
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
