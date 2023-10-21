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

        $query = Listing::orderByDesc('created_at');

        if($filters['priceFrom'] ?? false){
            $query->where('price', '>=', $filters['priceFrom']);
        }

        if($filters['priceUpTo'] ?? false){
            $query->where('price', '<=', $filters['priceUpTo']);
        }

        if($filters['numBedrooms'] ?? false){
            $query->where('bedrooms', $filters['numBedrooms']);
        }

        if($filters['numBathrooms'] ?? false){
            $query->where('bathrooms', $filters['numBathrooms']);
        }

        if($filters['areaFrom'] ?? false){
            $query->where('area', '>=', $filters['areaFrom']);
        }

        if($filters['areaUpTo'] ?? false){
            $query->where('area', '<=', $filters['areaUpTo']);
        }



        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => $query->paginate(6)
                    ->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $this->authorize('create', Listing::class);
        return inertia('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $listing = new Listing();
        // $listing->bedrooms = $request->bedrooms;

        // $listing->save();
        $request->user()->listings()->create(
            $request->validate([
                'bedrooms' => 'required | integer | min:0 | max:20',
                'bathrooms' => 'required | integer | min:0 | max:20',
                'area' => 'required | integer | min:50 | max:1500',
                'city' => 'required',
                'zipcode' => 'required',
                'street' => 'required',
                'street_num' => 'required | integer | min:0 | max:1000',
                'price' => 'required | integer | min:1 | max:20000000'
            ])
        );

        return redirect()->route('listing.index')
        ->with('success', 'Listing has been created successfully.');
    }

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



        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }


    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'bedrooms' => 'required | integer | min:0 | max:20',
                'bathrooms' => 'required | integer | min:0 | max:20',
                'area' => 'required | integer | min:50 | max:1500',
                'city' => 'required',
                'zipcode' => 'required',
                'street' => 'required',
                'street_num' => 'required | integer | min:0 | max:1000',
                'price' => 'required | integer | min:1 | max:20000000'
            ])
        );

        return redirect()->route('listing.index')
        ->with('success', 'Listing has been updated successfully.');
    }


    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()
        ->with('success', 'Listing has been deleted successfully.');
    }
}
