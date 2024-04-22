<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class profile extends Model
{
    use HasFactory;
    protected $table = "profile";
    protected $fillable = ["title", "type", "start_date", "end_date",
        "info1", "info2", "info3", "desc"];

    protected $appends = ['start_date_id', 'end_date_id'];

    public function getStartDateIdAttribute(){
        return Carbon::parse($this->attributes['start_date'])->translatedFormat('F Y');
    }
    public function getEndDateIdAttribute(){
        if($this->attributes['end_date']){
            return Carbon::parse($this->attributes['end_date'])->translatedFormat('F Y');
        }
        else {
            return 'Present';
        }
    }
}
