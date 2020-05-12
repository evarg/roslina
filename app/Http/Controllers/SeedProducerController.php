<?php

namespace App\Http\Controllers;

use App\SeedProducer;
use Illuminate\Http\Request;
use App\Http\Requests\SeedProducerUpdateRequest;
use App\Http\Requests\SeedProducerStoreRequest;

class SeedProducerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seed_producers = SeedProducer::all();
        return response()->json($seed_producers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeedProducerStoreRequest $request)
    {
        $seed_producer = new SeedProducer;
        $seed_producer->name = $request->input('name');
        $seed_producer->description = $request->input('description');
        $seed_producer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SeedProducer  $seedProducer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seed_producer = SeedProducer::findOrFail($id);
        return response()->json($seed_producer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeedProducer  $seedProducer
     * @return \Illuminate\Http\Response
     */
    public function update(SeedProducerUpdateRequest $request, $id)
    {
        $seed_producer = SeedProducer::findOrFail($id);
        $seed_producer->name = $request->input('name');
        $seed_producer->description = $request->input('description');
        $seed_producer->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeedProducer  $seedProducer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SeedProducer::where('id', $id)->delete();
    }

}
