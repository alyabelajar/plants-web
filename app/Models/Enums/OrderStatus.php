<?php

namespace App\Models\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum OrderStatus: string implements HasColor, HasLabel

{
    case New = 'New';

    case Processing = 'Processing';

    case Shipped = 'Shipped';

    case Deliver = 'Deliver';

    case Canceled = 'Canceled';

    public function getLabel(): string
    {
        return match ($this) {
            self::New => 'New',
            self::Processing => 'Processing',
            self::Shipped => 'Shipped',
            self::Deliver => 'Delivered',
            self::Canceled => 'Cancelled',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::New => 'gray',
            self::Processing => 'warning',
            self::Shipped, self::Deliver => 'success',
            self::Canceled => 'danger',
        };
    }
}
