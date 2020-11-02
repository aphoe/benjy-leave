
<div class="card">
    <div class="card-body">
        <div class="text-center mt-3">
            <img src="{{ customerUserPhoto($person->photo) }}"
                 alt="{{ $person->official_name }}"
                 data-lity
                 data-lity-target="{{ customerUserPhoto($person->photo, 'large') }}"
                 class="avatar-lg rounded-circle" />
            <h5 class="mt-2 mb-0">{{ $person->official_name }}</h5>
            <h6 class="text-muted font-weight-normal mt-2 mb-0">
                {{ $person->jobTitleRecords->last()->title ?? '--' }}
            </h6>
            <h6 class="text-muted font-weight-normal mt-1 mb-3">
                {{ $person->jobTitleRecords->last()->unit->name ?? '--' }}
            </h6>
            <h6 class="mt-1 mb-4 font-weight-bold">
                {{ $person->employmentRecord->employee_number }}
            </h6>

            @if(\Auth::id() === $person->id)
                <div class="progress progress-xxl mb-4">
                    <div class="progress-bar bg-success text-black-50" role="progressbar" style="width: {{ $profileStats->completed_percent }}%;"
                         aria-valuenow="{{ $profileStats->completed_percent }}" aria-valuemin="0" aria-valuemax="100">
                            <span class="font-size-12 font-weight-bold">
                                Your Profile is <span class="font-size-11">{{ number_format($profileStats->completed_percent, 1) }}%</span> completed
                            </span>
                    </div>
                </div>

                {{--<button type="button" class="btn btn-primary btn-sm mr-1">Follow</button>--}}
                <a href="{{ url('profile/setting') }}#change-photo" class="btn btn-white btn-sm">Change Photo</a>
            @endif
        </div>

        <!-- profile  -->
        <div class="mt-5 pt-2 border-top">
            <h4 class="mb-3 font-size-15">About</h4>
            <p class="text-muted mb-4">Hi I'm Shreyu. I am user experience and user
                interface designer.
                I have been working on UI & UX since last 10 years.</p>
        </div>
        <div class="mt-3 pt-2 border-top">
            <h4 class="mb-3 font-size-15">Contact Information</h4>
            <div class="table-responsive">
                <table class="table table-borderless mb-0 text-muted">
                    <tbody>
                    <tr>
                        <th scope="row">Email</th>
                        <td>xyz123@gmail.com</td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td>(123) 123 1234</td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td>1975 Boring Lane, San Francisco, California, United States -
                            94108</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3 pt-2 border-top">
            <h4 class="mb-3 font-size-15">Skills</h4>
            <label class="badge badge-soft-primary">UI design</label>
            <label class="badge badge-soft-primary">UX</label>
            <label class="badge badge-soft-primary">Sketch</label>
            <label class="badge badge-soft-primary">Photoshop</label>
            <label class="badge badge-soft-primary">Frontend</label>
        </div>
    </div>
</div>
<!-- end card -->
