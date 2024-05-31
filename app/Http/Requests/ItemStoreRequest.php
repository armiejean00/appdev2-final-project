<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
       if(request()->isMethod('post')){
        return[
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=>'required|string|max:258',
            'description'=>'required|string',
             'category_id'=>'required',
              'location_id'=>'required',
               'datefound'=>'required',
            //    'status'=>'required',


        ];

       }else{
         return[
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=>'required|string|max:258',
            'description'=>'required|string',
             'category_id'=>'required',
              'location_id'=>'required',
               'datefound'=>'required',
            //    'status'=>'required',


        ];

       }

    }

    public function message()
    {
        if(request()->isMethod('post')){
        return[
            'image.required'=>'Image is required',
            'name.required'=>'Name is required',
            'description.required'=>'Description is required',
             'category_id.required'=>'category_id is required',
              'location_id.required'=>'location_id is required',
               'datefound.required'=>'date is required',
            //    'status.required'=>'status is required',


        ];

       }else{
         return[
            
          
            'name.required'=>'Name is required',
            'description.required'=>'Description is required',
             'category_id.required'=>'category_id is required',
              'location_id.required'=>'location_id is required',
               'datefound.required'=>'date is required',
            //    'status.required'=>'status is required',


        ];

       }
    }
}
