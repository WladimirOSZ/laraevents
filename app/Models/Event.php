<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;
        // $table->string('name');
            // $table->string('speaker_name');
            // $table->dateTime('start_date');
            // $table->dateTime('end_date');
            // $table->text('target_audience');
            // $table->integer('participants_limit');
    protected $fillable = [
        'name',
        'speaker_name',
        'start_date',
        'end_date',
        'target_audience',
        'participants_limit'
    ];

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('d/m/Y H:i', $value)
            ->format('Y-m-d H:i:s');
    }
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('d/m/Y H:i', $value)
            ->format('Y-m-d H:i:s');
    }

    public function getStartDateFormattedAttributtes()
    {
        return Carbon::parse($this->start_date)->format('d/m/Y H:i');
    }

    public function getEndDateFormattedAttributtes()
    {
        return Carbon::parse($this->end_date)->format('d/m/Y H:i');
    }
}
