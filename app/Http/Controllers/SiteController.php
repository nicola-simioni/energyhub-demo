<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SiteResource;
use App\Models\Site;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $sites = $user->sites;

        // return response()->json(SiteResource::collection($sites));
        return SiteResource::collection($sites);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        $site = Site::create([
            'name' => $request->name,
            'location' => $request->location,
            'user_id' => $request->user()->id
        ]);
        
        return new SiteResource($site);    
    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site, Request $request)
    {
        if ($site->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return new SiteResource($site);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'location' => 'nullable|string|max:255',
        ]);

        if ($site->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $site->update($request->only(['name', 'location']));
        
        return new SiteResource($site);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site, Request $request)
    {
        if ($site->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }    

        $site->delete();
        return response()->noContent();
    }
}
