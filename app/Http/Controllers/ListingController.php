<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Listing/Index',
            [
                'listings' => Listing::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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

        Listing::create($request->validate([
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
