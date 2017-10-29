<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Song::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!is_array($request->all())) {
            return ['error' => 'request must be an array'];
        }
        // Create validation rules
        $rules = [
          'id' => 'required|integer|unique:songs',
          'songname'      => 'required',
          'url'     => 'required|unique:songs',
          'artistid'  => 'required|integer',
          'artistname' => 'required',
          'albumid' => 'required|integer',
          'albumname' => 'required'
        ];

        try{
          // Execute validator, in case of failing return response
          $validator = \Validator::make($request->all(), $rules);
          if ($validator->fails()) {
              return [
                  'created' => false,
                  'errors'  => $validator->errors()->all()
              ];
          }
          Song::create($request->all());
          return ['created' => true];
        } catch (Exception $e) {
          \Log::info('Error creating song: '.$e);
          return \Response::json(['created' => false], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $song = Song::findOrFail($id);

      return $song;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $song = Song::find($id);
        $song->update($request->all());
        return ['updated' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $song = Song::find($id);
      $song->delete();
      return ['deleted' => true];
    }
}
