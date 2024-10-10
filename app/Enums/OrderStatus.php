<?php

namespace App\Enums;

use Closure;
use Spatie\Enum\Laravel\Enum;

/**
 * @method static self PAYMENT_PENDING()
 * @method static self READY_FOR_DELIVERY()
 * @method static self PAYMENT_FAILED()
 * @method static self CANCELLED()
 * @method static self DELIVERED()
 */
final class OrderStatus extends Enum
{
    protected static function labels(): Closure
    {
        return function (string $name): string|int {
            return ucwords(strtolower(str_replace("_", " ", $name)));
        };
    }
}
