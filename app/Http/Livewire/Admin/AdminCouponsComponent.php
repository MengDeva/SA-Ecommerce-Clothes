<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{
    public $coupon_id;
    public function deleteCoupon()
    {
        $coupon = Coupon::find($this->coupon_id);
        $coupon->delete();
        session()->flash('message', 'Coupon has been deleted successfully!');
    }
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component', ['coupons' => $coupons]);
    }
}
