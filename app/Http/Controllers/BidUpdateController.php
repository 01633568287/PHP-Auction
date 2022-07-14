<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\BidUpdate;

class BidUpdateController extends Controller
{
    public function getPusher(){
        // gọi ra trang view demo-pusher.blade.php
        return view("bids_update/notifications");
    }
    public function fireEvent(){
        return view("bids_update/bid");
        // Truyền message lên server Pusher
//        $price = request()->price;
//        event(new BidUpdate("Bid updated"));
//        return "Message has been sent.";
    }
}
