<?php


namespace App\Service;

use Illuminate\Validation\Rule;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Factories\ItemFactory;

class ItemService
{

    public function validate(Request $request){

        $validate = Validator::make($request->all(), [
            "price" => ['required','numeric', 'min:1','max:99.999999', 'regex:/^\d+(\.\d{1,2})?$/'],
            "description" => 'required',
            "amount" => ['required','numeric', 'min:1','max:99.9999', 'regex:/^\d+(\.\d{1,2})?$/']
            ]);

        return $validate;

    }

    public function createItem(Request $request, $idcustomer = null){

        $item = Item::create([
                            'item_idcustomer' => $idcustomer,
                            'price' => $request->price,
                            'description' => $request->description,
                            'amount' => $request->amount
                        ]);

        return $item;
    }

}
