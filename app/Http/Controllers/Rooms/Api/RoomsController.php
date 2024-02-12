<?php

namespace App\Http\Controllers\Rooms\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Detail;
use App\Http\Resources\PostResource;
use Ramsey\Uuid\Uuid;

class RoomsController extends Controller
{
    public function index()
    {
        //get all posts
        $rooms = Room::select('*')->orderBy('room_desc', 'asc')->get();

        //return collection of posts as a resource
        return new PostResource(true, 'Succesfully retrieve data', $rooms);
    }

    public function detailRoom($requestId)
    {

        $room =  Room::where('room_id',$requestId)->get();

        //return collection of posts as a resource
        return new PostResource(true, 'Succesfully retrieve room detail', $room);
    }

    public function createRoom(Request $request)
    {

        $detail =  Room::create([
            'room_id' => Uuid::uuid4()->getHex(),
            'room_desc' => $request->room_desc,
            'room_price' => $request->room_price
        ]);
        
        //get all posts
        $rooms = Room::select('*')->orderBy('room_desc', 'asc')->get();


        //return collection of posts as a resource
        return new PostResource(true, 'Succesfully create new room', $rooms);
    }

    public function editRoom(Request $request)
    {

        $reqDetail = [
            'nickname' => $request->nickname,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender
        ];

        $reqDetail = json_encode($reqDetail);

        $room = Room::where('room_id',$request->room_id);

        $room->update([
            'room_desc' => $request->room_desc,
            'room_price' => $request->room_price,
            'details' => $reqDetail
        ]);

        //get all posts
        $rooms = Room::select('*')->orderBy('room_desc', 'asc')->get();


        //return collection of posts as a resource
        return new PostResource(true, 'Succesfully create new room', $rooms);
    }

    public function deleteRoom($id)
    {
        $room = Room::where('room_id',$id);

        $room->delete();

        //get all posts
        $rooms = Room::select('*')->orderBy('room_desc', 'asc')->get();

        //return collection of posts as a resource
        return new PostResource(true, 'Succesfully delete room', $rooms);
    }

    
}
