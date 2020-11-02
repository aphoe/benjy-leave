<h6 class="text-uppercase mt-5">
    Employment Record
</h6>

<div class="profile-field">
    <div class="label">Employment type</div>
    <div class="data">{{ is_object($user->employmentRecord->employment_type) ? $user->employmentRecord->employment_type->name : '--' }}</div>
</div>

<div class="profile-field">
    <div class="label">Employment Number</div>
    <div class="data">{{ $user->employmentRecord->employee_number }}</div>
</div>

<div class="profile-field">
    <div class="label">Employed</div>
    <div class="data">{{ $user->employmentRecord->employee_status_text }}</div>
</div>

<div class="profile-field">
    <div class="label">Date employed</div>
    <div class="data">{{ $user->employmentRecord->hired->format('jS F, Y') }}</div>
</div>

<div class="profile-field">
    <div class="label">Date exited</div>
    <div class="data">{{ $user->employmentRecord->exited !== null ? $user->employmentRecord->exited->format('jS F, Y') : '' }}</div>
</div>

