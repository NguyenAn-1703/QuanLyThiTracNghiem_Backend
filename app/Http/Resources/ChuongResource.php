<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChuongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'tenChuong' => $this->tenChuong,
            'monHocId'  => $this->monHocId,
            'monHoc'    => new MonHocResource($this->whenLoaded('monHoc')),
            'isDeleted' => $this->isDeleted,
        ];
    }
}
