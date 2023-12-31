<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AttendanceService;

class AttendanceController extends Controller
{
    public $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function create(Request $request)
    {
        logger($request);
        $this->attendanceService->create($request);
        return response()->json([
            'message' => 'success'
        ]);
    }
}
