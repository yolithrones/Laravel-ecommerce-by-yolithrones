<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Category;

use App\Models\Order;

use App\Models\Comment;

use App\Models\Reply;

use App\Models\Subscribe;

use Carbon\Carbon;

use App\Models\Web_switch; 

use App\Models\Message; 

use App\Models\Currency; 

use  RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    public function index(){

        $switch = Web_switch::first();
        if ($switch && $switch->is_under_construction) {
            return view('auth.maintainace');
        }else {

        $today = Carbon::today();
        $seed = $today->format('Ymd');
        $item = Product::inRandomOrder($seed)->take(8)->get();
        
        $cartCount = null;
        $isSubscribed = null;
        $currency=currency::all();

        // Initialize an empty array to store the available colors
        $colors = [];
        $sizes = [];

        // Loop through each product and add its colors to the array
        foreach ($item as $items) {
            $itemColors = explode(',', $items->color);
            foreach ($itemColors as $color) {
                $color = trim($color);
                if (!in_array($color, $colors)) {
                    $colors[] = $color;
                }
            }

        

            $itemSizes = explode(',', $items->size);
            foreach ($itemSizes as $size) {
                $size = trim($size);
                if (!in_array($size, $sizes)) {
                    $sizes[] = $size;
                }
            }
        }

       

        return view('home.shopsaints', compact('item', 'colors', 'sizes', 'cartCount','isSubscribed' ,'currency') ) ;
        }

        
    }

    

    public function shopsaints(){

    $switch = Web_switch::first();

    if ($switch && $switch->is_under_construction) {
        
        $usertype = Auth::user()->usertype;
         if ($usertype == '1') {
        $total_product=product::all()->count();

        $orders_total=order::all()->count();

        $client_count=user::all()->count();
        

        $order=order::all();


        $gross_earning=0;

        $totalPriceUSD=0;
        

        foreach($order as $order){

            $gross_earning=$gross_earning+ $order->price;

            $exchangeRateUSD = 750;

            $totalPriceUSD = $gross_earning / $exchangeRateUSD;
        }



        $total_deliverd=order::where('deliveryStatus' ,'=' , 'Delivered')->get()->count();

        $total_pending=order::where('deliveryStatus' ,'=' , 'pending...')->get()->count();
        


        return view('saint.homepage', compact('total_product', 'orders_total', 'client_count', 'totalPriceUSD', 'total_deliverd', 'total_pending'));
         } 
           
         else {
            return view('auth.maintainace');
         }
         

        
    } else {
        
        $usertype = Auth::user()->usertype;
         if ($usertype == '1') {

        $total_product=product::all()->count();

        $orders_total=order::all()->count();

        $client_count=user::all()->count();
        

        $order=order::all();


        $gross_earning=0;

        $totalPriceUSD=0;
        

        foreach($order as $order){

            $gross_earning=$gross_earning+ $order->price;

            $exchangeRateUSD = 750;

            $totalPriceUSD = $gross_earning / $exchangeRateUSD;
        }



        $total_deliverd=order::where('deliveryStatus' ,'=' , 'Delivered')->get()->count();

        $total_pending=order::where('deliveryStatus' ,'=' , 'pending...')->get()->count();
        


        return view('saint.homepage', compact('total_product', 'orders_total', 'client_count', 'totalPriceUSD', 'total_deliverd', 'total_pending'));
    } else {
        $today = Carbon::today();
        $seed = $today->format('Ymd');
        $item = Product::inRandomOrder($seed)->take(8)->get();
        $colors = [];
        $sizes = [];

        foreach ($item as $items) {
            $itemColors = explode(',', $items->color);
            foreach ($itemColors as $color) {
                $color = trim($color);
                if (!in_array($color, $colors)) {
                    $colors[] = $color;
                }
            }

            $itemSizes = explode(',', $items->size);
            foreach ($itemSizes as $size) {
                $size = trim($size);
                if (!in_array($size, $sizes)) {
                    $sizes[] = $size;
                }
            }
        }

        $userId = Auth::user()->id;
        $cartCount = cart::where('userId', '=', $userId)->sum('quantity');

        $currency=currency::all();

        $isSubscribed = Subscribe::where('subscriber_id', $userId)->exists();

     

       
        return view('home.shopsaints', compact('item', 'colors', 'sizes', 'cartCount' , 'isSubscribed','currency'));
    }
    }


   
}




    

public function itemDetails(Request $request, $id)
{
    $item = Product::find($id);
    $colors = [];

    foreach ($item as $items) {
        $itemColors = explode(',', $item->color);
        foreach ($itemColors as $color) {
            $color = trim($color);
            if (!in_array($color, $colors)) {
                $colors[] = $color;
            }
        }
    }

    $sizes = [];

    foreach ($item as $items) {
        $itemSizes = explode(',', $item->size);
        foreach ($itemSizes as $size) {
            $size = trim($size);
            if (!in_array($size, $sizes)) {
                $sizes[] = $size;
            }
        }
    }

    $sizes = explode(',', $item->size);
    $comment = Comment::where('productId', '=', $id)->orderBy('id', 'desc')->get();
    $commentCount = Comment::where('productId', '=', $id)->get()->count();
    $reply = Reply::where('productId', '=', $id)->get();

    if (Auth::id()) {
        $buyerId = Auth::user()->id;
        $cartCount = Cart::where('userId', $buyerId)->sum('quantity');
        $isSubscribed = Subscribe::where('subscriber_id', $buyerId)->exists();

    } else {
        $cartCount = 0;
        $isSubscribed =null;
    }

    $currency=currency::all();

 
    return view('home.viewDetails', compact('item', 'sizes', 'colors', 'comment', 'reply', 'cartCount','commentCount', 'isSubscribed', 'currency'));
}

    public function addCart(Request $request, $id){
        if (Auth::id()) {

            $buyer=Auth::user();

            $buyerId=$buyer->id;

            $item=product::find($id);

            $itemId_exist=cart::where('productId', '=', $id)->where('userId', '=',$buyerId )->get('id')->first();

            if ($itemId_exist) {

                $cart=cart::find($itemId_exist)->first();

                $quantity=$cart->quantity;

                $cart->quantity = $quantity + $request->qty;

                if ($item->discountPrice!=null) {
                    $cart->price=$item->discountPrice * $cart->quantity;
                }
    
                else {
                    $cart->price=$item->price * $cart->quantity;
                }
    
                

                $cart->save();

                return redirect()->back();
            }                                                    

            else {
                $cartItem=new cart;

            $itemColors = explode(',', $item->color);
            $colors = array_map('trim', $itemColors);

            $itemSizes = explode(',', $item->size);
            $sizes = array_map('trim', $itemSizes);


            $cartItem->name=$buyer->name;
            $cartItem->lastName=$buyer->lastName;
            $cartItem->email=$buyer->email;
            $cartItem->phone=$buyer->phone;
            $cartItem->address=$buyer->address;
            $cartItem->apartment=$buyer->apartment;
            $cartItem->country=$buyer->country;
            $cartItem->town=$buyer->town;
            $cartItem->state=$buyer->state;
            $cartItem->postCode=$buyer->postCode;
            $cartItem->userID=$buyer->id;

            $cartItem->productTitle=$item->title;

            $cartItem->quantity=$request->qty;

            $cartItem->image=$item->image;

            if ($item->discountPrice!=null) {
     
                $cartItem->price=$item->discountPrice * $request->qty;
            }

            else {
                $cartItem->price=$item->price * $request->qty;;
            }

            $cartItem_id = $cartItem->productId=$item->id;

            $color = $cartItem->color = $request->color;

            $size = $cartItem->size=$request->size;


           if ($color === null || $size === null) {

            if ($color === null) {
                Alert::warning('Dear Shopper', 'Please select a color for the item you want to add to the cart');
            }
            if ($size === null) {
                Alert::warning('Dear Shopper', 'Please select a size for the item you want to add to the cart');
            }
                
                return redirect()->route('itemDetails', $cartItem_id);
            } else {
                $cartItem->save();
            }


            return redirect()->back();
            }
        
        }

        else{
            return redirect('login');
        }
    }

    public function displayCart(){
        if (Auth::id()) {
            $id=Auth::user()->id;  
            $cart=cart::where('userId','=', $id)->get();
            $cartCount = cart::where('userId', '=', $id)->sum('quantity');
            $isSubscribed = Subscribe::where('subscriber_id', $id)->exists();
            $currency=currency::all();
            return view('home.viewcart', compact('cart', 'cartCount','isSubscribed','currency'));
        }

        else {
            return redirect('login');
        }
        

    }


    public function subscribeSTT(request $request){

        $request->validate([
            'email' => 'required|email|unique:subscribes,subscriber_email'
        ]);
    
        if (Auth::check()) {
            $user = Auth::user();
            $subscription = Subscribe::create([
                'subscriber_id' => $user->id,
                'subscriber_email' => $request->email
            ]);
    
            // Perform any additional actions (e.g., sending a confirmation email)
    
            return redirect()->back()->with('message', 'Subscription successful!');
        }else {

            //echo '
            //<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            //<script type="text/javascript">
               // $(document).ready(function() {
                   // $("form#subscribeForm").submit();
               // });
            //</script>';php artisan migrate:rollback --path=/database/migrations/2023_06_01_155712_create_orders_table.php


            
            return redirect('login');
            
        }

        

       
       
    }

    
    public function updateCart(Request $request)
    {
        foreach ($request->qty as $itemId => $newQuantity) {
            $updateConfirm = Cart::find($itemId);
    
            if (!$updateConfirm) {
                return redirect()->back()->with('message', 'Invalid cart item');
            }
    
            $previousQuantity = $updateConfirm->quantity;
            $quantityDifference = $newQuantity - $previousQuantity;
    
            $updateConfirm->quantity = $newQuantity;
    
            if ($quantityDifference > 0) {
                $updateConfirm->price += $quantityDifference * ($updateConfirm->price / $previousQuantity);
            } elseif ($quantityDifference < 0) {
                $updateConfirm->price -= abs($quantityDifference) * ($updateConfirm->price / $previousQuantity);
            }
    
            $updateConfirm->save();
        }
    
        if ($updateConfirm) {
            return redirect()->back()->with('message', 'Cart has been updated');
        } else {
            return redirect()->back()->with('message', 'Failed to update cart');
        }
    }
    

    
    
    
    

    


    public function removeCart($id)
    {
        $cartItem = Cart::where('id', $id)
        ->where('userId', Auth::id())
        ->first();
    
        if (!$cartItem) {
            // Item not found in the cart
            return redirect()->back();
        }
    
        $productId = $cartItem->productId;
        $clientId = $cartItem->userId;
    
        // Check if the item exists in the order table
        $orderItem = Order::where('productId', '=', $productId)
            ->where('userId', '=', $clientId)
            ->where(function ($query) {
                $query->where('paymentStatus', '=', 'processing....');
            })
            ->first();
    
        if ($orderItem) {
            // Item found in the order table, delete it
            $orderItem->delete();
        }

        else {
            $cartItem->delete();
        }
    
        
    
        return redirect()->back();
    }

    public function contactUs(){
        $userId = Auth::id();
        $cartCount = $userId ? Cart::where('userId', $userId)->sum('quantity') : 0;

        $isSubscribed = Subscribe::where('subscriber_id', $userId)->exists();
        $currency=currency::all();
         return view('home.contact', compact('cartCount', 'isSubscribed','currency'));
    }

    public function aboutUs(){
        $userId = Auth::id();
        $cartCount = $userId ? Cart::where('userId', $userId)->sum('quantity') : 0;
        $isSubscribed = Subscribe::where('subscriber_id', $userId)->exists();
        $currency=currency::all();
        
         return view('home.about', compact('cartCount','isSubscribed','currency'));
    }
    

    public function orderCheckout(){
        $client=Auth::user();
        $clientId=$client->id;
        $data=cart::where('userId', '=', $clientId)->get();
        
        foreach ($data as $data) {
            $itemOrdered=new order;

            $itemOrdered->name=$data->name;
            $itemOrdered->lastName=$data->lastName;
            $itemOrdered->email=$data->email;
            $itemOrdered->phone=$data->phone;
            $itemOrdered->address=$data->address;

            $itemOrdered->apartment=$data->apartment;
            $itemOrdered->country=$data->country;
            $itemOrdered->town=$data->town;
            $itemOrdered->state=$data->state;
            $itemOrdered->postCode=$data->postCode;
            $itemOrdered->userId=$data->userId;

            $itemOrdered->productTitle=$data->productTitle;
            $itemOrdered->quantity=$data->quantity;
            $itemOrdered->image=$data->image;
            $itemOrdered->color=$data->color;
            $itemOrdered->size=$data->size;
            $itemOrdered->price=$data->price;
            $itemOrdered->productId=$data->productId;

            $itemOrdered->paymentStatus='card payment';
            $itemOrdered->deliveryStatus='incoming saint...';

            $itemOrdered->save();

            $cartId=$data->id;
            $cart=cart::find($cartId);
            $cart->delete();

        }

        return redirect()->back()->with('message', 'Incomming Saint !? Ordered has been placed ');


    }




     
    public function saintCheckout()
    {
        $client = Auth::user();
        $clientId = $client->id;
        $cart = Cart::where('userId', $clientId)->get();
    
        if ($cart->isEmpty()) {
            return view('home.empty');
        }
    
        $orderId = null;
    
        if ($cart->isNotEmpty()) {
            $orderId = $cart[0]->ordered;
        }
    
        foreach ($cart as $cartItem) {
            $orderId = $cartItem->ordered;
            $itemOrdered = Order::where('productId', $cartItem->productId)
            ->where('userId', $cartItem->userId)
            ->where('paymentStatus', '=' , 'processing....')
            ->first();
    
            if (!$itemOrdered) {
                $itemOrdered = new Order();
                $itemOrdered->save();
                $orderId = $itemOrdered->id;
                $cartItem->ordered = $orderId;
                $cartItem->save();
            }
    
            $itemOrdered->fill($cartItem->toArray());
            $itemOrdered->name = $cartItem->name;
            $itemOrdered->lastName = $cartItem->lastName;
            $itemOrdered->email = $cartItem->email;
            $itemOrdered->phone = $cartItem->phone;
            $itemOrdered->address = $cartItem->address;
            $itemOrdered->country = $cartItem->country;
            $itemOrdered->apartment = $cartItem->apartment;
            $itemOrdered->state = $cartItem->state;
            $itemOrdered->town = $cartItem->town;
            $itemOrdered->postCode = $cartItem->postCode;
            $itemOrdered->userId = $cartItem->userId;

            $itemOrdered->productTitle = $cartItem->productTitle;
            $itemOrdered->image = $cartItem->image;
            $itemOrdered->color = $cartItem->color;
            $itemOrdered->size = $cartItem->size;
            $itemOrdered->price = $cartItem->price;
            $itemOrdered->quantity = $cartItem->quantity;
            $itemOrdered->productId = $cartItem->productId;
            $itemOrdered->paymentStatus = 'processing....';
            $itemOrdered->trxRef = 'N/A';
            $itemOrdered->trxId = 'N/A';
            $itemOrdered->deliveryStatus = 'pending...';
            $itemOrdered->save();
            
        }

        
          
    
        $existingOrderItems = Order::where('userId', $clientId)->get();
    
        foreach ($existingOrderItems as $existingOrderItem) {
            $foundInCart = $cart->contains('productId', $existingOrderItem->productId);
    
            if (!$foundInCart && $existingOrderItem->paymentStatus !== 'Payment Confirmed' && $existingOrderItem->paymentStatus !== 'Transaction Failed') {
                $existingOrderItem->delete();
            }
        }
    
        $latestOrder = Order::find($orderId);
        $cartCount = Cart::where('userId', $clientId)->sum('quantity');
        $editAddress = User::find($clientId);
        $isSubscribed = Subscribe::where('subscriber_id', $clientId)->exists();
        $currency=currency::all();
    
        return view('home.checkout', compact('cart', 'latestOrder', 'cartCount', 'editAddress','isSubscribed','currency'));
    }
    




    

      
    
    public function confirmBilling(Request $request, $id) {
        DB::beginTransaction();
    
        try {
            $user = User::find($id);
            $clientId = $user->id;
    
            // Update the fields of the user
            $user->country = $request->country;
            $user->address = $request->address;
            $user->apartment = $request->apartment;
            $user->town = $request->town;
            $user->state = $request->state;
            $user->postCode = $request->postCode;
            $user->phone = $request->phone;
            $user->save();
    
            $cart = Cart::where('userId', '=', $clientId)->first();
            // Update the fields of the cart
            $cart->country = $request->country;
            $cart->address = $request->address;
            $cart->apartment = $request->apartment;
            $cart->town = $request->town;
            $cart->state = $request->state;
            $cart->postCode = $request->postCode;
            $cart->phone = $request->phone;
            $cart->save();
    
            $order = Order::where('userId', '=', $clientId)->first();
            // Update the fields of the order
            $order->country = $request->country;
            $order->address = $request->address;
            $order->apartment = $request->apartment;
            $order->town = $request->town;
            $order->state = $request->state;
            $order->postCode = $request->postCode;
            $order->phone = $request->phone;

            if (!empty($request->note)) {
                $order->order_note = $request->note;
            }
  
            $order->save();
    
            DB::commit();
    
            return redirect()->back()->with('message', 'Billing Address Successfully Updated');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update billing address');
        }
    }
    

public function payment(Request $request)
{
    // Process the payment request
    if ($request->has('pay')) {
        $email = $request->input('email');
        $amount = $request->input('amount');
        $name = $request->input('name');
        $lastName = $request->input('lastName');

        // Prepare our rave request
        $requestPayload = [
            'tx_ref' => time(),
            'amount' => $amount,
            'currency' => 'NGN',
            'payment_options' => 'card',
            'redirect_url' => route('paymentHandle'),
            'customer' => [
                'email' => $email,
                'name' => $name,
                'lastName' => $lastName,
            ],
            'meta' => [
                'price' => $amount
            ],
            'customizations' => [
                'title' => 'Payment For Saintthethird Merch',
                'description' => 'sample'
            ]
        ];

        // Set the URL for the cURL request
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.flutterwave.com/v3/payments');

        // Set other cURL options...
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestPayload));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer FLWSECK-1c7390a1a69a9925f9e6c412d10523b5-1883e45b178vt-X',
            'Content-Type: application/json'
        ));

        // Set the CA root certificates bundle option
        curl_setopt($curl, CURLOPT_CAINFO, public_path('cacert.pem'));

        // Make the API call
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error: " . $err;
        } else {
            echo "API Response: " . $response;
            $res = json_decode($response);

            if ($res && isset($res->status) && $res->status == 'success') {
                $link = $res->data->link;
                return redirect($link);
            } else {
                echo 'We cannot process your payment';
            }
        }
    }
}




    
    


   public function paymentHandle(Request $request){
    if ($request->has('status')) {
        // Check payment status
        if ($request->input('status') == 'cancelled') {
            Alert::warning('Transaction Failed', 'Your last payment transaction was cancelled');
            return redirect()->route('shopsaints');
            
            exit; // Make sure to exit after redirecting
        } elseif ($request->input('status') == 'successful') {
            $txid = $request->input('transaction_id');
            $txref = $request->input('tx_ref');


            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer FLWSECK-1c7390a1a69a9925f9e6c412d10523b5-1883e45b178vt-X"
                ),
            ));

            // Set the CA root certificates bundle option
            curl_setopt($curl, CURLOPT_CAINFO, public_path('cacert.pem'));
     
            $response = curl_exec($curl);
            curl_close($curl);

            $res = json_decode($response);


            if ($res && isset($res->status)) {
                $amountPaid = $res->data->charged_amount ?? 0;
                $amountToPay = $res->data->meta->price ?? 0;

                $user = Auth::user();  
                $userId = $user->id;
                $orders = Order::where('userId', $userId)->where('trxRef', 'N/A')->where('trxId', 'N/A')->where('paymentStatus', 'processing....')->get();

                if ($amountPaid >= $amountToPay) {
                    // Delete the user's cart items 
                    
                    $cartItems = Cart::where('userId', $userId)->get();

                    foreach ($cartItems as $cartItem) {
                        $cartItem->delete();
                    }

                     // Update the payment status in the Order table
                    foreach ($orders as $order) {
                       $order->paymentStatus = 'Payment Confirmed';
                       $order->trxRef = $txref;
                       $order->trxId = $txid;
                       $order->save();
                    }

                      // Reduce product quantity
                      $product = Product::find($order->productId);
                      if ($product) {
                        $product->quantity -= $order->quantity;
                        $product->save();
                      }

                    Alert::success('Congratulations!! You Are Officially a Saint !!', 'Your last payment transaction was successfull');
                    
                    return redirect()->route('shopsaints');

                    // Continue to give item to the user
                    } else {      
                       foreach ($orders as $order) {
                         $order->paymentStatus = 'Transaction Failed';
                         $order->trxRef = $txref;
                         $order->trxId = $txid;
                         $order->save();
                        }
                        Alert::warning('Transaction Failed', 'Your last payment transaction was was unsuccessfull !? Please try again later.
                        ');
                     return redirect()->route('shopsaints');
                }
            } else {
                echo 'Cannot process payment';
            }
        }
    }
}


public function orderHistory(){
    if(Auth::id()){
        $userId = Auth::user()->id;
        $cartCount = $userId ? Cart::where('userId', $userId)->sum('quantity') : 0;
        $isSubscribed = Subscribe::where('subscriber_id', $userId)->exists();
        $currency=currency::all();

        $order=order::where('userId', '=', $userId)
        ->where('paymentStatus', '=', 'Payment Confirmed')
        
        ->get();
       
       return view('home.order', compact('cartCount', 'isSubscribed', 'order' ,'currency'));
    }

    else{
        return redirect('login');
    }

}



public function dropComment(Request $request){
    if(Auth::id()){
       $comment=new comment; 

       $comment->name=Auth::user()->name;
       $comment->userId=Auth::user()->id;
       $comment->comment=$request->comment;

       $product = Product::find($request->product_id);
        if ($product) {
            $comment->productId = $product->id;
        }

        $comment->startRating=$request->stars;
        
       $comment->save();
       
       return redirect()->back();
    }

    else{
        return redirect('login');
    }

}

public function replyUsers(Request $request){
    if(Auth::id()){
       $reply=new reply; 

       $reply->name=Auth::user()->name;
       $reply->userId=Auth::user()->id;
       $reply->commentId=$request->commentId;
       $reply->productId=$request->product_id;
       $reply->reply=$request->reply;
       $reply->save();
       return redirect()->back();
    }

    else{
        return redirect('login');
    }

}


public function searchProduct(Request $request){

    
    if (Auth::id()) {
        $userId = Auth::user()->id;
        $cartCount = cart::where('userId', '=', $userId)->sum('quantity');
        $searchMerch = $request->query('search');

   
      $item=product::where('title', 'LIKE', "%{$searchMerch}%")->orWhere('description', 'LIKE', "%{$searchMerch}%")
      ->orWhere('category', 'LIKE', "%{$searchMerch}%")->orWhere('size', 'LIKE', "%{$searchMerch}%")
      ->orWhere('color', 'LIKE', "%{$searchMerch}%")->orWhere('price', 'LIKE', "%{$searchMerch}%") 
      ->orWhere('discountPrice', 'LIKE', "%{$searchMerch}%")
      ->paginate(8);

      $comment=comment::orderby('id', 'desc')->get();
      $reply=reply::all();
      $isSubscribed = Subscribe::where('subscriber_id', $userId)->exists();
      $currency=currency::all();
  
      return view('home.search', compact('item', 'comment', 'reply', 'cartCount','searchMerch','isSubscribed','currency'));
    } else {
        return redirect('login');
    }
    
   

  
    
}




public function shopMerch(Request $request)
{
    $userId = Auth::id();
    $cartCount = $userId ? Cart::where('userId', $userId)->sum('quantity') : 0;
    $isSubscribed = Subscribe::where('subscriber_id', $userId)->exists();
    $totalResults =product::all()->count();
    $currency=currency::all();

    $categories = Category::all();

    $selectedColor = $request->input('color');
    $selectedSize = $request->input('size');
    $selectedPriceRange = $request->input('price_range');
    $selectedCategory = $request->input('category');
    $selectedSortBy = $request->input('sort_by');

    $colors = [];
    $sizes = [];

    $products = Product::paginate(12);

    foreach ($products as $item) {
        $itemColors = explode(',', $item->color);
        foreach ($itemColors as $color) {
            $color = trim($color);
            if (!in_array($color, $colors)) {
                $colors[] = $color;
            }
        }

        $itemSizes = explode(',', $item->size);
        foreach ($itemSizes as $size) {
            $size = trim($size);
            if (!in_array($size, $sizes)) {
                $sizes[] = $size;
            }
        }
    }

    $filteredProducts = Product::query();

    // Apply filters
    if ($selectedPriceRange) {
        switch ($selectedPriceRange) {
            case '0-50':
                $filteredProducts = $filteredProducts->whereBetween('price', [0, 50]);
                break;
            case '50-100':
                $filteredProducts = $filteredProducts->whereBetween('price', [50, 100]);
                break;
            case '100-150':
                $filteredProducts = $filteredProducts->whereBetween('price', [100, 150]);
                break;
            case '150-200':
                $filteredProducts = $filteredProducts->whereBetween('price', [150, 200]);
                break;
            case '200-250':
                $filteredProducts = $filteredProducts->whereBetween('price', [200, 250]);
                break;
            case '250+':
                $filteredProducts = $filteredProducts->where('price', '>=', 250);
                break;
            default:
                break;
        }
    }

    if ($selectedCategory) {
        $filteredProducts = $filteredProducts->where('category', $selectedCategory);
    }

    if ($selectedSortBy) {
        switch ($selectedSortBy) {
            case 'price_low_high':
                $filteredProducts = $filteredProducts->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $filteredProducts = $filteredProducts->orderBy('price', 'desc');
                break;
            case 'latest':
                $filteredProducts = $filteredProducts->orderBy('created_at', 'desc');
                break;
            case 'popularity':
                $filteredProducts = $filteredProducts
                    ->leftJoin('orders', 'products.id', '=', 'orders.productId')
                    ->select('products.*', DB::raw('COUNT(orders.id) as order_count'))
                    ->groupBy('products.id', 'products.title', 'products.description','products.image',
                    'products.category','products.quantity','products.size','products.color',
                    'products.price','products.discountPrice','products.created_at','products.updated_at')
                    ->orderBy('order_count', 'desc');

                    break;
            default:
                break;
        }
    }

    $filteredProducts = $filteredProducts->paginate(12);



    return view('home.shop', compact(
        'cartCount',
        'categories',
        'filteredProducts',
        'selectedColor',
        'selectedSize',
        'selectedPriceRange',
        'selectedCategory',
        'selectedSortBy',
        'colors',
        'sizes',
        'totalResults',
        'isSubscribed',
        'currency'
    ));
}


public function messageSTT(Request $request){

    $message=new message;
    $message->messager_name=$request->name;
    $message->messager_email=$request->email;
    $message->message=$request->message;

    $message->save();

    return redirect()->back()->with('message', 'Message SENT');
    



    
}

public function ExchangeRate($currencyCode)
{
    // Retrieve the exchange rate from your database based on the $currencyCode
    $currency = Currency::where('currency_code', $currencyCode)->first();
    
    if (!$currency) {
        return response()->json(['error' => 'Currency not found'], 404);
    }
    
    $exchangeRate = $currency->exchange_rate;

    // Return the exchange rate in JSON format
    return response()->json(['exchange_rate' => $exchangeRate]);

    return redirect()->back();
}


}    

    





