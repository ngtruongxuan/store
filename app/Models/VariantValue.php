<?php

namespace App\Models;


use Illuminate\Support\Facades\URL;

class VariantValue extends BaseModel
{
    protected $table = 'variant_value';
    public function standard(){
        $this->belongsTo(VariantStandard::class,"variant_standard_id");
    }
    protected $guarded = [];
}