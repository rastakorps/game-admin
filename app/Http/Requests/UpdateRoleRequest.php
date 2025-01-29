<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($this->role)],
            'permissions' => 'required|array',
            'permissions.*' => 'integer|exists:permissions,id'
        ];
    }

    public function prepareForValidation()
    {
        $permissions = explode(',', $this->permissions);
        $permissions = array_filter($permissions, function($value) {
            return !empty($value);
        });
    
        $this->merge([
            'permissions' => $permissions
        ]);
    }

    public function messages()
    {
        return [
            'name.unique' => 'El nombre del rol ya está en uso. Por favor, elige otro.',
            'permissions.min' => 'Debes seleccionar al menos un permiso.',
            'permissions.required' => 'Selecciona al menos un permiso.',
            'permissions.*.exists' => 'Uno o más permisos no son válidos.'
        ];
    }
}
