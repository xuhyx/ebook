<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoods extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gname' => 'required',
            'cate_id' => 'required|exists:cates,id',
            'gPrise' => 'required',
            'gauthor' => 'required',
            'gstock' => 'required|numeric',
            'isSale' => 'required',
            'isHot' => 'required',
            'isNew' => 'required',
            'gDesc' => 'required',
            'press_name'=>'exists:presses,name',
            'gimg' => 'required|image',
        ];
    }
}
