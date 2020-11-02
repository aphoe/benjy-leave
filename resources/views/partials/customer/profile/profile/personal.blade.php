<h6 class="text-uppercase mt-5">
    Personal Information
    @if(\Auth::id() === $user->id)
        <a href="{{ url('profile/personal-record') }}" class=" mb-1 float-right">
            <span class="far fa-edit"></span> Edit
        </a>
        <div class="clearfix"></div>
    @endif
</h6>

@if(!$user->personalRecord->updated && \Auth::id() === $user->id)
    {!! htmlBackAlert('info', 'Your personal records need update') !!}
@endif

@if($user->personalRecord->identification_approved || \Auth::id() === $user->id || \Auth::user()->can('staff-admin'))
<div class="profile-field">
    <img src="{{ personalIdUrl($user->personalRecord) }}" alt="{{ $user->official_name }}" data-lity="{{ personalIdUrl($user->personalRecord) }}">

    @if(\Auth::id() === $user->id || \Auth::user()->can('staff-admin'))
    <div class="label">ID Approved</div>
    <div class="data">
        {!! enumStatusField(App\Enums\AcceptStatus::class, $user->personalRecord->identification_approved) !!}
    </div>
    @endif
</div>
@endif

@if($user->personalRecord->gender)
    <div class="profile-field">
        <div class="label">Gender</div>
        <div class="data">{{ $user->personalRecord->gender_desc }}</div>
    </div>
@endif

@if($user->personalRecord->date_of_birth)
    @if($user->personalRecord->dob_public || \Auth::id() === $user->id || \Auth::user()->can('staff-admin'))
    <div class="profile-field">
        <div class="label">Date of birth</div>
        <div class="data">{{ $user->personalRecord->date_of_birth->format('jS F, Y') }}</div>
    </div>
    @endif
@endif

<div class="profile-field">
    <div class="label">DOB is public</div>
    <div class="data">{{ $user->personalRecord->dob_public_status }}</div>
</div>

@if($user->personalRecord->marital_status_string)
    <div class="profile-field">
        <div class="label">Marital Status</div>
        <div class="data">{{ $user->personalRecord->marital_status_desc }}</div>
    </div>
@endif
