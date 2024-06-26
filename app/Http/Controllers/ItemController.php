<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ClaimedItem;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemStoreRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemStoreRequest $request)
    {
        try {
            $imageName = Str::random(32) . "." . $request->image->getClientOriginalExtension();

            Item::create([
                'image' => $imageName,
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'location_id' => $request->location_id,
                'datefound' => $request->datefound,
                // 'status' => $request->status,
            ]);

            Storage::disk('public')->put($imageName, file_get_contents($request->image));

            return response()->json([
                'message' => "Item successfully created."
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'item not found'], 404);
        }

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'item not found'], 404);
        }
        try {
            $item = Item::findOrFail($id); 

         
            $request->validate([
                'image' => 'nullable|image|max:2048', // Image is optional
                'name' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|required|string',
                'category_id' => 'sometimes|required|integer',
                'location_id' => 'sometimes|required|integer',
                'datefound' => 'sometimes|required|date',
                // 'status' => 'sometimes|required|string|max:255'
            ]);

          
            if ($request->hasFile('image')) {
            
                $imageName = Str::random(32) . "." . $request->image->getClientOriginalExtension();
            
                Storage::disk('public')->put($imageName, file_get_contents($request->image));
             
                if (Storage::disk('public')->exists($item->image)) {
                    Storage::disk('public')->delete($item->image);
                }
            
                $item->image = $imageName;
            }

       
            $item->update($request->only('name', 'description', 'category_id', 'location_id', 'datefound', 'status'));

          
            $item->save();

            return response()->json([
                'message' => 'Item successfully updated.',
                'item' => $item
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'item not found'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'item deleted successfully']);
    }

     public function search($name)
    {
        return Item::where('name', 'like', '%' . $name . '%')->get();
    }

   public function updateStatus(Request $request, string $id)
{
    try {
        $item = Item::findOrFail($id);

         if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

      
        $request->validate([
            'status' => 'required|integer|in:0,1' 
        ]);

      
        if ($item->status == 1 && $item->users_id != Auth::user()->id) {
            return response()->json([
                'message' => 'This item is already claimed by another user.'
            ], 403);
        }

     
        $item->status = $request->status;

      
        if ($request->status == 1) {
         
            $existingClaim = ClaimedItem::where('item_id', $item->id)->first();
            if ($existingClaim) {
                return response()->json([
                    'message' => 'You already claimed this item.'
                ], 403);
            }

          
            ClaimedItem::create([
                'item_id' => $item->id,
                'users_id' => Auth::user()->id,
                'claimed_at' => now(),
            ]);

          
            $item->users_id = Auth::user()->id;
        } else {
          
            $item->users_id = null;
        }

     
        $item->save();

        return response()->json([
            'message' => 'Item status successfully updated.',
            'item' => $item
        ], 200);

    } catch (\Exception $e) {
     
        Log::error('Error updating item status: ' . $e->getMessage());
        return response()->json([
            'message' => $e->getMessage()
        ], 500);
    }
}


}