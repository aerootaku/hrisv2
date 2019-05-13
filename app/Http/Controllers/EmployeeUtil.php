<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeEmployment;
use App\PayrollCutOff;
use Carbon\Carbon;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Exception;
class EmployeeUtil extends Controller
{
    //

    public function getEmployee($id){
        try{
            $employee = Employee::findOrFail($id);
            if($employee){
                return $employee;
            }
            else{
                throw new \Exception('unable to find employee record');
            }
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function getEmployment($employee_id){
        try{
            $employee = DB::table('employee_employment')->where('employee_id', $employee_id)->first();
            if($employee){
                return $employee;
            }
            else{
                throw new \Exception('unable to find employee record');
            }
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function getCutOff($cutoff_id){
        try{
            $cutoff = PayrollCutOff::findOrFail($cutoff_id);
            if($cutoff){
                return $cutoff;
            }
            else{
                throw new \Exception('unable to find cutoff record');
            }
        }
        catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function getAttendanceTime($employee_id, $cutoff_from, $cutoff_to){
    $attendance_time = DB::table('attendance_time')
        ->select(DB::raw('SUM(hour(total_work) * 60) as work_minutes'),
            DB::raw('SUM(hour(total_work)) as work_hours'),
            DB::raw('SUM(hour(total_work)  /8)  as days_work')
        )
        ->whereBetween('attendance_date', [$cutoff_from, $cutoff_to])
        ->where('employee_id',$employee_id)
        ->get();
    }

    public function employeeCutoffAttendance($employee_id, $cutoff_from, $cutoff_to){
        $attendance_time = DB::table('attendance_time')
            ->select(DB::raw('SUM(hour(total_work) * 60) as work_minutes'),
                DB::raw('SUM(hour(total_work)) as work_hours'),
                DB::raw('SUM(hour(total_work)  /8)  as days_work'),
                DB::raw('SUM(hour(undertime))  as undertime')
            )
            ->whereBetween('attendance_date', [$cutoff_from, $cutoff_to])
            ->where('employee_id',$employee_id)
            ->first();

        return $attendance_time;
    }

    public function cutoffWorkingDays($cutoff_from, $cutoff_to){
        $dt = Carbon::parse($cutoff_from);
        $dt2 = Carbon::parse($cutoff_to);
        $totalWorkingDays = $dt->diffInDaysFiltered(function(Carbon $date) {
                return !$date->isWeekend();
            }, $dt2);
        return $totalWorkingDays;
    }

    public function cutoffWorkingHours($cutoff_from, $cutoff_to){
        $dt = Carbon::parse($cutoff_from);
        $dt2 = Carbon::parse($cutoff_to);
        $totalWorkingHours = $dt->diffInHoursFiltered(function(Carbon $date){
            return !$date->isWeekend();
        }, $dt2);
        return $totalWorkingHours;
    }

    public function generateAbsences($employeeWorkingDays, $cutoffWorkingdays_from, $cutoffWorkingDays_to){
        $workingDays = $this->cutoffWorkingDays($cutoffWorkingdays_from, $cutoffWorkingDays_to);
        $days_absent = $workingDays - $employeeWorkingDays;
        return $days_absent;

    }


}
