<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Package;
use Validator;


class PackageController extends Controller
{


    public function index(Request $request)
    {
        $packages = Package::all();
        return [
            "code" => 200,
            "status" => "success",
            "data" => $packages,
        ];
    }

    public function get(Request $request, $id)
    {
        $package = Package::find($id);
        return response()->json([
            "code" => 200,
            "status" => "success",
            "data" => $package,
        ]);
    }


    public function store(Request $request)
    {
        $rules = Package::$rules;
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
            Package::create($request->all());
            return [
                "code" => 201,
                "status" => "success",
                "message" => "New Package has been saved.",
            ];
        }
    }

    public function update(Request $request, $id)
    {

        if($request->isMethod('patch')){
            $package = Package::find($id);
            if(!$package){
                return "Package not found!";
            }else{
                $update = Package::where('transaction_id', $id)->update($request->all());
                if($update){
                    return [
                        "code" => 200,
                        "status" => "success",
                        "message" => "Package has been updated."
                    ];
                }
            }


        }else if($request->isMethod('put')){
            $package = Package::find($id);
            if(!$package){
                return "Package not found!";
            }

            $rules = Package::$rules;
            $validator = Validator::make($request->all(), $rules);

            if($validator->fails()){
                return $validator->errors();
            }else{
                $package->location_id = $request->location_id;
                $package->organization_id = $request->organization_id;
                $package->connote_id = $request->connote_id;
                $package->customer_code = $request->customer_code;
                $package->customer_name = $request->customer_name;
                $package->transaction_amount = $request->transaction_amount;
                $package->transaction_discount = $request->transaction_discount;
                $package->transaction_additional_field = $request->transaction_additional_field;
                $package->transaction_payment_type = $request->transaction_payment_type;
                $package->transaction_state = $request->transaction_state;
                $package->transaction_code = $request->transaction_code;
                $package->transaction_order = $request->transaction_order;
                $package->transaction_payment_type_name = $request->transaction_payment_type_name;
                $package->transaction_cash_amount = $request->transaction_cash_amount;
                $package->transaction_cash_change = $request->transaction_cash_change;
                $package->connote = $request->connote;
                $package->koli_data = $request->koli_data;
                $package->customer_attribute = $request->customer_attribute;
                $package->origin_data = $request->origin_data;
                $package->destination_data = $request->destination_data;
                $package->custom_field = $request->custom_field;
                $package->currentLocation = $request->currentLocation;
                $package->save();


                return [
                    "code" => 200,
                    "status" => "success",
                    "message" => "Package has been updated."
                ];
            }

        }

    }

    public function delete(Request $request, $id)
    {
        Package::destroy($id);
        return [
            "code" => "200",
            "success" => "deleted",
            "message" => "Success delete",
        ];
    }

    public function updatePatch(UpdatePackagePatch $request, $id)
    {
        $data = $request->only(Package::$attr);
        Package::where("transaction_id", $id)->update($data, ['upsert' => false]);
        return [
            "success" => true,
            "message" => "Success patch",
        ];
    }
}
