<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       // dd($this->name);  //value 
        // return parent::toArray($request);
       return [
        'Drivers_name' => $this->name  ,
        'Drivers_email' => $this->email  ,
       ];

    }
}
