<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sitesettings = SiteSetting::all();
        return view('admin.sitesetting.index', [
            'sitesettings' => $sitesettings,
            'page_title' => 'SiteSettings'
        ]);
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
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteSetting $siteSetting, $id)
    {
        $sitesetting = SiteSetting::find($id);
        return view("admin.sitesetting.update", [
            "sitesetting" => $sitesetting
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteSetting $siteSetting)
    {
        $this->validate($request,[
            'govn_name'=>'string',
            'ministry_name'=>'string',
            'department_name'=>'required|string',
            'office_name'=>'required|string',
            'office_address'=>'required|string',
            'office_contact'=>'required|string',
            'office_mail'=>'required|string',
            'slogan' => 'string',
            'main_logo'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'side_logo'=>'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'face_link'=>'url',
            'insta_link'=>'url',
            'social_link'=>'url',
        ]);

        $sitesetting = SiteSetting::find($request->id);

        if ($request->hasFile('main_logo')) {

            $newMainLogo = time() . '-' . '.' .$request->main_logo->extension();
            $request->main_logo->move(public_path('uploads/sitesetting/'), $newMainLogo );
    
          
            Storage::delete('public/uploads/sitesetting/' . $sitesetting->main_logo);
            $sitesetting->main_logo =  $newMainLogo;
        }

        if ($request->hasFile('side_logo')) {

            $newSideLogo = time() . '-' . '.' .$request->side_logo->extension();
            $request->side_logo->move(public_path('uploads/sitesetting/'), $newSideLogo );
    
          
            Storage::delete('public/uploads/sitesetting/' . $newSideLogo);
            $sitesetting->side_logo =  $newSideLogo;
        }

        $sitesetting->govn_name=$request->govn_name;
        $sitesetting->ministry_name=$request->ministry_name;
        $sitesetting->department_name=$request->department_name;
        $sitesetting->office_name=$request->office_name;
        $sitesetting->office_address=$request->office_address;
        $sitesetting->office_contact=$request->office_contact;
        $sitesetting->office_mail=$request->office_mail;
        $sitesetting->slogan=$request->slogan;
        $sitesetting->main_logo= $newMainLogo ;
        $sitesetting->side_logo=$newSideLogo;
        $sitesetting->facebook_link=$request->face_link;
        $sitesetting->instagram_link=$request->insta_link;
        $sitesetting->social_link=$request->social_link;


        $sitesetting->save();

        return redirect('admin/sitesetting/index')->with(['successMessage'=>'Success !! Site Settings Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteSetting $siteSetting, $id)
    {
        //
        $sitesetting = SiteSetting::find($id);
        $sitesetting->delete();

        return redirect('admin/sitesetting/index')->with(['successMessage' =>'Deleted Sitesetting']);
    }
}
