<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application\Services\GroupsServices;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private GroupsServices $groupsServices) {}
    public function index()
    {
        $groups = $this->groupsServices->getAllGroups();
        return response()->json($groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $groupData = $this->groupsServices->createGroup($request);
        return response()->json([
            'message' => 'Group created successfully',
            'data' => $groupData,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = $this->groupsServices->getGroupById($id);
        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $groupData = $this->groupsServices->update($request, $id);

        return response()->json([
            'message' => 'Group updated successfully',
            'data' => $groupData,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $deleted = $this->groupsServices->deleteGroup($id);
        if (!$deleted) {
            return response()->json(['error' => 'Could not delete group'], 500);
        }
        return response()->json(['message' => 'Group deleted successfully'], 200);
    }
}
