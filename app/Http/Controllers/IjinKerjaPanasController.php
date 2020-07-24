<?php

namespace App\Http\Controllers;

use App\IjinKerjaPanas;
use App\Jsa;
use Illuminate\Http\Request;

class IjinKerjaPanasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Jsa $jsa)
    {
        return view('ijin-kerja-panas.create', compact('jsa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IjinKerjaPanas  $ijinKerjaPanas
     * @return \Illuminate\Http\Response
     */
    public function show(IjinKerjaPanas $ijinKerjaPanas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IjinKerjaPanas  $ijinKerjaPanas
     * @return \Illuminate\Http\Response
     */
    public function edit(IjinKerjaPanas $ijinKerjaPanas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IjinKerjaPanas  $ijinKerjaPanas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IjinKerjaPanas $ijinKerjaPanas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IjinKerjaPanas  $ijinKerjaPanas
     * @return \Illuminate\Http\Response
     */
    public function destroy(IjinKerjaPanas $ijinKerjaPanas)
    {
        //
    }
}
