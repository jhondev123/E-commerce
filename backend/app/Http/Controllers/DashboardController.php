<?php

namespace App\Http\Controllers;

use App\Application\Services\DashboardService;
use App\Http\Requests\DashboardRequest;

class DashboardController
{
    public function __construct(private DashboardService $service)
    {
        
    }
    public function index(DashboardRequest $request)
    {
        
    }

}
