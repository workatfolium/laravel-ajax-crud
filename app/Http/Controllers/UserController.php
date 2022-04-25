<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){

        $users = Test::all();

        $html = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
                <tr>
                <th width="60px">Id</th>
                <th>Name</th>
                <th width="90px">Edit</th>
                <th width="90px">Delete</th>
                </tr>';

        foreach($users as $user){
            $html .= '<tr><td align="center">'.$user->id.'</td><td>'.$user->first_name.' '.$user->last_name.'</td><td align="center"><button class="edit-btn" data-eid="'.$user->id.'">Edit</button></td><td align="center"><button Class="delete-btn" data-id="'.$user->id.'">Delete</button></td></tr>';
        }

        $html .= '</table>';

        return response()->Json(['putit'=>$html]);
        
    }
}
