<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LeaveNoteType extends Enum
{
    const Handover =   0;
    const Returning =   1;
}
