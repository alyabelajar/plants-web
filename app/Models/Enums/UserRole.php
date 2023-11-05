<?php

namespace App\Models\Enums;

use Filament\Support\Contracts\HasColor;

enum UserRole:string implements HasColor
{
    case ADMIN = 'Admin';

    case MANAGEMENT = 'Product Manager';

    case CASHIER = 'Cashier';

    public function getColor(): string|array|null
    {
        return match($this)
        {
            Self::ADMIN => 'primary',
            Self::MANAGEMENT => 'gray',
            Self::CASHIER => 'info'
        };
    }
}
