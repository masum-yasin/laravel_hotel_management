<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function EditRoom($id){
        $basic_facility =Facility::where('rooms_id',$id)->get();
        $editData =Room::find($id);
        return view('backend.allroom.room.edit_rooms',compact('editData','basic_facility'));
    }
}
