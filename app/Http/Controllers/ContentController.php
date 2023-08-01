<?php

namespace App\Http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Image;
use Illuminate\Support\Str;
class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::Paginate(5);
        return view('Content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request){
        $contents = new Content();

        if($request->hasFile('image')){
            $filename = Str::random(10). '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path(). '/storeImg/', $filename);
            $contents->image =  $filename;
        } else{
            $contents->image = 'No Image';
        }

        $contents->name = $request->name;
        $contents->description = $request->description;
        $contents->save();
        toast('บันทึกข้อมูลสำเร็จ','success');
        return redirect()->route('Content.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contents = Content::find($id);
        return view('Content.edit', compact('contents'));
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
        $contents = Content::find($id);

        if($request->hasFile('image')){
            if($contents->image){
                File::delete(public_path(). '/storeImg/'.$contents->image);
            }
            $filename = Str::random(10). '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path(). '/storeImg/', $filename);
            $contents->image =  $filename;
        } else{
            $contents->image = 'No Image';
        }

        $contents->name = $request->name;
        $contents->description = $request->description;

        $contents->save();
        toast('อัพเดตข้อมูลสำเร็จ','success');

        return redirect()->route('Content.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::find($id);
        if($content->image){
            File::delete(public_path(). '/storeImg/'.$content->image);
        }
        $content->delete();
        toast('ลบข้อมูลสำเร็จ','success');
        return redirect()->route('Content.index')->with('success', 'content deleted successfully.');
    }
}
