<?php

namespace OrmBg\Modules\Navigation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenusRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $actionMethod   = $this->route()->getActionMethod();

        if ( $actionMethod == 'store' || $actionMethod == 'update' )
        {
            return [
                'item.name'     => 'required|string',
                'item.slug'     => 'required|string',
                'item.items'    => 'required|string',
            ];
        }

        return [];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
