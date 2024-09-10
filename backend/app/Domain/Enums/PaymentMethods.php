<?php

namespace App\Domain\Enums;

enum PaymentMethods: string
{
    case CREDIT_CARD = 'CREDIT_CARD';
    case DEBIT_CARD = 'DEBIT_CARD';
    case PIX = 'PIX';
    case MONEY = 'MONEY';
}
