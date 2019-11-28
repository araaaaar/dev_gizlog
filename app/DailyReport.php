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

    public function getByUserId($id, $month)
    {
        return $this->when($month, function ($query, $month) {
            return $query->where('reporting_time', 'LIKE', "%{$month}%__");
        })
        ->where('user_id', $id)->paginate(10);
    }
}

