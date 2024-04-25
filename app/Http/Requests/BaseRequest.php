<?php

/**
 * @author RedHead_Dev => Kravchenko Dmitriy
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{
    /**
     * @return mixed
     */
    public abstract function rules();


    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return mixed
     */
    public function getSanitized()
    {
        return $this->validated();
    }
}
