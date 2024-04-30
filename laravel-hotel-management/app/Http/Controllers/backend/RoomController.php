<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function EditRoom($id){
        $editData =Room::find($id);
        return view('backend.allroom.room.edit_rooms',compact('editData'));
    }
}
