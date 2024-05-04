<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Room;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class RoomController extends Controller
{
    public function EditRoom($id){
        $basic_facility =Facility::where('rooms_id',$id)->get();
        $editData =Room::find($id);
        return view('backend.allroom.room.edit_rooms',compact('editData','basic_facility'));
    }

    public function UpdateRoom(Request $request,$id){
        $room =Room::find($id);
        $room->roomtype_id = $room->roomtype_id;
        $room->total_adult = $request->total_adult;
        $room->total_child = $request->total_child;
        $room->total_price = $request->total_price;
        $room->total_size = $request->total_size;
        $room->total_discount = $request->discount;
        $room->room_capacity= $request->room_capacity;
        $room->view = $request->view;
        $room->bed_style = $request->bed_style;
        $room->short_desc = $request->short_desc;
        $room->description = $request->description;
        $room->short_desc = $request->short_desc;

        // Update Single Image//
        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(550,850)->save('upload/team/'.$name_gen);
          $room['image'] = $name_gen;
        }
        $room->save();
    }
}
