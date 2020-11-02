<?php

namespace App\Customers\Models;

use Carbon\Carbon;
use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @package App\Customers\Models
 * @property int $id
 * @property string $surname
 * @property string $first_name
 * @property string $other_name
 * @property string $slug
 * @property string $photo
 * @property string $email
 * @property Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property bool $blocked
 * @property Carbon $last_online_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read \App\Customers\Models\ContactRecord $contactRecord
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\UserDocument[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\EducationRecord[] $educationRecords
 * @property-read int|null $education_records_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\EmergencyContact[] $emergencyContacts
 * @property-read int|null $emergency_contacts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Experience[] $experiences
 * @property-read int|null $experiences_count
 * @property-read string $blocked_status
 * @property-read string $name
 * @property-read string $official_name
 * @property-read string $verified_status
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\UserChangeBuffer[] $handledUserChangeBuffers
 * @property-read int|null $handled_user_change_buffers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\OfficeBranch[] $headBranches
 * @property-read int|null $head_branches_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\BusinessUnit[] $headUnits
 * @property-read int|null $head_units_count
 * @property-read \App\Customers\Models\EmploymentRecord $employmentRecord
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\JobTitle[] $jobTitles
 * @property-read int|null $job_titles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Log[] $logs
 * @property-read int|null $logs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\MedicalRecord[] $medicalRecords
 * @property-read int|null $medical_records_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Notification[] $notificationSender
 * @property-read int|null $notification_sender_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Customers\Models\PersonalRecord $personalRecord
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Relative[] $relatives
 * @property-read int|null $relatives_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\JobTitle[] $reportFrom
 * @property-read int|null $report_from_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\UserBlock[] $userBlockers
 * @property-read int|null $user_blockers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\UserBlock[] $userBlocks
 * @property-read int|null $user_blocks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\UserChangeBuffer[] $userChangeBuffers
 * @property-read int|null $user_change_buffers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Notification[] $userNotifications
 * @property-read int|null $user_notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\UserBlock[] $userUnblocks
 * @property-read int|null $user_unblocks_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customers\Models\User role($roles, $guard = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Customers\Models\User withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\AfricasTalkingReport[] $africasTalkingReports
 * @property-read int|null $africas_talking_reports_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\CertificationRecord[] $certificationRecords
 * @property-read int|null $certification_records_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\CertificationTarget[] $certificationTargets
 * @property-read int|null $certification_targets_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\JobTitleRecord[] $jobTitleRecords
 * @property-read int|null $job_title_records_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\TrainingApplication[] $trainingApplications
 * @property-read int|null $training_applications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\TrainingRecord[] $trainingRecords
 * @property-read int|null $training_records_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\TrainingTarget[] $trainingTarget
 * @property-read int|null $training_target_count
 * @method static \Illuminate\Database\Eloquent\Builder|User alphabeticOrder()
 * @method static \Illuminate\Database\Eloquent\Builder|User bySlug($slug)
 * @method static \Illuminate\Database\Eloquent\Builder|User currentStaff()
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Leave[] $leave
 * @property-read int|null $leave_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\LeaveApproval[] $leaveApprovals
 * @property-read int|null $leave_approvals_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Leave[] $leaveHr
 * @property-read int|null $leave_hr_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Leave[] $leaveReliever
 * @property-read int|null $leave_reliever_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\LeaveResumption[] $leaveResumptionSupervision
 * @property-read int|null $leave_resumption_supervision_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customers\Models\Leave[] $leaveSupervision
 * @property-read int|null $leave_supervision_count
 */
class User extends \App\User
{
    use UsesTenantConnection, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname', 'first_name', 'other_name', 'email', 'password',
    ];

    protected $perPage = 100;

    /*
     * Scopes
     */

    /**
     * Sort users by alphabetic order
     * @param $query
     * @return mixed
     */
    public function scopeAlphabeticOrder($query)
    {
        return $query->orderBy('surname')
            ->orderBy('first_name')
            ->orderBy('other_name');
    }

    /**
     * Check if user is a current staff
     * @param $query
     * @return mixed
     */
    public function scopeCurrentStaff($query)
    {
        return $query->whereHas('employmentRecord', function ($query){
                $query->where('exited', '>', now())
                    ->orWhere('exited', null);
            });
    }

    public function scopeBySlug($query, $slug){
        return $query->where('slug', $slug);
    }

    /**
     * Users allowed on app [based on company subscription plan]
     * @param $query
     * @return mixed
     */
    public function scopeAllowed($query){
        return $query->where('allowed', true);
    }

    /*
     * Accessors and mutators
     */

    /**
     * Compose user name
     * @return string
     */
    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->surname}";
    }

    /**
     * String display of user blocked status
     * @return string
     */
    public function getBlockedStatusAttribute(): string
    {
        return $this->blocked ? 'Yes' : 'No';
    }

    /**
     * Compose user's name in official format
     * @return string
     */
    public function getOfficialNameAttribute(): string
    {
        return trim(strtoupper($this->surname) . ", {$this->first_name} {$this->other_name}");
    }

    /**
     * Format surname before saving
     * @param $value
     */
    public function setSurnameAttribute($value): void
    {
        $this->attributes['surname'] = ucwords($value);
    }

    /**
     * Format first name before saving
     * @param $value
     */
    public function setFirstNameAttribute($value): void
    {
        $this->attributes['first_name'] = ucwords($value);
    }

    /**
     * Format other name before saving
     * @param $value
     */
    public function setOtherNameAttribute($value): void
    {
        $this->attributes['other_name'] = ucwords($value);
    }

    /*
     * Relationships
     */

    /**
     * User blocks of this user
     * @return HasMany
     */
    public function userBlocks(): HasMany
    {
        return $this->hasMany(UserBlock::class);
    }

    /**
     * Models blocked by this user
     * @return HasMany
     */
    public function userBlockers(): HasMany
    {
        return $this->hasMany(UserBlock::class, 'blocker_id', 'id');
    }

    /**
     * Models unblocked by this user
     * @return HasMany
     */
    public function userUnblocks(): HasMany
    {
        return $this->hasMany(UserBlock::class, 'blocker_id', 'id');
    }

    /**
     * User's personal record
     * @return HasOne
     */
    public function personalRecord(): HasOne
    {
        return $this->hasOne(PersonalRecord::class);
    }

    /**
     * Relatives of user
     * @return HasMany
     */
    public function relatives(): HasMany
    {
        return $this->hasMany(Relative::class);
    }

    /**
     * Contact record of user
     * @return HasOne
     */
    public function contactRecord(): HasOne
    {
        return $this->hasOne(ContactRecord::class);
    }

    /**
     * User Employment record
     * @return HasOne
     */
    public function employmentRecord(): HasOne
    {
        return $this->hasOne(EmploymentRecord::class);
    }

    /**
     * Emergency contacts of user
     * @return HasMany
     */
    public function emergencyContacts(): HasMany
    {
        return $this->HasMany(EmergencyContact::class);
    }

    /**
     * User documents
     * @return HasMany
     */
    public function documents(): HasMany
    {
        return $this->hasMany(UserDocument::class);
    }

    /**
     * User's medical records
     * @return HasMany
     */
    public function medicalRecords(): HasMany
    {
        return $this->hasMany(MedicalRecord::class);
    }

    /**
     * User's work experiences
     * @return HasMany
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * Educational records  of user
     * @return HasMany
     */
    public function educationRecords(): HasMany
    {
        return $this->hasMany(EducationRecord::class);
    }

    /**
     * Job title of this user
     * @return HasMany
     */
    public function jobTitleRecords(): HasMany
    {
        return $this->hasMany(JobTitleRecord::class);
    }

    /**
     * Staff who reports to this user
     * @return HasMany
     */
    public function reportFroms(): HasMany
    {
        return $this->hasMany(JobTitleRecord::class, 'reports_to', 'id');
    }

    /**
     * Units a user heads
     * @return HasMany
     */
    public function headUnits(): HasMany
    {
        return $this->hasMany(BusinessUnit::class);
    }

    /**
     * Branches a user is heading
     * @return HasMany
     */
    public function headBranches(): HasMany
    {
        return $this->hasMany(OfficeBranch::class);
    }

    /**
     * Application logs of a user
     * @return HasMany
     */
    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }

    /**
     * User change buffers by this user
     * @return HasMany
     */
    public function userChangeBuffers(): HasMany
    {
        return $this->hasMany(UserChangeBuffer::class);
    }

    /**
     * User change buffers accepted by this user
     * @return HasMany
     */
    public function handledUserChangeBuffers(): HasMany
    {
        return $this->hasMany(UserChangeBuffer::class, 'handler');
    }

    /**
     * AfricasTalk Reports of user
     * @return HasMany
     */
    public function africasTalkingReports(): HasMany
    {
        return $this->hasMany(AfricasTalkingReport::class);
    }

    /**
     * User's certification record
     * @return HasMany
     */
    public function certificationRecords(): HasMany
    {
        return $this->hasMany(CertificationRecord::class);
    }

    /**
     * User's certification targets
     * @return HasMany
     */
    public function certificationTargets(): HasMany
    {
        return $this->hasMany(CertificationTarget::class);
    }

    /**
     * Training records of user
     * @return HasMany
     */
    public function trainingRecords(): HasMany
    {
        return $this->hasMany(TrainingRecord::class);
    }

    /**
     * Training records of user
     * @return HasMany
     */
    public function trainingApplications(): HasMany
    {
        return $this->hasMany(TrainingApplication::class);
    }

    /**
     * Training records of user
     * @return HasMany
     */
    public function trainingTarget(): HasMany
    {
        return $this->hasMany(TrainingTarget::class);
    }

    /**
     * Leave by user
     * @return HasMany
     */
    public function leaves(): HasMany
    {
        return $this->hasMany(Leave::class);
    }

    /**
     * Leaves attended to as a supervisor
     * @return HasMany
     */
    public function leaveSupervisions(): HasMany
    {
        return $this->hasMany(Leave::class, 'supervisor_id');
    }

    /**
     * Leaves attended to as a HR person
     * @return HasMany
     */
    public function leaveHr(): HasMany
    {
        return $this->hasMany(Leave::class, 'hr_id');
    }

    /**
     * All the leave applications user relieved staff going on leave
     * @return HasMany
     */
    public function leaveRelievers(): HasMany
    {
        return $this->hasMany(Leave::class, 'reliever_id');
    }

    /**
     * Leave approvals
     * @return HasMany
     */
    public function leaveApprovals(): HasMany
    {
        return $this->hasMany(LeaveApproval::class, 'supervisor_id');
    }

    /**
     * Leaves attended to as a supervisor
     * @return HasMany
     */
    public function leaveResumptionSupervisions(): HasMany
    {
        return $this->hasMany(LeaveResumption::class, 'supervisor_id');
    }
}
