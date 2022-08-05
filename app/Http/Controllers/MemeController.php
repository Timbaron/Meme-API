<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memes = Meme::with('owner')->where('type','clean')->latest()->get();
        return response()->json([
            'memes' => $memes,
            'status' => 'success',
        ]);
    }

    public function dark()
    {
        $memes = Meme::with('owner')->where('type', 'dark')->latest()->get();
        return response()->json([
            'memes' => $memes,
            'status' => 'success',
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'meme' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'meme' => 'required|url',
            'type' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        // check if url is a valid image
        $headers = get_headers($request->meme);
        if (strpos($headers[0], '200') === false) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid image url',
            ]);
        }
        $meme = Meme::create([
            'meme_url' => $request->meme,
            'type' => $request->type,
            'user_id' => auth()->user()->id,
            'caption' => $request->caption,
        ]);
        // $user_id = auth()->id();
        // $images = $request->file('meme');
        // $name = time();
        // $extension = $images->getClientOriginalExtension();
        // $fileNameToStore = $name . '.' . $extension;

        // $memes = [
        //     'user_id' => $user_id,
        //     'meme_url' => config('app.url') . 'storage/memes/' . $fileNameToStore,
        //     'caption' => $request->caption,
        //     'type' => $request->type,
        // ];
        // $meme = Meme::create($memes);
        // $images->storeAs('public/memes', $fileNameToStore);

        return response()->json([
            'message' => 'Meme uploaded successfully',
            'meme' => $meme,
            'status' => 'success',
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function show(Meme $meme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meme $meme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meme  $meme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meme $meme)
    {
        //
    }
}
