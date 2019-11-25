<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    //
    use SoftDeletes;
    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'reporting_time',
        'title',
        'content',
    ];

    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->paginate(10);
        // return $this->where('user_id', $id)->where('reporting_time', "YYYY-MM")->paginate(10);
    }
}
