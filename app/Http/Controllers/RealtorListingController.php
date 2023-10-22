<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ... $request->only([
                'by', 'order'
            ])
        ];

        return inertia(
            'Realtor/Index',
            [
                'filters' => $filters,
                'listings' => Auth::user()
                    ->listings()
                    ->filter($filters)
                    ->paginate(6)
                    ->withQueryString()
            ]
        );
    }

    public function create()
    {
        // $this->authorize('create', Listing::class);
        return inertia('Realtor/Create');
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

        return redirect()->route('realtor.listing.index')
        ->with('success', 'Listing has been created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function edit(Listing $listing)
    {
        return inertia(
            'Realtor/Edit',
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

        return redirect()->route('realtor.listing.index')
        ->with('success', 'Listing has been updated successfully.');
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()
            ->with('success', 'Listing has been deleted successfully.');
    }

    public function restore(Listing $listing)
    {
        $listing->restore();

        return redirect()->back()
            ->with('success', 'Listing has been restored successfully.');
    }
}
