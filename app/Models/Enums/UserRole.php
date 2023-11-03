<?php

namespace App\Models\Enums;


enum UserRole:string
{
    case ADMIN = 'admin';

    case MANAGEMENT = 'product management';

    case CASHIER = 'cashier';
}
