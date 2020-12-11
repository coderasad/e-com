<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\model\admin\category;
use App\model\admin\subcategory;
use Illuminate\Http\Request;
use DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data['category'] = category::orderBy('category_name', 'ASC')->get();
        // $data['category'] = DB::table('categories')->join('subcategories','subcategories.category_id','categories.id')->select('categories.*','subcategories.*')->get();
        $data['count'] = 1;
        return view('admin.category.category.index')->with($data);
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
            'category_name' => 'required|unique:categories|max:55',
        ]);
        $image = $request->file('img');
        $image_name = 'category_image_'.rand(100,999).'.'.strtolower($image->getClientOriginalExtension());
        $upload_path = "public/frontend/images/category/";
        $image->move($upload_path,$image_name);

        $category = new category();
        $category->category_name = $request->category_name;
        $category->img = $image_name;
        $category->save();
        toast('Category Inserted Done','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = category::findorfail($id);
        return view('admin.category.category.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories,category_name,' .$id. ',id',
        ]); 
        $image = $request->file('img');
        if($image){
            $image_name = 'category_image_'.rand(100,999).'.'.strtolower($image->getClientOriginalExtension());
            if($request->old_logo){
                unlink($request->old_logo);
            }
            $upload_path = "public/frontend/images/category/";
            $image->move($upload_path,$image_name);

            $data = [
                'category_name' => $request['category_name'],
                'img' => $image_name
            ];
            $db = DB::table('categories')->where('id',$id)->update($data);
            if($db){
                toast('Category Successfully Update','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
                 return redirect()->to('admin/category');
            }
        }
        else{
            $data = [
                'category_name' => $request['category_name'],
            ];
            $db = DB::table('categories')->where('id',$id)->update($data);
            if($db){
                toast('Category Successfully Update','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
                 return redirect()->to('admin/category');
            }
            else{
                toast('Nothing to update','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#17a2b8')->animation('tada faster','fadeInUp faster')->timerProgressBar();
                 return redirect()->to('admin/category');
            } 
        }

        
    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // $db = DB::table('categories')
        // ->join('subcategories','subcategories.category_id', 'categories.id')
        // // ->Where('categories.id', $id)->
        // ->Where('categories.id', '!=', $id)->delete();
        // return redirect()->back();



        $subcat = DB::table('subcategories')
                ->Where('category_id',$id)
                ->get();        
        if(count($subcat) > 0){
            toast('Error!!! This Category relation Sub-Category','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#17a2b8')->animation('tada faster','fadeInUp faster')->timerProgressBar();
            return redirect()->back();
        }else{
            $db = DB::table('categories')
            ->Where('categories.id', $id)
            ->delete();
            toast('Category Deleted Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#dc3545')->animation('tada faster','fadeInUp faster')->timerProgressBar();
            return redirect()->back();
        }
    }
}
