<?php

namespace App\Http\Requests;
use App\Student;
use App\Admissionyear;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        'program_id' => 'required',
        'faculty_id' => 'required',
        'year_id' => 'required',
        'semester_id' => 'required',
        'admission_year_id'=>'required',
        'name' => 'required',
        'student_phone'=>'required',
        'email' => 'required',
        'permanent_address' => 'required',
        'current_address' => 'required',
        'dob' => 'required',
        'gender'=>'required',
        'parents_name' => 'required',
        'parents_phone' => 'required',
        'total_fees' => 'required',
        'image'=>'required|image',
        ];
    }

    public function message()
    {
        return [
        //Custom Error Message Here//

        ];
    }
}
