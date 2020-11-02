<?php

namespace App\Providers;

use App\Interfaces\EducationRecordRepositoryInterface;
use App\Interfaces\EmployeeRecordRepositoryInterface;
use App\Interfaces\HolidayRepositoryInterface;
use App\Interfaces\JobTitleRecordRepositoryInterface;
use App\Interfaces\JobTitleRepositoryInterface;
use App\Interfaces\LeaveApprovalRepositoryInterface;
use App\Interfaces\LeaveRepositoryInterface;
use App\Interfaces\LeaveSettingRepositoryInterface;
use App\Interfaces\LeaveTypeRepositoryInterface;
use App\Repositories\EducationRecordRepository;
use App\Repositories\EmployeeRecordRepository;
use App\Repositories\HolidayRepository;
use App\Repositories\JobTitleRecordRepository;
use App\Repositories\JobTitleRepository;
use App\Repositories\LeaveApprovalRepository;
use App\Repositories\LeaveRepository;
use App\Repositories\LeaveSettingRepository;
use App\Repositories\LeaveTypeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EducationRecordRepositoryInterface::class, EducationRecordRepository::class);
        $this->app->bind(EmployeeRecordRepositoryInterface::class, EmployeeRecordRepository::class);
        $this->app->bind(HolidayRepositoryInterface::class, HolidayRepository::class);
        $this->app->bind(JobTitleRecordRepositoryInterface::class, JobTitleRecordRepository::class);
        $this->app->bind(JobTitleRepositoryInterface::class, JobTitleRepository::class);
        $this->app->bind(LeaveApprovalRepositoryInterface::class, LeaveApprovalRepository::class);
        $this->app->bind(LeaveRepositoryInterface::class, LeaveRepository::class);
        $this->app->bind(LeaveSettingRepositoryInterface::class, LeaveSettingRepository::class);
        $this->app->bind(LeaveTypeRepositoryInterface::class, LeaveTypeRepository::class);
    }
}
