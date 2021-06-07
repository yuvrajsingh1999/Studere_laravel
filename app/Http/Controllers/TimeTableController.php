<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\TimeTable;
use App\Models\TimeTableGenerator;
use App\Models\Venue;
use App\Models\Courses;
use App\Models\Setting;

class TimeTableController extends Controller
{
    public function generate(Courses $course, TimeTable $table)
    {
        $condition = request()->all();
        // dd($condition);
        if (!isset($condition['dept'])) $condition['dept'] = 0;

        $courses = $course->where($condition)->get()->toArray();
        
        $levelWideCourses = null;
        $newCondition = $condition;
        $newCondition['dept'] = 0;
        //dd($levelWideCourses);
        if ($table->alreadyHas($newCondition)) {
           $levelWideCourses = $table->where($newCondition)->first()->schedule;
            
        dd($levelWideCourses);
        }
        try{
            $timeTable =  new TimeTableGenerator($courses);
            
            $timeTable->levelWideCourse(json_decode($levelWideCourses, true));
            
            $timeTable = $timeTable->generate($condition['dept']);
            // dd($timeTable);
            if ($table->alreadyHas($condition)) {
                $table->where($condition)->update(['schedule' => json_encode($timeTable) ]);
            } else {
                $table->create([
                    'dept'          => $condition['dept'] ?? 0,
                    'semester'      => $condition['semester'],
                    'level'         => $condition['level'],
                    'session'       => $condition['session'],
                    'schedule'      => json_encode($timeTable)
                ]);
            }
            return redirect()->route('timetable.index', $condition);
        } catch (\Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function index(Request $request, TimeTable $table, Venue $venue)
    {
        $condition = $request->all();

        $timeTable = $table->where($condition)->first();
        //dd($timeTable);
        //foreach($timeTable as $time){
            // print_r($timeTable->schedule);
        $schedule = json_decode($timeTable->schedule);
        //}

        $venues = $venue->inUse()->get();

        $venues = collect($venues)->reduce(function ($parsed, $venues) {
            $parsed[$venues['course_id']] = "<span class='badge'>{$venues['name']}</span>";
            return $parsed;
        });

        $daysLabel = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        //dd($timeTable);
        $condition['semester'] = $request->input('semester');
// dd($venues->course_id);
        // print_r($venues['course_id']);
        // die();
        $institution = (new Setting())->getByKey('institution_name');

        return view('timetable', compact('schedule', 'condition', 'daysLabel','venues', 'institution'));
    }


    public function showAll(){
        $timetables = TimeTable::paginate(1);

        $daysLabel = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        $institution = (new Setting())->getByKey('institution_name');
        return view('showall',compact('timetables','institution','daysLabel'));


    }


}
