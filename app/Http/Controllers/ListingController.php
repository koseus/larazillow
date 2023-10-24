<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware("auth")->except(['index', 'show']);
    // }

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only([
            'priceFrom', 'priceUpTo', 'numBedrooms', 'numBathrooms', 'areaFrom', 'areaUpTo'
        ]);



        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                    ->filter($filters)
                    ->paginate(6)
                    ->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        // if(Auth::user()->cannot('view', $listing))
        // {
        //     abort(403);
        // }

        // $this->authorize('view', $listing);
        $listing->load(['images']);


        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }
}
