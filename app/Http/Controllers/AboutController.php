<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', [
            'abouts' => $abouts,
            'page_title' => 'About Us'
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
        $this->validate($request, [
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'content' => 'required|string',
        ]);

        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/about/'), $newImageName);

        $about = new About;

        $about->title = $request->title;
        $about->image = $newImageName;
        $about->content = $request->content;
        $about->save();

        return redirect('admin/about/index')->with(['successMessage' => 'About Page Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about, $id)
    {
        $about = About::find($id);
        return view('admin.about.update', ['about' => $about, 'page_title' =>'Update About']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required|string',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
                'content' => 'required|string',
        ]);
       
            $about = About::find($request->id);
            
            if ($request->hasFile('image')) {
            
            $newImageName = time() . '-' . $request->title . '.' .$request->image->extension();
            $request->image->move(public_path('uploads/about/'), $newImageName );
            Storage::delete('public/uploads/about/' . $about->image);
                $about->image = $newImageName;
            }
            

            $about->title = $request->title;
            $about->image = $newImageName;
            $about->content = $request->content;

            $about->save();

            return redirect('admin/about/index')->with(['successMessage' => 'About Page Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about, $id)
    {
        $about = About::find($id);
        $about->delete();
        return redirect('admin/about/index')->with(['successMessage' => 'About Page Deleted']);
    }
}
