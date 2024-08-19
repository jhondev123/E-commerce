<?php

namespace App\Domain\Enums;

enum PaymentStatusEnum: int
{
    case Pending = 1;
    case AwaitingApproval = 2;
    case Completed = 3;
    case Failed = 4;
}
