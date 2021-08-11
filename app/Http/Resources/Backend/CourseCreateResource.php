<?php

namespace App\Http\Resources\Backend;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed level
 * @property mixed tags
 * @property mixed status
 */
class CourseCreateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);


        $result = [];

        $result['level'] = $this->convertKeyValue($this->level);
        $result['status'] = $this->convertKeyValue($this->status);

        $result['tags'] = $this->tags->map(function($tag){
           $response = new \stdClass();

           $response->id = $tag->id;
           $response->name = $tag->name;

           return $response;

        });

        return $result;

    }

    public function convertKeyValue($array): array
    {
        $result = [];

        foreach ($array as $key => $value) {
            $result[] = [
                'value' => $key,
                'label' => $value
            ];
        }

        return $result;

    }

}
