<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer)
    {
        // Accept the selected offer
        $offer->update(['accepted_at' => now()]);

        // Reject all other offers
        $offer->listing->offers()->except($offer)
            ->update(['rejected_at'=> now()]);

        return redirect()->back()
            ->with(
                'success',
                "Offer #{$offer->id} has been accepted, all other offers have been rejected."
            );
    }
}
