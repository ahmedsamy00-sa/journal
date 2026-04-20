<?php

namespace App\Http\Controllers;

use App\Models\Site_contact;
use App\Models\Site_info;
use Illuminate\Http\Request;

class SiteContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Site_contact::all();
        return response()->json($contact, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon'=>'required|string',
            'type'=>'required|string',
            'value'=>'required|string',
            'site_id'=>'required|exists:site_infos,id'
        ]);
        
        $contact = Site_contact::create([
            'icon'=>$request->icon,
            'type'=>$request->type,
            'value'=>$request->value,
            'site_id'=>$request->site_id,
        ]);

        return response()->json([
            'msg'=>'contact added',
            $contact
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Site_contact $site_contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site_contact $site_contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site_contact $site_contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site_contact $site_contact)
    {
        //
    }
}
