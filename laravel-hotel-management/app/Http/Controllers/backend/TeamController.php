<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team; 

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
// Image::make($image)->resize(550,670)->save('upload/team/'.$name_gen);
    }
}
