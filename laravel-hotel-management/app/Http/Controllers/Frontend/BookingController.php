<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
public function CheckOut(){
    return view('frontend.checkout.checkout');
}
public function UserBookingStore(Request $request){
    $userDataValidate= $request->validate([
        'check_in' =>'required',
        'check_out' =>'required',
        'nmbr_person' =>'required',
        'number_of_rooms' =>'required',
        
    ]);

}

}
