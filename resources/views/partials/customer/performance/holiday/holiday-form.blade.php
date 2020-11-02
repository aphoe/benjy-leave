<x-form-input-text caption="Name" id="name" placeholder="Name of holiday" required="1"/>

<x-form-input-select caption="Year" id="year" :options="yearsSelectArray()" placeholder="Select year..." required="1" />

<x-form-input-date caption="Start date" id="start" placeholder="Enter date" required="1"/>

<x-form-input-date caption="End date" id="end" placeholder="Enter date" required="0"/>


