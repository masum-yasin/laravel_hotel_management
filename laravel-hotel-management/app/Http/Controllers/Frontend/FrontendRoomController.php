<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\roomNumber;

use Intervention\Image\Facades\Image;

class FrontendRoomController extends Controller{
public function AllFrontendRoomList(){
$rooms = Room::latest()->get();

return view('frontend.room.room_all',compact('rooms'));
}
public function RoomDetailsPage($id){
    $RoomDetails = Room::find($id);
    $Facility = Facility::where('rooms_id',$id)->get();
    $otherRoom = Room::where('id','!=',$id)->orderBy('id','DESC')->limit(2)->get();
    return view('frontend.room.room_details',compact('RoomDetails', 'Facility', 'otherRoom'));
}

}