<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function users(Request $request){
        $ids = Test::query()->pluck('id');
        $leads = Test::query()->whereIn('id', $ids)->get();
        return view('welcome');
    }
    public function index(Request $request)
    {
        $users = Test::all();

        $html = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                <th width="60px">Id</th>
                <th>Name</th>
                <th width="90px">Edit</th>
                <th width="90px">Delete</th>
                </tr>';

        foreach ($users as $user) {
            $html .=
                '<tr><td align="center">' .
                $user->id .
                "</td><td>" .
                $user->first_name .
                " " .
                $user->last_name .
                '</td><td align="center"><button class="edit-btn" data-eid="' .
                $user->id .
                '">Edit</button></td><td align="center"><button Class="delete-btn" data-id="' .
                $user->id .
                '">Delete</button></td></tr>';
        }

        $html .= "</table>";

        return response()->Json(["putit" => $html]);
    }

    public function store(Request $request)
    {
        $user = new Test();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return true;
    }

    public function delete(Request $request)
    {
        $user = Test::find($request->id);
        $user->delete();

        return true;
    }

    public function updateform(Request $request)
    {
        $user = Test::find($request->id);

        $html = "";

        $html .=
            "<tr>
        <td width='90px'>First Name</td>
        <td><input type='text' id='edit-fname' value='" .
            $user->first_name .
            "'>
            <input type='text' id='edit-id' hidden value='" .
            $user->id .
            "'>
        </td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td><input type='text' id='edit-lname' value='" .
            $user->last_name .
            "'></td>
      </tr>
      <tr>
        <td></td>
        <td><input type='submit' id='edit-submit' value='save'></td>
      </tr>";

        return response()->Json(["success" => $html]);
    }

    public function update(Request $request)
    {
        $user = Test::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return true;
    }

    public function search(Request $request)
    {
        $searchterm = $request->search;

        $users = DB::table("test")
            ->where("first_name", "LIKE", "%" . $searchterm . "%")
            ->orwhere("last_name", "LIKE", "%" . $searchterm . "%")
            ->get();

        $html = "";

        $html .= '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
        <tr>
          <th width="60px">Id</th>
          <th>Name</th>
          <th width="90px">Edit</th>
          <th width="90px">Delete</th>
        </tr>';

        if (count($users) > 0) {
            foreach ($users as $user) {
                $html .=
                    "<tr><td align='center'>" .
                    $user->id .
                    "</td><td>" .
                    $user->first_name .
                    " " .
                    $user->last_name .
                    "</td><td align='center'><button class='edit-btn' data-eid=" .
                    $user->id .
                    ">Edit</button></td><td align='center'><button Class='delete-btn' data-id=" .
                    $user->id .
                    ">Delete</button></td></tr>";
            }
        } else {
            $html .= "<h2>No Record Found.</h2>";
        }

        $html .= "</table>";

        return response()->Json(["success" => $html]);
    }
}
