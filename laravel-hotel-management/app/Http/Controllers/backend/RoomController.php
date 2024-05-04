<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\MultiImage;
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
    // Update For Room

    public function UpdateRoom(Request $request,$id){
        $room =Room::find($id);
        $room->roomtype_id = $room->roomtype_id;
        $room->total_adult = $request->total_adult;
        $room->total_child = $request->total_child;
        $room->price = $request->price;
        $room->size = $request->size;
        $room->discount = $request->discount;
        $room->room_capacity= $request->room_capacity;
        $room->view = $request->view;
        $room->bed_style = $request->bed_style;
        $room->short_desc = $request->short_desc;
        $room->description = $request->description;
        $room->short_desc = $request->short_desc;

        // Update Single Image//
        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(550,850)->save('upload/roomimg/'.$name_gen);
          $room['image'] = $name_gen;
        }
        $room->save();

        // Update for facility table//
    if($request->facility_name == NULL){
        $notification = array(
            'message' => 'Sorry! Not Any Basic facility Item Select',
            'alert-type' => 'error', 
        );
        return redirect()->back()->with($notification);
    }
    else {
      Facility::where('rooms_id',$id)->delete();
      $facilities = count($request->facility_name);
      for($i = 0; $i<$facilities; $i++ ){
        $fcount = new Facility();
        $fcount->rooms_id = $room->id;
        $fcount->facility_name = $request->facility_name[$i];
        $fcount->save();
      } 
    //   end for
     
    }
    // end else
  

    // Update Multi Image//

    if ($room->save()) {
        $files = $request->multi_img;
        if (!empty($files)) {
            // Fetch and delete existing images
            MultiImage::where('rooms_id', $id)->delete();
            
            foreach ($files as $file) {
                // Check if $file is null
                if ($file === null) {
                    continue; // Skip to the next iteration
                }
    
                // Check if $file is a valid file upload object
                if (!is_object($file)) {
                    continue; // Skip if $file is not an object
                }
    
                // Process each file
                $imgName = date('YmdHi') . $file->getClientOriginalName();
                $file->move('upload/roomimg/multi_img/', $imgName);
    
                // Create a new MultiImage instance for each file
                $subimage = new MultiImage();
                $subimage->rooms_id = $room->id; // Assuming $room is available here
                $subimage->multi_img = $imgName; // Save the file name, not the file itself
                $subimage->save();
            }
        }
    }
    



    // if( $room->save()){
    //     $files = $request->multi_img;
    //     if(!empty($files)){
    //         $subimage = MultiImage::where('rooms_id',$id)->get()->toArray();
    //         MultiImage::where('rooms_id', $id)->delete();
    //     }
    //     if(!empty($files)){
    //         foreach($files as $file){
    //             $imgName = date('YmdHi') .  $file->getClientOriginalName();
    //             $file->move('upload/roomimg/multi_img/', $imgName);
    //             $subimage['multi_img'] = $imgName;
    //             $subimage = new MultiImage();
    //             $subimage->rooms_id = $room->id;
    //             $subimage->multi_img =$imgName;
    //             $subimage->save();
    //         }
    //     }


    // }
    // end if

   
        $notification = array(
            'message' => 'Room Updated Successfully',
            'alert-type' => 'success', 
        );
        return redirect()->back()->with($notification);

    }
  
    
}
