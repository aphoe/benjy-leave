<h6 class="text-uppercase mt-5">
    Contact Information
    @if(\Auth::id() === $user->id)
        <a href="{{ url('profile/contact') }}" class="mb-1 float-right">
            <span class="far fa-edit"></span> Edit
        </a>
        <div class="clearfix"></div>
    @endif
</h6>

@if(!$user->contactRecord->updated && \Auth::id() === $user->id)
    {!! htmlBackAlert('info', 'Your contact information need update') !!}
@endif

@if($user->contactRecord->phone)
    <div class="profile-field">
        <div class="label">Phone no</div>
        <div class="data">{{ $user->contactRecord->phone }}</div>
    </div>
@endif

@if($user->contactRecord->phone_2)
    <div class="profile-field">
        <div class="label">Phone 2</div>
        <div class="data">{{ $user->contactRecord->phone_2 }}</div>
    </div>
@endif

@if($user->contactRecord->phone_3)
    <div class="profile-field">
        <div class="label">Phone 3</div>
        <div class="data">{{ $user->contactRecord->phone_3 }}</div>
    </div>
@endif

@if($user->contactRecord->address)
    <div class="profile-field">
        <div class="label">Address</div>
        <div class="data">{{ $user->contactRecord->address }}</div>
    </div>
@endif

@if($user->contactRecord->landmark)
    <div class="profile-field">
        <div class="label">Landmark</div>
        <div class="data">{{ $user->contactRecord->landmark }}</div>
    </div>
@endif

@if($user->contactRecord->city)
    <div class="profile-field">
        <div class="label">Town/city</div>
        <div class="data">{{ $user->contactRecord->city }}</div>
    </div>
@endif

@if($user->contactRecord->state)
    <div class="profile-field">
        <div class="label">State/province</div>
        <div class="data">{{ $user->contactRecord->state_name }}</div>
    </div>
@endif

@if($user->contactRecord->zip_code)
    <div class="profile-field">
        <div class="label">Zip code</div>
        <div class="data">{{ $user->contactRecord->zip_code }}</div>
    </div>
@endif

@if($user->contactRecord->country)
    <div class="profile-field">
        <div class="label">Country</div>
        <div class="data">{{ $user->contactRecord->country_name }}</div>
    </div>
@endif

<div class="profile-spacer">&nbsp;</div>

@if($user->contactRecord->linkedin)
    <div class="profile-field">
        <div class="label">LinkedIn</div>
        <div class="data">
            <a href="{{ $user->contactRecord->linkedin }}" target="_blank">{{ $user->contactRecord->linkedin }}</a>
        </div>
    </div>
@endif

@if($user->contactRecord->facebook)
    <div class="profile-field">
        <div class="label">Facebook</div>
        <div class="data">
            <a href="{{ $user->contactRecord->facebook }}" target="_blank">{{ $user->contactRecord->facebook }}</a>
        </div>
    </div>
@endif

@if($user->contactRecord->whatsapp)
    <div class="profile-field">
        <div class="label"></div>
        <div class="data">
            {{ $user->contactRecord->whatsapp }}
        </div>
    </div>
@endif

@if($user->contactRecord->twitter)
    <div class="profile-field">
        <div class="label">Twitter</div>
        <div class="data">
            <a href="{{ $user->contactRecord->twitter }}" target="_blank">{{ $user->contactRecord->twitter }}</a>
        </div>
    </div>
@endif

@if($user->contactRecord->instagram)
    <div class="profile-field">
        <div class="label">Instagram</div>
        <div class="data">
            <a href="{{ $user->contactRecord->instagram }}" target="_blank">{{ $user->contactRecord->instagram }}</a>
        </div>
    </div>
@endif

@if($user->contactRecord->snapchat)
    <div class="profile-field">
        <div class="label">Snapchat</div>
        <div class="data">
            <a href="{{ $user->contactRecord->snapchat }}" target="_blank">{{ $user->contactRecord->snapchat }}</a>
        </div>
    </div>
@endif
