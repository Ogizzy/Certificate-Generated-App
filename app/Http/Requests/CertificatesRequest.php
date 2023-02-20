<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Certificate;
class CertificatesRequest extends FormRequest

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
     * @return array<string, mixed>
     */
    public function rules()
    {
      
        return [
            
            'name'=>'required|string',
            'sex'=>'required|string',
            'phone'=>'required|string',
            'certificate_num'=>'required|string',
            'year'=>'required|string',
            'training_centre'=>'required|string',
            'lga'=>'required|string',
            'lga_code'=>'required|string',
            'institution'=>'required|string',
            'institution_code'=>'required|string',
        ];
    }
}
