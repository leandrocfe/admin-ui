<?php

namespace Brackets\AdminUI;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class WysiwygMedia extends Model
{
    protected $fillable = ["file_path", "parent_id"];

    public static function boot() {
        static::deleted(function($model) {
            File::delete(public_path() . '/' . $model->file_path);
        });
    }

    public function wysiwygable()
    {
        return $this->morphTo();
    }
}
