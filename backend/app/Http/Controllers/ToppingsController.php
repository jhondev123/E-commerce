<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ToppingRequest;
use App\Application\Services\ToppingsService;

class ToppingsController extends Controller
{
    public function __construct(private ToppingsService $toppingService) {}
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToppingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ToppingRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
