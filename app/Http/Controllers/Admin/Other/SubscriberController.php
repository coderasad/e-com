<?php

namespace App\Http\Controllers\Admin\Other;

use App\Http\Controllers\Controller;
use App\model\admin\Subscriber;
use Illuminate\Http\Request;
use DB;


class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subscriber'] = subscriber::orderBy('id', 'DESC')->get();
        $data['count'] = 1;
        return view('admin.other.subscriber.index')->with($data);
    }
    // seoSetting
    public function seoSetting()
    {
        $data['seo'] = DB::table('seo')->get();        
        return view('admin.other.subscriber.seo_setting')->with($data);
    }
    // seoSettingUpdate
    public function seoSettingUpdate(Request $request)
    {
        $id = $request->id;
        $data = [
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_tag' => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,
            'bing_analytics' => $request->bing_analytics,
        ];      
        DB::table('seo')->where('id',$id)->update($data);
        toast('Successfully Update SEO Setting','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();  
        return redirect()->back();
    }

    public function destroy($id)
    {
        $db = subscriber::findorfail($id);
        $db->delete();
        toast(' Deleted Successfully','toast_success')->position('top-end')->width('auto')->padding('5px')->persistent(false)->autoClose(3000)->background('#dc3545')->animation('tada faster','fadeInUp faster')->timerProgressBar();
        return redirect()->back();
    }

    // siteSetting
    public function siteSetting()
    {
        echo "0k";
        die();
        $data['site'] = DB::table('sitesetting')->get();        
        return view('admin.other.site.site_setting')->with($data);
    }
    // siteSettingUpdate
    public function siteSettingUpdate(Request $request)
    {
        $id = $request->id;
        $data = [
            'phone_one' => $request->phone_one,
            'phone_two' => $request->phone_two,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'instragram' => $request->instragram,
            'twitter' => $request->twitter,
        ];      
        DB::table('sitesetting')->where('id',$id)->update($data);
        toast('Successfully Update Site Setting','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();  
        return redirect()->back();
    }
}
