<h6 class="text-uppercase mt-5">
    Relatives
    @if(\Auth::id() === $user->id && $relatives->count() < config('project.max_relative'))
        <a href="{{ url('profile/relative/create') }}" class="mb-1 float-right">
            <span class="far fa-plus-square"></span> Add
        </a>
        <div class="clearfix"></div>
    @endif
</h6>

@if($relatives->count() < 1)
    <p class="text-muted">You have added no relatives.</p>
@else
    <div class="table-responsive">
        <table class="table table-sm table-striped table-borderless">
            <tbody>
            @foreach($relatives as $relative)
                <tr id="contact-relative-{{ hashEncode($relative->id) }}">
                    <td>
                        @if($relative->next_of_kin)
                            <span class="badge badge-soft-primary">Next of Kin</span>
                        @endif
                        <strong>{{ $relative->name }}</strong>
                        <br>
                        <i class="fas fa-phone text-info"></i> {{ $relative->phone }}
                        <i class="far fa-envelope text-info pl-3"></i> {{ $relative->email }}
                    </td>
                    <td>{{ \App\Enums\RelativeRelationship::getDescription($relative->relationship) }}</td>
                    <td>
                        <div class="dropdown">
                            <div class="font-size-16 text-right dropdown-btn" data-toggle="dropdown" data-booundary="viewport" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <h6 class="dropdown-header">{{ $relative->name }}</h6>
                                <a href="#" class="dropdown-item"   data-toggle="modal" data-target="#relativeModal" data-tag="{{ $relative->name }}" data-id="{{ hashEncode($relative->id) }}">
                                    <i class="fas fa-info"></i>
                                    Details
                                </a>
                                <a href="{{ url('profile/relative/' . hashEncode($relative->id) . '/edit') }}"
                                   class="dropdown-item">
                                    <i class="far fa-edit"></i>
                                    Edit
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ url('profile/relative/' . hashEncode($relative->id) . '/delete') }}" class="dropdown-item text-danger contact-relative-delete-item" data-id="{{ hashEncode($relative->id) }}" data-tag="{{ $relative->name }}">
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

        @include('partials.customer.profile.profile.modal.relative')

        @for($i=0; $i<=10; $i++)
            <br>
        @endfor
    </div>
@endif

