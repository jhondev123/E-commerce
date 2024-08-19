<?php

namespace App\Domain\Enums;

enum OrderStatusEnum:int
{
    case RECIVED = 1;
    case IN_PREPARATION = 2;
    case IN_TRANSIT = 3;
    case DELIVERED = 4;
    case CANCELED = 5;
}
