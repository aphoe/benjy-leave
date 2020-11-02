<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SaasPlan extends Enum
{
    const Lite =   0;
    const Plus =   1;
    const Premium = 2;
}
