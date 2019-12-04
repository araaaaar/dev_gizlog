<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use SoftDeletes;
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
        return $this->when(isset($month), function ($query) use ($month) {
                        $query->where('reporting_time', 'LIKE', $month.'%');
                    })
                    ->where('user_id', $id)
                    ->orderBy('reporting_time', 'desc')
                    ->paginate(10);
    }
}
