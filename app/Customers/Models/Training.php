<?php

namespace App\Customers\Models;

use App\Enums\TrainingType;
use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Training
 *
 * @package App\Customers\Models
 * @property int $id
 * @property int $type
 * @property string $code
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\TrainingApplication[] $applications
 * @property-read int|null $applications_count
 * @property-read string $training_string
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\TrainingRecord[] $records
 * @property-read int|null $records_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\TrainingTarget[] $targets
 * @property-read int|null $targets_count
 * @method static \Illuminate\Database\Eloquent\Builder|Training newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Training newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Training query()
 * @mixin \Eloquent
 */
class Training extends Model
{
    use UsesTenantConnection;

    /*
     * Accessors and mutators
     */

    /**
     * Training type string
     * @return string
     */
    public function getTrainingStringAttribute(){
        return TrainingType::getDescription((int) $this->type);
    }

    /*
     * Relationships
     */

    /**
     * Training records
     * @return HasMany
     */
    public function records(): HasMany
    {
        return $this->hasMany(TrainingRecord::class);
    }

    /**
     * Training records
     * @return HasMany
     */
    public function applications(): HasMany
    {
        return $this->hasMany(TrainingApplication::class);
    }

    /**
     * Training records
     * @return HasMany
     */
    public function targets(): HasMany
    {
        return $this->hasMany(TrainingTarget::class);
    }
}
