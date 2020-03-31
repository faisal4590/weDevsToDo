<?php

namespace App\Http\Controllers\DAL;

use App\ToDo;
use DB;

class EditDAL
{
    public function update_todo_status($todo_id)
    {
        $to_do = ToDo::find($todo_id);

        if($to_do->status == 'done'){
            $to_do->status = 'new';
        }else{
            $to_do->status = 'done';
        }

        $to_do->save();

        // fetch updated todos
        $after_edited_todo_lists = ToDo::orderBy('id', 'desc')
        ->get();

        if (count($after_edited_todo_lists) > 0) {
            return $after_edited_todo_lists;
        } else {
            return NULL;
        }

     
    }

    public function update_todo($todo_id, $todo_msg)
    {
        $to_do = ToDo::find($todo_id);

        $to_do->to_do_msg = $todo_msg;

        $to_do->save();

        // fetch updated todos
        $after_edited_todo_lists = ToDo::orderBy('id', 'desc')
            ->get();

        if (count($after_edited_todo_lists) > 0) {
            return $after_edited_todo_lists;
        } else {
            return NULL;
        }
    }
}
