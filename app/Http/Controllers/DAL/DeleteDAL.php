<?php

namespace App\Http\Controllers\DAL;

use App\ToDo;
use DB;

class DeleteDAL
{
    public function remove_todo($todo_id)
    {
        $to_do = ToDo::find($todo_id);

        $to_do->delete();

        // fetch remaining todos
        $after_deleted_todo_lists = ToDo::orderBy('id', 'desc')
            ->get();

        if (count($after_deleted_todo_lists) > 0) {
            return $after_deleted_todo_lists;
        } else {
            return NULL;
        }
    }

    public function clear_all_completed_todos()
    {
        $to_do = ToDo::where('status','=','done')->delete();

        // fetch remaining todos
        $after_deleted_todo_lists = ToDo::orderBy('id', 'desc')
            ->get();

        if (count($after_deleted_todo_lists) > 0) {
            return $after_deleted_todo_lists;
        } else {
            return NULL;
        }
    }
}
