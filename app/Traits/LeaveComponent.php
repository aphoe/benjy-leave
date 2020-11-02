<?php


namespace App\Traits;


use App\Enums\LeaveStatus;

trait LeaveComponent
{
    private function init(int $status)
    {
        $this->caption = LeaveStatus::getDescription($this->leave->status);
        switch($status){
            case LeaveStatus::Pending:
                $this->type = 'primary';
                $this->icon = 'fas fa-info';
                break;
            case LeaveStatus::Approved:
                $this->type = 'success';
                $this->icon = 'far fa-check-circle';
                break;
            case LeaveStatus::Cancelled:
                $this->type = 'warning';
                $this->icon = 'fas fa-question';
                break;
            case LeaveStatus::Denied:
                $this->type = 'danger';
                $this->icon = 'fas fa-remove';
                break;
        }
    }

    public function statusClass(int $status): string
    {
        $class = '';
        switch($status){
            case LeaveStatus::Pending:
                $class = 'primary';
                break;
            case LeaveStatus::Approved:
                $class = 'success';
                break;
            case LeaveStatus::Cancelled:
                $class = 'warning';
                break;
            case LeaveStatus::Denied:
                $class = 'danger';
                break;
        }

        return $class;
    }
}
