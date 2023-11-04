<?php

namespace App\Models\Enums;


enum UserRole:string
{
    case ADMIN = 'Admin';

    case MANAGEMENT = 'product management';

    case CASHIER = 'cashier';
}
