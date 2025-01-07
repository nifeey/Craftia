<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShippingCharge extends Model
{
    use HasFactory;


    
    public static function getShippingCharges($total_weight, $country) {
        // Fetch shipping details for the specified country
        $shippingDetails = ShippingCharge::where('country', $country)->first();
    
        // If no shipping details found, return 0
        if (!$shippingDetails) {
            return 0; // or you could throw an exception or log an error
        }
    
        // Initialize rate to 0
        $rate = 0;
    
        // Calculate shipping rate based on weight
        if ($total_weight > 0) {
            if ($total_weight <= 500) {
                $rate = $shippingDetails->{"0_500g"} ?? 0; // Use null coalescing operator to default to 0 if not set
            } elseif ($total_weight <= 1000) {
                $rate = $shippingDetails->{"501g_1000g"} ?? 0;
            } elseif ($total_weight <= 2000) {
                $rate = $shippingDetails->{"1001_2000g"} ?? 0;
            } elseif ($total_weight <= 5000) {
                $rate = $shippingDetails->{"2001g_5000g"} ?? 0;
            } else {
                $rate = $shippingDetails->{"above_5000g"} ?? 0;
            }
        }
    // dd((int) $rate);
        return (int) $rate; 
    }
    
}