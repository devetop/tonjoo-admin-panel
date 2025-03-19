<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AvailableSites;
use Illuminate\Http\Request;

class AvailableSitesController extends Controller
{
    public function __construct(
        private AvailableSites $availableSites,
    ) {
    }

    public function index(Request $request)
    {
        authorize('available-sites');

        $available_sites = $this->availableSites->paginate($request->perPage ?? 10);

        return inertia('Option/AvailableSites', compact('available_sites'));
    }

    public function create()
    {
        authorize('available-sites');

        return inertia('Option/AvailableSitesCreate');
    }

    public function store(Request $request)
    {
        authorize('available-sites');

        $request->validate([
            'name' => ['required', 'string'],
            'base_url' => ['required', 'string', 'unique:available_sites,base_url'],
            'is_cors_allowed' => ['required', 'boolean'],
        ]);

        $this->availableSites->fill($request->except('token'));
        $isSuccess = $this->availableSites->save();

        if ($isSuccess) {
            return to_route('cms.option.available-sites.edit', $this->availableSites->id)->with('success', 'Available sites added successfully.');
        } else {
            return back()->with('error', 'Available sites failed to add.');
        }
    }

    public function edit(Request $request, $id)
    {
        authorize('available-sites');

        $data = $this->availableSites->findOrFail($id);
        return inertia('Option/AvailableSitesEdit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        authorize('available-sites');
        
        $request->validate([
            'name' => ['required', 'string'],
            'base_url' => ['required', 'string', 'unique:available_sites,base_url,' . ((string) $id)],
            'is_cors_allowed' => ['required', 'boolean'],
        ]);

        $data = $this->availableSites->findOrFail($id);
        $data->fill($request->only('name', 'base_url', 'is_cors_allowed'));
        $isSuccess = $data->save();
     
        if ($isSuccess) {
            return to_route('cms.option.available-sites.index')->with('success', 'Available sites updated successfully.');
        } else {
            return back()->with('error', 'Available sites failed to update.');
        }
    }

    public function destroy(Request $request, $id)
    {
        $data = $this->availableSites->findOrFail($id);
        $data->tokens()->delete();
        $data->delete();

        return to_route('cms.option.available-sites.index')->with('success', 'Available sites deleted successfully.');
    }

    public function generateToken(Request $request)
    {
        authorize('available-sites');

        $data = $this->availableSites->findOrFail($request->id);
        $data->tokens()->delete();
        $token = $data->createToken('app')->plainTextToken;
        $data->token = $token;
        $data->save();

        if ($token) {
            return response()->json([
                'success' => true,
                'data' => compact('token')
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function deleteToken(Request $request)
    {
        authorize('available-sites');

        $data = $this->availableSites->findOrFail($request->id);
        $data->tokens()->delete();
        $data->token = '';
        $data->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
