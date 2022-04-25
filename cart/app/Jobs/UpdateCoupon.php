<?php

namespace App\Jobs;

use App\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
class UpdateCoupon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $coupon;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if( $this->coupon->order !== null  && $this->coupon->expire >= Carbon::now()    || $this->coupon->type  == 'percent'  ){
        if(Auth::check()){
            $user_email = Auth::user()->id;
           
            $userCart = DB::table('carts')->where(['user_id' => $user_email])->get();     
            
            }else{
              $session_id = Session::get('session_id');
              $userCart = DB::table('carts')->where(['session_id' => $session_id])->get();   
            }
            $total_amount = 0;
            foreach($userCart as $item){
               $total_amount = $total_amount + $item->total;
            }
  
            Session::put('coupon',[
            'name' => $this->coupon->code,
            'discount' => $this->coupon->discount($total_amount),
            'type' => $this->coupon->type,
            'value'=> $this->coupon->value,
            'percent_off'=>$this->coupon->percent_off,
        ]);

        return back()->with('success_message', 'Coupon has been applied!');

}else{
    
    $couponName = session()->get('coupon')['name'];
    if ($couponName) {
        session()->forget('coupon','name','discount','percent_off','value','type');
  
    }


}

    }

}
