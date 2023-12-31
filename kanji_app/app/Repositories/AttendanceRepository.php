<?php

namespace App\Repositories;

use App\Models\Attendance;

class AttendanceRepository
{
    public function create(array $data)
    {
        $attendance = new Attendance;
        $attendance->fill($data)->save();
        return $attendance;
    }
}
