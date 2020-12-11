<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\model\admin\category;
use App\model\admin\subcategory;
use Illuminate\Http\Request;
use DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data['subcategory'] = subcategory::all();
        $data['count'] = 1;
        $data['category'] = category::orderBy('category_name', 'ASC')->get();
        return view('admin.category.sub-category.index')->with($data);
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
            'category_name' => 'required|not_in:0',
            'subcategory_name' => 'required|unique:subcategories|max:50',
        ]);
        $subcategory = new subcategory();
        $subcategory->category_id = $request->category_name;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->save();
        toast('Sub-Category Inserted Done','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['subcategory'] = subcategory::findorfail($id);
        $data['category'] = category::orderBy('category_name', 'ASC')->get();
        return view('admin.category.sub-category.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|not_in:0',
            'subcategory_name' => 'required|unique:subcategories,subcategory_name,'.$id.'id|max:50',
        ]); 
        $data = [
            'category_id' => $request['category_name'],
            'subcategory_name' => $request['subcategory_name']
        ];
        $db = DB::table('subcategories')->where('id',$id)->update($data);
        if($db){
            toast('Sub-Category Successfully Update','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
             return redirect()->to('admin/subcategory');
        }
        else{
            toast('Nothing to update','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#17a2b8')->animation('tada faster','fadeInUp faster')->timerProgressBar();
             return redirect()->to('admin/subcategory');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = subcategory::findorfail($id);
        $db->delete();
        toast('Sub-Category Deleted Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#dc3545')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->back();
    }
}
