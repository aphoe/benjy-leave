<?php

namespace App\Http\Controllers\Customer\Performance\Holiday;

use App\Customers\Models\Holiday;
use App\Enums\LogType;
use App\Http\Controllers\Controller;
use App\Http\Requests\PerformanceHolidayRequest;
use App\Interfaces\HolidayRepositoryInterface;
use App\Repositories\HolidayRepository;
use App\Services\HolidayService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HolidaysController extends Controller
{
    private $user;
    /**
     * @var HolidayRepositoryInterface
     */
    private $holidayRepository;
    /**
     * @var HolidayService
     */
    private $holidayService;
    /**
     * @var string
     */
    private $logDetail;

    /**
     * HolidaysController constructor.
     * @param HolidayRepositoryInterface $holidayRepository
     * @param HolidayService $holidayService
     */
    public function __construct(HolidayRepositoryInterface $holidayRepository, HolidayService $holidayService)
    {
        $this->middleware(['auth']);

        $this->middleware(function ($request, $next) {
            $this->user = \Auth::user();
            return $next($request);
        });
        $this->holidayRepository = $holidayRepository;
        $this->holidayService = $holidayService;

        $this->logDetail = 'holiday';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'All holidays',
            'meta_desc' => 'All holidays',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'active' => 'Holiday',
            ],
            'holidays' => Holiday::orderDesc()
                ->paginate(),
        ];
        return view('customer.performance.holiday.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'New Holiday',
            'meta_desc' => 'Create a new holiday',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'performance/holiday' => 'Holiday',
                'active' => 'Create'
            ]
        ];
        return view('customer.performance.holiday.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PerformanceHolidayRequest $request
     * @return void
     */
    public function store(PerformanceHolidayRequest $request)
    {
        $holiday = new Holiday();
        $this->holidayRepository->store($holiday, $request);

        logUser(LogType::Create, $this->logDetail, $holiday->id);

        return redirect('performance/holiday')->with('theme-success', 'Holiday has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = Holiday::findOrFail(hashDecode($id));

        $data = [
            'title' => 'Edit Holiday',
            'meta_desc' => 'Edit holiday',
            'body_class' => null,
            'user' => $this->user,
            'menu' => 'hr',
            'notifications' => notifications($this->user),
            'new_notification' => countNewNotifications($this->user),
            'crumbs' => [
                'performance/holiday' => 'Holiday',
                'active' => 'Edit'
            ],
            'holiday' => $holiday,
        ];
        return view('customer.performance.holiday.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $holiday = Holiday::findOrFail(hashDecode($id));
        $this->holidayRepository->store($holiday, $request);

        logUser(LogType::Update, $this->logDetail, $holiday->id);

        return redirect('performance/holiday')->with('theme-success', 'Holiday has been created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holiday = Holiday::findOrFail(hashDecode($id));
        logUser(LogType::Delete, $this->logDetail, $holiday->id);
        $holiday->delete();
        return 1;
    }
}
