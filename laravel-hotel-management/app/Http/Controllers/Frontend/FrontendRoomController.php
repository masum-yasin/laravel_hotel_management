<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\roomNumber;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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

public function BookingSearch(Request $request){
    $request->flash();
    if($request->check_in==$request->check_out){
    $notification = array(
    'message' => 'Something Want to Wrong',
    'alert-type' => 'error'
    );
    return redirect()->back()->with($notification);
    $sDate = date('Y-m-d', strtotime($request->check_in));
    $eDate = date('Y-m-d',strtotime($request->check_out));
    $allDate = Carbon::create($eDate)->subDay();
    $d_period = CarbonPeriod::create($allDate,$sDate);

}

}