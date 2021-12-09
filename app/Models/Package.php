<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    use HasFactory;

    protected $primaryKey = "transaction_id";

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            try {
                $model->transaction_id = (string) Str::uuid();
            } catch (UnsatisfiedDependencyException $e) {
                abort(500, $e->getMessage());
            }
        });
    }

    protected $fillable = [
        "location_id",
        "organization_id",
        "connote_id",
        "customer_code",
        "customer_name",
        "transaction_amount",
        "transaction_discount",
        "transaction_additional_field",
        "transaction_payment_type",
        "transaction_state",
        "transaction_code",
        "transaction_order",
        "transaction_payment_type_name",
        "transaction_cash_amount",
        "transaction_cash_change",
        "connote",
        "koli_data",
        "customer_attribute",
        "origin_data",
        "destination_data",
        "custom_field",
        "currentLocation",
    ];

    public static $attr = [
        "location_id",
        "organization_id",
        "connote_id",
        "customer_code",
        "customer_name",
        "transaction_amount",
        "transaction_discount",
        "transaction_additional_field",
        "transaction_payment_type",
        "transaction_state",
        "transaction_code",
        "transaction_order",
        "transaction_payment_type_name",
        "transaction_cash_amount",
        "transaction_cash_change",
        "connote",
        "koli_data",
        "customer_attribute",
        "origin_data",
        "destination_data",
        "custom_field",
        "currentLocation",
    ];

    public static $rules = array(
        'location_id' => 'required|string',
        'organization_id' => 'required|numeric',
        'connote_id' => 'required|string',
        'customer_code' => 'required|numeric',
        'customer_name' => 'required|string',
        'transaction_amount' => 'required|numeric',
        'transaction_discount' => 'required|numeric',
        'transaction_additional_field' => 'required|string',
        'transaction_payment_type' => 'required|numeric',
        'transaction_state' => 'required|string',
        'transaction_code' => 'required|string',
        'transaction_order' => 'required|numeric',
        'transaction_payment_type_name' => 'required|string',
        'transaction_cash_amount' => 'required|numeric',
        'transaction_cash_change' => 'required|numeric',
        'connote' => 'required',
        'koli_data' => 'required',
        'customer_attribute' => 'required',
        'origin_data' => 'required',
        'destination_data' => 'required',
        'custom_field' => 'required',
        'currentLocation' => 'required'
    );

}
