<x-form-input-select caption="Leave type" id="leave_type_id" :options="$leave_types" placeholder="Select a leave type..." required="1" />

<x-form-input-select caption="Supervisor" id="supervisor_id" :options="$supervisors" placeholder="Select supervisor..." required="0" />

<x-form-input-select caption="Relieving staff member" id="reliever_id" :options="$relievers" placeholder="Select a staff member..." required="0" />

<x-form-input-date caption="Start date" id="start" placeholder="Proposed start date" required="0"/>

<x-form-input-date caption="End date" id="end" placeholder="Proposed end date" required="0"/>

<x-form-input-textarea caption="Note" id="note" placeholder="Additional notes" rows="3" required="0"/>
