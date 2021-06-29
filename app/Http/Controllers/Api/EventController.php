<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::all(), 200);
    }

    public function showSubscribers($id)
    {
        return response()->json(Event::find($id)->user, 200);
    }
}