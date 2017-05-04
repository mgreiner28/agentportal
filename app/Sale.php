<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\FilterByUser;

/**
 * Class Sale
 *
 * @package App
 * @property string $test1
 * @property string $test2
 * @property string $test3
 * @property string $created_by
*/
class Sale extends Model
{
    use SoftDeletes, FilterByUser;

    protected $fillable = ['test1', 'test2', 'test3', 'created_by_id'];
    
    public static function boot()
    {
        parent::boot();

        Sale::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }
    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
    
}
