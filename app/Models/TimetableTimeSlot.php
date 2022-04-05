<?php

namespace App\Models;

use App\Models\Weekday;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimetableTimeSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'stop_time',
        'timetable_id',
    ];

    public function timetable()
    {
        return $this->belongsTo(Timetable::class);
    }

    //many to many relationship with week days
    public function weekdays()
    {
        //get pivot table as timetableRecords
        return $this->belongsToMany(WeekDay::class)->as('timetableRecord')->withPivot(['subject_id'])->withTimestamps();
    }
}
