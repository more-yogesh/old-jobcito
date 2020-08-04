<?php

namespace App\Http\Controllers;

use App\EmployerGallery;
use Illuminate\Http\Request;

class EmployerGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = EmployerGallery::where('user_id', auth()->id())->take(6);
        return view('company-gallery.index', compact('galleries'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmployerGallery  $employerGallery
     * @return \Illuminate\Http\Response
     */
    public function show(EmployerGallery $employerGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmployerGallery  $employerGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployerGallery $employerGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmployerGallery  $employerGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployerGallery $employerGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmployerGallery  $employerGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployerGallery $employerGallery)
    {
        //
    }
}
