

<x-form-input-select caption="Leave type" id="leave_type_id" :options="$leave_types" placeholder="Select a leave type..." required="1" />

<x-form-input-select caption="Year" id="year" :options="yearsSelectArray()" placeholder="Select year..." required="1" />

<x-form-input-text caption="Maximum days" id="days" placeholder="Maximum number of days available per year" required="0"/>

<x-form-input-text caption="Shortest notice" id="shortest_notice" placeholder="Minimum number of days notice to be given before taking leave" required="0"/>

<x-form-input-date caption="Submission deadline" id="submission_deadline" placeholder="Date after which staff members cannot submit request for leave" required="0"/>

<x-form-input-date caption="Start date" id="start" placeholder="Date from which staff can start going on leave" required="0"/>

<x-form-input-date caption="End date" id="end" placeholder="Date after which no staff member can go on leave" required="0"/>
