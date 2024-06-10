<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\ClaimedItem;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Log;

class ClaimedItemController extends Controller
{
    public function getClaimedItems()
    {
    try {
    $claimedItems = ClaimedItem::where('users_id', Auth::user()->id)->with('item')->get();

    return response()->json([
    'claimed_items' => $claimedItems
    ], 200);

    } catch (\Exception $e) {
  
    Log::error('Error fetching claimed items: ' . $e->getMessage());
    return response()->json([
    'message' => $e->getMessage()
    ], 500);
    }
    }

    

}
