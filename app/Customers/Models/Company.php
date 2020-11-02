<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Company
 *
 * @package App\Customers\Models
 * @property int $id
 * @property string $name
 * @property string $short_form
 * @property string $industry
 * @property string $logo
 * @property string $slogan
 * @property string $vision
 * @property string $mission
 * @property Carbon $founded
 * @property string $url
 * @property string $email
 * @property string $no_reply_email
 * @property string $phone
 * @property int $user_one
 * @property bool $updated
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\Company query()
 * @mixin \Eloquent
 * @property-read \App\Customers\Models\User $userOne
 */
class Company extends Model
{
    use UsesTenantConnection;

    protected $dates = [
        'founded',
    ];

    /*
     * Relationships
     */

    /**
     * Company's user one
     * @return BelongsTo
     */
    public function userOne(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_one');
    }
}
