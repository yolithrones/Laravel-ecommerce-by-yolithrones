<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

use App\Models\user;

use App\Models\subscribe;  

use App\Models\Web_switch; 

use PDF;

use Notification;

use App\Models\Currency;


use App\Notifications\NotifySaintthethird;


class SaintController extends Controller
{
    public function viewCategory(){

        if(Auth::id()){
            $categoryData=category::all();

            return view('saint.category', compact('categoryData'));

        }

        else {
            return redirect('login');
        }

       
    }

    public function addCategory(Request $request){

        if(Auth::id()){

            $data=new category;
            $data->categoryName=$request->category;
    
            $data->save();
    
            return redirect()->back()->with('message', 'Category has been added Succesfully');
        }

        else {
            return redirect('login');
        }


        
    }

    public function deleteCategory($id){

        if(Auth::id()){

            $deleteData=category::find($id);

            $deleteData->delete();
            return redirect()->back()->with('message', 'Category has been Deleted'); 
    

        }

        else {
            return redirect('login');
        }

       
    }

    public function postProduct(){

        if(Auth::id()){

            $category= category::all();
            return view ('saint.product', compact('category'));

        }

        else {
            return redirect('login');
        }

       
    }

    public function addProduct(Request $request){

        if(Auth::id()){
            
            
        $product=new product;

        $product->title=$request->title;

        $product->description=$request->description;


        $image=$request->image;  
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('productImage', $imagename);

        $product->image=$imagename;

        $imageII=$request->imageII;
        $imagenameII=time().'.'.$imageII->getClientOriginalExtension();
        $request->imageII->move('productImage', $imagenameII);
        $product->imageII=$imagenameII;

        
        $imageIII=$request->imageIII;
        $imagenameIII=time().'.'.$imageIII->getClientOriginalExtension();
        $request->imageIII->move('productImage', $imagenameIII);
        $product->imageIII=$imagenameIII;

        
        $imageIV=$request->imageIV;
        $imagenameIV=time().'.'.$imageIV->getClientOriginalExtension();
        $request->imageIV->move('productImage', $imagenameIV);
        $product->imageIV=$imagenameIV;
        

        $product->category=$request->category;

        $product->quantity=$request->quantity;

        $product->size=$request->size;

        $product->color=$request->color;

        $product->price=$request->price;

        $product->discountPrice=$request->discountPrice;
 

        $product->save();
        return redirect()->back()->with('message', 'Product Uploaded Successfully');

        }

        else {
            return redirect('login');
        }



    }


    public function displayproduct(){
        if(Auth::id()){

            $displayProduct=product::all();

            return view('saint.displayproduct', compact('displayProduct'));
        }

        else {
            return redirect('login');
        }
        
        
    }

    public function editProduct($id){
        if(Auth::id()){

        $editProduct=product::find($id);
 
        $category=category::all();
 
        return view('saint.editProduct', compact('editProduct', 'category'));
        }

        else {
            return redirect('login');
        }
       
        
 
     }

     public function deleteProduct($id){
        if(Auth::id()){
            $deleteProduct=product::find($id);

            $deleteProduct->delete();
    
            return redirect()->back()->with('message', 'Product Deleted Succesfully');
        }

        else {
            return redirect('login');
        }
       

    }

    public function confirmEdit(Request $request, $id){
        if(Auth::id()){
            $editConfirm=product::find($id);
        $editConfirm->title=$request->title;
        $editConfirm->description=$request->description;
        $editConfirm->price=$request->price;
        $editConfirm->discountPrice=$request->discountPrice;
        $editConfirm->quantity=$request->quantity;
        $editConfirm->category=$request->category;
        $editConfirm->size=$request->size;
        $editConfirm->color=$request->color;

        $image=$request->image;

        if ($image) {

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('productImage', $imagename);
    
            $editConfirm->image=$imagename;
        }

        $imageII=$request->imageII;

        if ($imageII) {

            $imagenameII=time().'.'.$imageII->getClientOriginalExtension();

            $request->imageII->move('productImage', $imagenameII);
    
            $editConfirm->imageII=$imagenameII;
        }

        $imageIII=$request->imageIII;

        if ($imageIII) {

            $imagenameIII=time().'.'.$imageIII->getClientOriginalExtension();

            $request->imageIII->move('productImage', $imagenameIII);
    
            $editConfirm->imageIII=$imagenameIII;
        }

        $imageIV=$request->imageIV;

        if ($imageIV) {

            $imagenameIV=time().'.'.$imageIV->getClientOriginalExtension();

            $request->imageIV->move('productImage', $imagenameIV);
    
            $editConfirm->imageIV=$imagenameIV;
        }

        $editConfirm->save();

        return redirect()->back()->with('message', 'Product Edited Succesfully');
        }

        else {
            return redirect('login');
        }
       
        


    }

    public function orders(){
        if(Auth::id()){
            $order=order::all();
            return view('saint.order', compact('order'));
        }

        else {
            return redirect('login');
        }
       
        
    }
    
    public function delivered($id){
        if(Auth::id()){
            $order=order::find($id);

            if ($order) {
                $order->deliveryStatus = "Delivered"; 
                $order->paymentStatus = "Payment Confirmed ✓";
                $order->save();
            }
        
    
            return redirect()->back();
        }

        else {
            return redirect('login');
        }
      
        
    }

    public function print_pdf($id){
        if(Auth::id()){
            $orders=order::find($id);
            $pdf=PDF::loadView('saint.pdf', compact('orders'));
            
         
            return $pdf->download('order_details.pdf');
        }

        else {
            return redirect('login');
        }
      
        
    }

    public function customer_mailling($id){
        if(Auth::id()){
            $orders=order::find($id);

            return view('saint.mailling', compact('orders'));
        }

        else {
            return redirect('login');
        }
      
       
        
    }

    
    public function send_customer_email(Request $request,$id){
        
        if(Auth::id()){
            $orders=order::find($id);

            $details= [
                'greeting' => $request->greeting,
                'firstline' => $request->firstine,
                'body' => $request->body,
                'button' => $request->button,
                'url'=> $request->url,
                'lastline' => $request->lastline,
    
            ];
    
            Notification::send($orders, new NotifySaintthethird($details));
           
            return redirect()->back()->with('message', 'Email Sent');
            
        }

        else {
            return redirect('login');
        }
        
    }

    public function searchData(Request $request){
        if(Auth::id()){
            $searchText = $request->query('query');

       
        $order=order::where('name', 'LIKE', "%{$searchText}%")->orWhere('lastName', 'LIKE', "%{$searchText}%")
        ->orWhere('phone', 'LIKE', "%{$searchText}%")->orWhere('state', 'LIKE', "%{$searchText}%")
        ->orWhere('country', 'LIKE', "%{$searchText}%")->orWhere('town', 'LIKE', "%{$searchText}%")
        ->orWhere('postCode', 'LIKE', "%{$searchText}%")->orWhere('address', 'LIKE', "%{$searchText}%")
        ->orWhere('apartment', 'LIKE', "%{$searchText}%")->orWhere('userId', 'LIKE', "%{$searchText}%")
        ->orWhere('productTitle', 'LIKE', "%{$searchText}%")->orWhere('quantity', 'LIKE', "%{$searchText}%")
        ->orWhere('size', 'LIKE', "%{$searchText}%")->orWhere('price', 'LIKE', "%{$searchText}%")
        ->orWhere('productId', 'LIKE', "%{$searchText}%")->orWhere('paymentStatus', 'LIKE', "%{$searchText}%")
        ->orWhere('trxRef', 'LIKE', "%{$searchText}%")->orWhere('trxId', 'LIKE', "%{$searchText}%")
        ->orWhere('deliveryStatus', 'LIKE', "%{$searchText}%")
        
        ->get();

        return view('saint.order', compact('order'));
        
        }

        else {
            return redirect('login');
        }

       
    }



    public function viewUsers(){
        if(Auth::id()){
            $users=user::all();

            return view('saint.user', compact('users'));
        }

        else {
            return redirect('login');
        }
      
       
        
    }


    public function viewSubscribers(){
        if(Auth::id()){
            $subscribers=subscribe::all();
            return view('saint.subscriber', compact('subscribers'));
        }

        else {
            return redirect('login');
        }
       
        
    }

    public function loginSTT(){
   
        return view('auth.login');
    }

    public function registerSTT(){
   
        return view('auth.register');
    }

    public function maintenanceSTT(){
        $switch = Web_switch::first();
        $cartCount=null;
        $isSubscribed=null;
        return view('saint.maintenance', compact('switch','cartCount','isSubscribed'));
    }



    public function toggleUnderConstruction()
    {
        $switch = Web_switch::first();

        if ($switch) {
            $switch->is_under_construction = !$switch->is_under_construction;
            $switch->save();
        } else {
            $switch = new Web_switch();
            $switch->is_under_construction = true;
            $switch->save();
        }
    
        $status = $switch->is_under_construction ? 'on' : 'off';
        return redirect()->back()->with('message', 'Under Construction status changed to ' . $status);
    }



    public function currencyTable(){
        if(Auth::id()){
            $currencies=currency::all();

            return view('saint.currency', compact('currencies'));
        }

        else {
            return redirect('login');
        }
       
        
    }


    public function deleteCurrency($id){

        if(Auth::id()){

            $deleteCurrency=currency::find($id);

            $deleteCurrency->delete();
            return redirect()->back()->with('message', 'Currency Deleted'); 
    

        }

        else {
            return redirect('login');
        }

       
    }


    public function editCurrency($id){
        if(Auth::id()){

        $editCurrency=currency::find($id);
 

        return view('saint.editcurrency', compact('editCurrency'));
        }

        else {
            return redirect('login');
        }
       
        
 
     }

     public function   confirmEdit_Currency(Request $request, $id){
        if(Auth::id()){
            $editConfirm=currency::find($id);
            $editConfirm->currency_code=$request->currencyCode;
            $editConfirm->currency_icon=$request->currencyIcon;
            $editConfirm->exchange_rate=$request->exchageRate;

            $editConfirm->save();

        return redirect()->back()->with('message', 'Currency bas been Edited Succesfully');
        }

        else {
            return redirect('login');
        }
       
        


    }



    
    public function editStatus($id){

        if(Auth::id()){

            $editStatus=currency::find($id);

            $editStatus->status = $editStatus->status == 1 ? 0 : 1;
            $editStatus->save();

            return redirect()->back()->with('message', 'Status Updated'); 
    

        }

        else {
            return redirect('login');
        }

       
    }

    public function newCurrency(Request $request){

        if(Auth::id()){

           
            return view('saint.addcurrency');
        }

        else {
            return redirect('login');
        }

    }


    public function addCurrency(Request $request){

        if(Auth::id()){

            $data=new currency;
            $data->currency_code=$request->code;
            $data->currency_icon=$request->icon;
            $data->exchange_rate=$request->rate;
            $data->status=$request->status;
    
            $data->save();
    
            return redirect()->back()->with('message', 'Currency has been added Succesfully');
        }

        else {
            return redirect('login');
        }


        
    }
    


   
       
        
 
}

    




