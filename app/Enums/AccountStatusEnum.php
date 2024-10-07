<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

final class AccountStatusEnum extends Enum
{
    const ACTIVE = 'active';
    const SUSPENDED = 'suspended';
    const BANNED = 'banned';
}
