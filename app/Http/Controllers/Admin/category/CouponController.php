<?php


namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\model\admin\coupon;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['coupon'] = coupon::orderBy('id', 'DESC')->get();
        $data['count'] = 1;
        return view('admin.category.coupon.index')->with($data);
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
            'coupon' => 'required|unique:coupons|max:50',
            'discount' => 'required|max:3',
        ]);
        $coupon = new coupon();
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();
        toast('Coupon Inserted Done','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\admin\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\admin\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $db = coupon::findorfail($id);
        return view('admin.category.coupon.edit',compact('db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\admin\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'coupon' => 'required|unique:coupons,coupon,'.$id.',id|max:50',
            'discount' => 'required|max:3',
        ]); 
        $data = [
            'coupon' => $request['coupon'],
            'discount' => $request['discount']
        ];
        $db = DB::table('coupons')->where('id',$id)->update($data);
        if($db){
            toast('Coupon Successfully Update','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#28a745')->animation('tada faster','fadeInUp faster')->timerProgressBar();
             return redirect()->to('admin/coupon');
        }
        else{
            toast('Nothing to update','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#17a2b8')->animation('tada faster','fadeInUp faster')->timerProgressBar();
             return redirect()->to('admin/coupon');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\admin\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = coupon::findorfail($id);
        $db->delete();
        toast('Coupon Deleted Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#dc3545')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->back();
    }
}
