<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team; 
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    public function AllTeam(){
        $team = Team::latest()->get();
        return view('backend.team.all_team',compact('team'));
    }

    public function TeamCreate(){
        return view('backend.team.create_team');
    }

    public function TeamStore(Request $request){
$image = $request->file('image');
$name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
Image::make($image)->resize(550,670)->save('upload/team/'.$name_gen);
$save_url = 'upload/team/'.$name_gen;
        Team::insert([
            'name' => $request->name,
            'position' => $request->position,
            'facebook' => $request->facebook,
            'image' => $save_url,
        ]);
        $notification = array(
            'message'=> 'Team Data Insert  Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('all.team')->with($notification);
    }

    public function TeamEdit($id){
        $team = Team::findOrFail($id);
        return view('backend.team.team_edit',compact('team'));
    }



    public function TeamUpdate(Request $request){
        $team_id = $request->id;
        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(550,670)->save('upload/team/'.$name_gen);
            $save_url = 'upload/team/'.$name_gen;
                    Team::findOrFail($team_id)->update([
                        'name' => $request->name,
                        'position' => $request->position,
                        'facebook' => $request->facebook,
                        'image' => $save_url,
                    ]);
                    $notification = array(
                        'message'=> 'Team Data Update With Image Successfully',
                        'alert-type'=> 'success',
                    );
                    return redirect()->route('all.team')->with($notification);
                } 
                else{
                    Team::findOrFail($team_id)->update([
                        'name' => $request->name,
                        'position' => $request->position,
                        'facebook' => $request->facebook,
                       
                    ]);
                    $notification = array(
                        'message'=> 'Team Data Update WithOut Image Successfully',
                        'alert-type'=> 'success',
                    );
                    return redirect()->route('all.team')->with($notification);
                }
        }



        public function TeamDelete($id){
            $item = Team::findOrFail($id);
            $img = $item->image;
            unlink($img);


            Team::findOrFail($id)->delete();
            
 $notification = array(
                'message'=> 'Team Data Delete Successfully',
                'alert-type'=> 'success',
            );
            return redirect()->back()->with($notification);

        }
    }


