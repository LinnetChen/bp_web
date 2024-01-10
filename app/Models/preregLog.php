<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\DefaultDatetimeFormat;


class preregLog extends Model
{
    use HasFactory;
    protected $table = 'prereg_log';
    use DefaultDatetimeFormat;
}
