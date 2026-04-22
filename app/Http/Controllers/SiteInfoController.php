<?php

namespace App\Http\Controllers;

use App\Models\Site_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SiteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $site = Cache::remember('site', Carbon::now()->addMinutes(60), function (){
            return Site_info::with('links', 'contacts')->get();
        });
        return response()->json($site, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo'=>'required',
            'icon'=>'required',
            'desc'=>'required|string',
            'lat'=>'required|numeric',
            'lng'=>'required|numeric'
        ]);

        $site = Site_info::create([
            'logo'=>$request->logo,
            'icon'=>$request->icon,
            'desc'=>$request->desc,
            'lat'=>$request->lat,
            'lng'=>$request->lng
        ]);
        Cache::flush();
        return response()->json([
            'msg'=>'site info added',
            $site
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Site_info $site_info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site_info $site_info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site_info $site_info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site_info $site_info)
    {
        //
    }
}
