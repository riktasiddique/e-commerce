<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Models\Cart;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\User;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home(MainCategory $mainCategory){
        return view('front.home', compact('mainCategory'));
    }
    public function products(){
        // $products = Product::all();
        $query = request()->get('query');
        if($query){
            $products = Product::orWhere('price', "LIKE", "%$query%")
            ->orWhere('quantity', "LIKE", "%$query%")
            ->orWhereHas('mainCategory', function($mainCategory) use($query){
               $mainCategory->where('name', "LIKE", "%$query%");
            })
            ->orWhereHas('subCategory', function($subCategory) use($query){
                $subCategory->where('name', "LIKE", "%$query%");
            })->paginate(18);
        }else{

            $products = Product::latest()->paginate(18);
        }
        return view('front.home.product', compact('products'));
    }
    public function categories(){
        // $products = Product::all();
        $categories = MainCategory::all();
        // $products = Product::latest()->paginate(6);
        $products = Product::all()->random(6);
        return view('front.home.categories', compact('products', 'categories'));
    }
    // Users Show Profile Method
    public function profile(){
        $user = auth()->user();
        return view('front.home.profile', compact('user'));
    }
    // Users Password Change Method
    public function passwordChange(Request $request){
        $request->validate([
            'newPassword' => 'required|min:8',
        ]);
        if(!$request->newPassword || (!$request->newPassword == $request->confirmPassword)){
            return back()->with('error', 'Both password should be same!');
        }
        else{
            $matchedOldPassword = Hash::check($request->oldPassword, auth()->user()->password);
            if(!$matchedOldPassword){
                return back()->with('error', 'Old password not matched!');
            }else{
                $hashNewPassword = Hash::make($request->newPassword);
                $user = User::find(auth()->id());
                $user->password = $hashNewPassword;
                $user->save();
                return back()->with('success', 'The password changed successfuly!');
            }
        }
    }
    // Contact Us
    public function contact(){
        return view('front.home.contact');
    }
    public function contactFormStore(Request $request){
        // return $request->all();
        $request->validate([
            'email' => 'required',
            'mailSubject' => 'required|max:50',
            'name' => 'required',
            'massage' => 'required|max:200',
            'phoneNumber' => 'required',
        ]);

        $contact_form_data = $request->all();
        Mail::to('riktasiddique17@gmal.com')->send(new ContactFormMail($contact_form_data));
        return back()->with('success', 'The mail send successfuly!');
    }
//    WishList Store
    public function wishListStore($id)
    {
    //    return $product;
        $user = Auth::user();
        $product = Product::find($id);
        $wishList = new WishList();
        $wishList->user_id = $user->id;
        $wishList->image1 = $product->image1;
        $wishList->title = $product->subCategory->name;
        $wishList->price = $product->price;
        $wishList->quantity = $product->quantity;
        // return $wishList;
        $wishList->save();
        // return redirect()->route('wish.wish_list')->with('success', 'The product added to wish list!');
        return back()->with('success', 'The product added to wish list!');
        
    }
    // Wish List
    public function wishList(){
        $user = Auth::user();
        $wishLists = WishList::Where('user_id', $user->id)->paginate(6);
        return view('front.home.wish-list', compact('wishLists', 'user'));
    }
    public function addCart(){
        $user = Auth::user();
        $addCarts = Cart::Where('user_id', $user->id)->paginate(5);
        return view('front.home.add-cart', compact('addCarts', 'user'));
    }
    public function shipping(){
        return view('front.home.shipping');
    }
}

