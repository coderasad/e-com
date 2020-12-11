<?php
namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\model\author\Wishlist;

class WishlistController extends Controller
{
    public function addWishList($id){
        $userID = Auth::id();
        $productId = $id;
        $checked = wishlist::where('product_id',$id)->where('user_id',$userID)->first();
        if(Auth::check()){
            if($checked != NULL){                
                $checked->delete();
                echo"<div class='alert alert-warning' role='alert'>
                        <button type='button' class='close ml-3' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true' class='pointer'>&times;</span>
                        </button>
                        <div class='d-flex align-items-center justify-content-start'>
                            <i class='fas fa-info-circle mr-2'></i>
                            <span><strong>Product Remove Wishlist</strong></span>
                        </div>
                    </div>";
            }
            else{
                $wishlist = new wishlist();
                $wishlist->user_id = $userID;
                $wishlist->product_id = $id;
                $wishlist->save();
                echo "<div class='alert alert-success' role='alert'>
                        <button type='button' class='close ml-3' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true' class='pointer'>&times;</span>
                        </button>
                        <div class='d-flex align-items-center justify-content-start'>
                            <i class='fas fa-check-circle mr-2'></i>
                            <span><strong>Wishlist Successfully added</strong></span>
                        </div>
                    </div>";
            }
        }
        else{
            echo "<div class='alert alert-danger' role='alert'>
            <button type='button' class='close ml-3' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true' class='pointer'>&times;</span>
            </button>
            <div class='d-flex align-items-center justify-content-start'>
              <i class='fas fa-window-close mr-2'></i>
              <span><strong>At first Login your account</strong></span>
            </div>
          </div>";
        }
        
    }
    // wishlist add==================
    public function wishlist(){
        if(Auth::check()){ 
            $data['wishlist'] = DB::table('wishlists')
                                ->join('products','wishlists.product_id','products.id')
                                ->select('products.*','wishlists.user_id','wishlists.id as wid')
                                ->where('user_id',Auth::id())
                                ->get();
            return view('author.wishlist')->with($data);
        }else{
            toast('At first login your account','toast_success')->position('top-end')->width('auto')->padding('5px')->background('#28a745')->timerProgressBar();  
            return view("auth.login");              
        } 
        
    } 
    // wishlist remove ==================
    public function wishlist_remove($pid){

        $db = wishlist::where('product_id',$pid)->first();
        $db->delete();
        
        return response()->json(
            "<div class='alert alert-danger' role='alert'>
                <button type='button' class='close ml-3' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true' class='pointer'>&times;</span>
                </button>
                <div class='d-flex align-items-center justify-content-start'>
                    <i class='fas fa-info-circle mr-2'></i>
                    <span><strong>Wishlist Removed Successfully</strong></span>
                </div>
            </div>"
        ); 
    } 
    
}
