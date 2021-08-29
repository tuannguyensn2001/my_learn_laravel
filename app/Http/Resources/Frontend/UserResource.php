<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed name
 * @property mixed email
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed profile
 */
class UserResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'profile' => [
                'fullname' => $this->profile->fullname,
                'media_id' => $this->profile->media_id,
                'address' => $this->profile->address,
                'media' => [
                    'path' => $this->profile->media->path
                ]
            ]
        ];
    }
}
