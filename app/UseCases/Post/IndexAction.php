<?php

namespace App\UseCases\Post;

use Illuminate\Support\Facades\DB;

class IndexAction
{
    /**
    * @param  string  $id
    * @return array 
    */
    public function __invoke($id)
    {
        $query = DB::table('posts');

        if ($id) {
            $query->where('id', '<', $id);
        }

        return $query->limit(30)->get();
    }
}
