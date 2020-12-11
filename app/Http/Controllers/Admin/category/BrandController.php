<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\model\admin\brand;
use Illuminate\Http\Request;
use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brand'] = brand::all();
        $data['count'] = 1;
        return view('admin.category.brand.index')->with($data);
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
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
            'brand_logo' => 'required',
        ]);
        $image = $request->file('brand_logo');
        $ext = '.'.strtolower($image->getClientOriginalExtension());
        $brand = new brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_logo = $ext;
        $brand->save();
        $id = $brand->id;        
        $image_name = 'brand_logo-'.$id.$ext;
        $upload_path = 'public/frontend/images/brand/';
        $success = $image->move($upload_path,$image_name); 
        toast('Brand Inserted Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = brand::findorfail($id);
        return view('admin.category.brand.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands,brand_name,'.$id.',id|max:55',
        ]);
        $image = $request->file('brand_logo');
         
        if($image){
            $ext = '.'.strtolower($image->getClientOriginalExtension());
            unlink($request->old_logo);
            $brand = brand::findorfail($id);
            $brand->brand_name = $request->brand_name;
            $brand->brand_logo = $ext;
            $brand->save();            
            $id = $brand->id;        
            $image_name = 'brand_logo-'.$id.$ext;
            $upload_path = 'public/frontend/images/brand/';
            $success = $image->move($upload_path,$image_name);             
            toast('Brand Updated Successfully!','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
            return redirect()->to('admin/brand');
        }else{
            $data = [
                'brand_name' => $request['brand_name']
            ];
            $db = DB::table('brands')->where('id', $id)->update($data);       
            if($db){
                toast('Brand Updated Successfully!','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
                return redirect()->to('admin/brand');
            }
            else{
                toast('Nothing to updated','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#17a2b8')->animation('tada faster','fadeInUp faster')->timerProgressBar();
                return redirect()->to('admin/brand');
            }
            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = brand::findorfail($id);
        $image = $db->brand_logo;
        $db->delete();
        unlink("public/frontend/images/brand/brand_logo-$id$image");
        
        toast('Brand Deleted Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#dc3545')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->back();
    }
}