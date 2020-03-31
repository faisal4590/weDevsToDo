<?php

namespace App\Http\Controllers\DAL;

use App\ToDo;
use App\Video_Tags;
use DB;


class CreateDAL
{
    public function add_to_do($request)
    {

        // Inserting to_do
        $to_do = ToDo::firstOrCreate([
            'to_do_msg' => $request->to_do_msg,
            'status' => 'new'
        ]);

        if (count($to_do->toArray()) > 0) {
            return $to_do->toArray();
        } else {
            return NULL;
        }
    }
}
