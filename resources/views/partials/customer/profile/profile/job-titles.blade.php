<h6 class="text-uppercase mt-5">Designation</h6>

<x-job-title-record-card :record="$jobTitle" />

<div class="text-center">
    <a href="{{ url('user/' . $user->slug . '/job-title/history') }}" class="btn btn-outline-secondary btn-sm my-2">History</a>
</div>
