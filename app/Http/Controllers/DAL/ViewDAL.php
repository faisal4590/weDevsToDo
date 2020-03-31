<?php

namespace App\Http\Controllers\DAL;

use App\ToDo;


class ViewDAL
{
    public function get_all_todos()
    {
        // getting all videos with contributors and tags
        $to_do_lists = ToDo::orderBy('id', 'desc')
            ->get();
        return $to_do_lists;

        if (count($to_do_lists->toArray()) > 0) {
            return $to_do_lists->toArray();
        } else {
            return NULL;
        }
    }

    public function get_completed_todos()
    {
        $completed_to_do_lists = ToDo::where('status','=','done')
            ->orderBy('id', 'desc')
            ->get();
        return $completed_to_do_lists;

        if (count($completed_to_do_lists->toArray()) > 0) {
            return $completed_to_do_lists->toArray();
        } else {
            return NULL;
        }
    }
    
    public function get_all_active_todos()
    {
        $active_todos = ToDo::where('status','=','new')
            ->orderBy('id', 'desc')
            ->get();
        return $active_todos;

        if (count($active_todos->toArray()) > 0) {
            return $active_todos->toArray();
        } else {
            return NULL;
        }
    }
}
