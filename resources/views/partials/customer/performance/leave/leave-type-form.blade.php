<x-form-input-text caption="Name" id="name" placeholder="Enter name of leave type" required="1"/>

<x-form-input-text caption="Description" id="description" placeholder="Describe this leave type" required="0"/>

<x-form-input-check caption="Requires submission of leave note" id="has_leave_note" required="1">
    <x-form-input-radio-form caption="Yes" id="has_leave_note_yes" name="has_leave_note" value=1/>
    <x-form-input-radio-form caption="No" id="has_leave_note_no" name="has_leave_note" value=0/>
</x-form-input-check>

<x-form-input-check caption="Requires submission of return note" id="has_return_note" required="1">
    <x-form-input-radio-form caption="Yes" id="has_return_note_yes" name="has_return_note" value=1/>
    <x-form-input-radio-form caption="No" id="has_return_note_no" name="has_return_note" value=0/>
</x-form-input-check>

<x-form-input-check caption="Requires submission of report" id="has_report" required="1">
    <x-form-input-radio-form caption="Yes" id="has_report_yes" name="has_report" value=1/>
    <x-form-input-radio-form caption="No" id="has_report_no" name="has_report" value=0/>
</x-form-input-check>

