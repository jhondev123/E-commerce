<?php

namespace App\Application\Services;

use App\Infra\Repositories\DashboardRepository;

class DashboardService
{
    public function __construct(private DashboardRepository $repository)
    {
        
    }

    public function getSales()
    {
        
    }
    public function getLatestOrders()
    {
        // exibir os 5 ultimos pedidos
    }

    public function getOrderTotals()
    {
        // total pendentes, total entregues, total cancelados
    }
    public function getPendingOrders()
    {
        
    }
    public function getDeliveredOrders()
    {
        
    }
    public function getCancelledOrders()
    {
        
    }


}
