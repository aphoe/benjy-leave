<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LogType extends Enum
{
    const Initiate =   0;
    const Create =   1;
    const Read = 2;
    const Update = 3;
    const Delete = 4;
    const Process = 5;
}
