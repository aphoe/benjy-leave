<h6 class="text-uppercase mt-5">
    Emergency Contacts
    @if(\Auth::id() === $user->id && $emergencyContacts->count() < config('project.max_emergency'))
        <a href="{{ url('profile/emergency/create') }}" class="mb-1 float-right">
            <span class="far fa-plus-square"></span> Create
        </a>
        <div class="clearfix"></div>
    @endif
</h6>

@if($emergencyContacts->count() < 1)
    <p class="text-muted">You have no Emergency Contacts</p>
@else
    <div class="table-responsive">
        <table class="table table-sm table-striped table-borderless">
            <tbody>
            @foreach($emergencyContacts as $emergency)
                <tr id="contact-emergency-{{ hashEncode($emergency->id) }}">
                    <td style="width: 70px">
                        <img
                            class="img-fluid img-thumbnail"
                            src="{{ $handler->asset($handler::EMERGENCY_PHOTO_AVATAR, $emergency->photo) }}"
                            alt="{{ $emergency->name }}"
                            data-lity
                            data-lity-desc="{{ $emergency->name }}"
                            data-lity-target="{{ $handler->asset($handler::EMERGENCY_PHOTO_LARGE, $emergency->photo) }}"
                        >
                    </td>
                    <td>
                        @if($emergency->next_of_kin)
                            <span class="badge badge-soft-primary">Next of Kin</span>
                        @endif
                        <strong>{{ $emergency->name }}</strong>
                        <br>
                        <i class="fas fa-phone text-info"></i> {{ $emergency->phone }}
                        <i class="far fa-envelope text-info pl-3"></i> {{ $emergency->email }}
                    </td>
                    <td>{{ $emergency->relationship }}</td>
                    <td>
                        <div class="dropdown emergency-contact-dropdown">
                            <div class="font-size-16 text-right dropdown-btn" data-toggle="dropdown" data-booundary="viewport" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <h6 class="dropdown-header">{{ $emergency->name }}</h6>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#emergencyModal" data-tag="{{ $emergency->name }}" data-id="{{ hashEncode($emergency->id) }}">
                                    <i class="fas fa-info"></i>
                                    Details
                                </a>
                                <a href="{{ url('profile/emergency/' . hashEncode($emergency->id) . '/edit') }}"
                                   class="dropdown-item">
                                    <i class="far fa-edit"></i>
                                    Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ url('profile/emergency/' . hashEncode($emergency->id) . '/delete') }}" class="dropdown-item text-danger contact-emergency-delete-item" data-id="{{ hashEncode($emergency->id) }}" data-tag="{{ $emergency->name }}">
                                    <i class="fas fa-times"></i>
                                    delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="emergency-spacer">&nbsp;</div>
    </div>

    @include('partials.customer.profile.profile.modal.emergency')
@endif
