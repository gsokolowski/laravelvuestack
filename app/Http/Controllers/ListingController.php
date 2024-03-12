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
        return inertia('Listing/Create'); // load form for adding listing position
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validate data from POST

        $validated = $request->validate([
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required',
            'code' => 'required',
            'street' => 'required',
            'street_nr' => 'required|min:1|max:1000',
            'price' => 'required|integer|min:1|max:20000000',
        ]);

        // get request from post 

        $listing = new Listing();

        $listing->beds = $request->beds;
        $listing->baths = $request->baths;
        $listing->area = $request->area;
        $listing->city = $request->city;
        $listing->street = $request->street;
        $listing->code = $request->code;
        $listing->street_nr = $request->street_nr;
        $listing->price = $request->price;


        $listing->save();

        // Store store data in database...


        // redirect to diferent page
        //return redirect()->route('listing.index');
        return redirect('/listing')->with('success', 'Listing added successfully!');

        // send alert to user that data has been stored

    }


    public function show(Listing $listing)
    {
        //
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }


    public function edit(Listing $listing)
    {
        //
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }


    public function update(Request $request, Listing $listing)
    {
        //
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Listing was updated!');
    }


    public function destroy(string $id)
    {
        //
    }
}
