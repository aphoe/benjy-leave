<?php

use App\Customers\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Annual leave',
                'description' => 'Paid time off work granted by employers to employees to be used for whatever the employee wishes. Depending on the employer\'s policies, differing number of days may be offered, and the employee may be required to give a certain amount of advance notice, may have to coordinate with the employer to be sure that staffing is adequately covered during the employee\'s absence, and other requirements may have to be met.',
            ],
            [
                'name' => 'Sick leave',
                'description' => 'Sick leave is time off given by the company to allow employees to recover from an illness and take care of their health. Sick leaves are crucial to allow employees to get the rest they need without worrying about losing pay.',
            ],
            [
                'name' => 'Casual leave',
                'description' => 'Casual leave is taken by an employee for travel, vacation, rest, and family events. Such leaves are given to allow the employee to take time off for any life events they have.',
            ],
            [
                'name' => 'Public holiday',
                'description' => 'Public holidays are days that are given as leave by the government. Such holidays must be observed by every institution.',
            ],
            [
                'name' => 'Religious holidays',
                'description' => 'A day specified for religious observance',
            ],
            [
                'name' => 'Maternity leave',
                'description' => 'From taking care of the newborn to recovering from the delivery, maternity leave is an important time for new mothers. Maternity leave is provided to the new mother for a period of 7 to 17 weeks, depending on the country that the company is based out of.',
            ],
            [
                'name' => 'Paternity leave',
                'description' => 'Paternity leave is granted to new fathers—  husbands or partners of a pregnant woman, surrogate parent, or someone who adopted a child— to take care of their newborns without any worry.',
            ],
            [
                'name' => 'Bereavement leave',
                'description' => 'Losing a loved one is an unavoidable situation and in such events, employees take sudden leave. As HR, you need to have a bereavement leave policy that provides the employee with the time to grieve their loss, manage any responsibilities they may have due to the death, and allow them to ask for a bereavement leave without any hassle. ',
            ],
            [
                'name' => 'Compensatory leave',
                'description' => 'Employees who have clocked in more hours than they were required to can be eligible for compensatory days off. ',
            ],
            [
                'name' => 'Sabbatical leave',
                'description' => 'Sabbatical leaves are "a break from work" where employees can pursue interests they have or take time off for physical and mental health reasons. Unlike other leaves, sabbaticals are long leave periods, from six months to a year.',
            ],
            [
                'name' => 'Unpaid Leave',
                'description' => 'A leave of absence, is an authorised prolonged absence from work, for any reason authorised by the workplace. When people "take leave" in this way, they are usually taking days off from their work that have been pre-approved by their employer in their contracts of employment.',
            ],
        ];

        foreach ($types as $type){
            $leave_type = new LeaveType();
            $leave_type->name = $type['name'];
            $leave_type->description = $type['description'];
            $leave_type->save();
        }
    }
}
