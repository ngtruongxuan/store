<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
//use Tymon\JWTAuth\Facades\JWTAuth as JWTAuthFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BaseModel extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';

    public static function table()
    {
        return (new static)->getTable();
    }

    public static function getPriKeyName()
    {
        return (new static)->getKeyName();
    }

    public static function column($column)
    {
        return self::table() . '.' . $column;
    }

    public function getCreatedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('H:m:s d-m-Y');
    }

    public function getUpdatedAtAttribute($attr)
    {
        return Carbon::parse($attr)->format('H:m:s d-m-Y');
    }

    public static function boot() {
        parent::boot();

        static::creating(function($table)
        {
            $table->created_by = $table->updated_by = Auth::user()->id;
            $table->created_at = date('Y-m-d H:i:s');
            $table->updated_at = date('Y-m-d H:i:s');
        });
        // create a event to happen on updating
        static::updating(function($table)  {
            $table->updated_by = Auth::user()->id;
            $table->updated_at = date('Y-m-d H:i:s');
        });

        // create a event to happen on deleting
        static::deleting(function($table)  {
            $table->deleted_by = Auth::user()->id;
        });

        // create a event to happen on saving
        static::saving(function($table)  {
            if(empty($table->created_by)){
                $table->created_by = Auth::user()->id;
                $table->created_at = date('Y-m-d H:i:s');
            }
            $table->updated_by = Auth::user()->id;
            $table->updated_at = date('Y-m-d H:i:s');
        });
        static::retrieved(function ($model) {

        });
    }
}
