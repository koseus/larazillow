<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\ListingImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        $listing->load(['images']);
        return inertia(
            'Realtor/ListingImage/Create',
            ['listing' => $listing]
        );
    }

    public function store(Listing $listing, Request $request)
    {
        if( $request->hasFile('images') ) {
            $request->validate(
                [
                    'images.*' => 'mimes:jpg,png,jpeg|max:2000'
                ],
                [
                    'images.*.mimes' => 'The file should be in of the following formats: jpg, jpeg, png'
                ]
            );

            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');

                $listing->images()->save(new ListingImage([
                    'filename' => $path
                ]));
            }
        }

        return redirect()->back()->with('success', 'Images have been uploaded successfully.');
    }

    public function destroy($listing, ListingImage $image)
    {
        Storage::disk('public')->delete($image->filename);
        $image->delete();

        return redirect()->back()->with('success','Image has been deleted successfully.');
    }
}
