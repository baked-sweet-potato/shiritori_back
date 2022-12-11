<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    use HasUlids;

    // protected $primaryKey = 'ulid';

    protected $fillable = ['content', 'ip'];

    public function lastetOne()
    {
        return DB::table('posts')->latest('id')->first();
    }
}
