<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'reporting_time',
    ];

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'reporting_time',
    ];

    public function getByUserId($id, $month)
    {
        return $this->when($month, function ($query, $month) {
                        $query->where('reporting_time', 'LIKE', "%{$month}%__");
                    })
                    ->where('user_id', $id)
                    ->orderBy('reporting_time', 'desc')
                    ->paginate(10);
    }
}
