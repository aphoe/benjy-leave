<?php

Route::middleware(['auth', 'verified', 'check.blocked', 'company.updated'])
    ->group(function (){
        Route::get('dashboard', 'Customer\DashboardController@index');

        if(isCustomer()) {
            Route::get('/', 'Customer\User\ProfileController@index');
        }

     

        Route::prefix('user')
            ->group(function(){
                Route::prefix('leave')
                    ->group(function (){
                        Route::get('type', 'Customer\User\Performance\Leave\TypesController');
                        Route::get('type/available', 'Customer\User\Performance\Leave\AvailableLeaveTypesController');

                        Route::resource('application', 'Customer\User\Performance\Leave\ApplicationsController');
                        Route::resource('relieve', 'Customer\User\Performance\Leave\RelieveController')->only('index', 'update');

                        Route::prefix('supervisor')
                            ->group(function (){
                                Route::resource('approval', 'Customer\User\Performance\Leave\SupervisorApprovalsController')->only('index', 'update');
                            });

                        Route::prefix('{leave}')
                            ->group(function (){
                                Route::prefix('note')
                                    ->group(function (){
                                        Route::resource('handover', 'Customer\User\Performance\Leave\Note\HandoversController')->only('create', 'store');
                                    });
                            });
                    });
            });

        Route::prefix('performance')
            ->group(function (){
                Route::prefix('leave')
                    ->middleware('permission:leave-super-admin|leave-admin|leave-view')
                    ->group(function (){
                        Route::resource('type/setting', 'Customer\Performance\Leave\LeaveTypeSettingsController')->only('show', 'update');
                        Route::resource('type', 'Customer\Performance\Leave\LeaveTypesController');

                        Route::resource('setting', 'Customer\Performance\Leave\LeaveSettingsController');
                        Route::resource('application', 'Customer\Performance\Leave\ApplicationsController')->only('index', 'update');
                    });

                Route::resource('holiday', 'Customer\Performance\Holiday\HolidaysController')->middleware('permission:holiday-admin');
            });
    });

Route::prefix('data')
    ->group(function (){
        Route::get('leave/{id}', 'Data\LeaveController');
    });
