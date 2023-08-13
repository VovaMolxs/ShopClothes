<?php

namespace App\Enums;

enum PaymentStatusEnum
{
    public const CREATE = 'CREATE';
    public const FAILED = 'FAILED';
    public const CONFIRMED = 'CONFIRMED';
}
