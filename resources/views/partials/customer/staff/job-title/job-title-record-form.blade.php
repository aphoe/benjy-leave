<x-form-input-select caption="Job title" id="job_title_id" :options="$job_titles" placeholder="Select job title..." required="1" />

<x-form-input-select caption="Business unit" id="business_unit_id" :options="$business_units" placeholder="Select the business unit..." required="1" />

<x-form-input-select caption="Office branch" id="office_branch_id" :options="$office_branches" placeholder="Select branch..." required="1" />

<x-form-input-select caption="Reports to" id="reports_to" :options="$reports_tos" required="0" placeholder="Select who this user reports to" />

<x-form-input-date caption="Start date" id="start" placeholder="Select date staff member is starting in this position"/>

<x-form-input-date caption="End of probation period" id="probation" required=0 placeholder="Select end of probation period" info='<small class="text-muted form-text">Leave blank if there is no probation period</small>'/>

<x-form-input-date caption="End date" id="end" required="0" placeholder="Select date staff member ended (or is ending) in this position"/>

