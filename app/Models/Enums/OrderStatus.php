<?php

namespace App\Models\Enums;

use Filament\Support\Contracts\HasColor;

enum OrderStatus: string
{
    case NEW = 'New';

    case PROCCESSING = 'Processing';

    case SHIPPED = 'Shipped';

    case DELIVER = 'Deliver';

    case CANCELED = 'Canceled';
}
