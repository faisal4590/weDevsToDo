<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\DAL\CreateDAL;
use App\Http\Controllers\DAL\DeleteDAL;
use App\Http\Controllers\DAL\ViewDAL;
use App\Http\Controllers\DAL\EditDAL;
use App\Http\Controllers\DAO\DaoFactory;

class ToDoController extends Controller
{
    //
    public function insert_to_do_api(Request $request)
    {
        $create_dal = new CreateDAL;

        $to_do_with_response = $create_dal->add_to_do($request);

        //dd($request->author);

        if (count($to_do_with_response) > 0) {

            $response_message = "To do inserted successfully!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $payload["new_to_do"] = $to_do_with_response;
            $response = $dao->make_response(200, $payload);
            return $response;
        } else {
            $response_message = "Failed!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $response = $dao->make_response(400, $payload);
            return $response;
        }
    }

    public function get_all_todos()
    {
        $view_dal = new ViewDAL;

        $all_todos = $view_dal->get_all_todos();
        if (count($all_todos) > 0) {

            $response_message = "All todos fetched successfully!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $payload["all_todos"] = $all_todos;
            $response = $dao->make_response(200, $payload);
            return $response;
        } else {
            $response_message = "Failed!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $response = $dao->make_response(400, $payload);
            return $response;
        }
    }

    public function todo_done_api(Request $request)
    {
        $edit_dal = new EditDAL;

        $updated_todo = $edit_dal->update_todo_status($request->todo_id);

        if (count($updated_todo) > 0) {

            $response_message = "TODO status updated successfully!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $payload["updated_todo"] = $updated_todo;
            $response = $dao->make_response(200, $payload);
            return $response;
        } else {
            $response_message = "Failed!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $response = $dao->make_response(400, $payload);
            return $response;
        }
    }

    public function get_completed_todos()
    {
        $view_dal = new ViewDAL;

        $completed_todos = $view_dal->get_completed_todos();

        if (count($completed_todos) > 0) {

            $response_message = "Completed todos fetched successfully!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $payload["completed_todos"] = $completed_todos;
            $response = $dao->make_response(200, $payload);
            return $response;
        } else {
            $response_message = "Failed!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $response = $dao->make_response(400, $payload);
            return $response;
        }
    }
    public function get_all_active_todos()
    {
        $view_dal = new ViewDAL;

        $active_todos = $view_dal->get_all_active_todos();

        if (count($active_todos) > 0) {

            $response_message = "Active todos fetched successfully!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $payload["active_todos"] = $active_todos;
            $response = $dao->make_response(200, $payload);
            return $response;
        } else {
            $response_message = "Failed!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $response = $dao->make_response(400, $payload);
            return $response;
        }
    }

    public function remove_todo(Request $request)
    {
        $delete_dal = new DeleteDAL;

        $after_deleted_todo_lists = $delete_dal->remove_todo($request->todo_id);

        if (count($after_deleted_todo_lists) > 0) {

            $response_message = "After deleted, fetched remaining todos successfully!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $payload["after_deleted_todo_lists"] = $after_deleted_todo_lists;
            $response = $dao->make_response(200, $payload);
            return $response;
        } else {
            $response_message = "Failed!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $response = $dao->make_response(400, $payload);
            return $response;
        }
    }

    public function clear_all_completed_todos()
    {
        $delete_dal = new DeleteDAL;

        $after_deleted_todo_lists = $delete_dal->clear_all_completed_todos();

        if (count($after_deleted_todo_lists) > 0) {

            $response_message = "After deleted, fetched remaining todos successfully!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $payload["after_deleted_todo_lists"] = $after_deleted_todo_lists;
            $response = $dao->make_response(200, $payload);
            return $response;
        } else {
            $response_message = "Failed!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $response = $dao->make_response(400, $payload);
            return $response;
        }
    }

    public function update_todo(Request $request)
    {
        $edit_dal = new EditDAL;

        $after_edited_todo_lists = $edit_dal->update_todo($request->to_do_id, $request->to_do_msg);

        if (count($after_edited_todo_lists) > 0) {

            $response_message = "After edited, fetched updated todos successfully!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $payload["after_edited_todo_lists"] = $after_edited_todo_lists;
            $response = $dao->make_response(200, $payload);
            return $response;
        } else {
            $response_message = "Failed!";

            $dao = new DaoFactory;

            $payload = array();

            $payload["response"] = $response_message;
            $response = $dao->make_response(400, $payload);
            return $response;
        }
    }
}
