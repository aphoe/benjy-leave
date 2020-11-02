<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class NotificationType extends Enum
{
    const User =   0;
    const Info =   1;
    /*const Warning = 2;
    const Danger = 3;
    const Success = 4;
    const Primary = 5;
    const Secondary = 6;*/
}
