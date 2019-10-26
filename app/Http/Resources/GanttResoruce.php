<?php

namespace App\Http\Resources;

use App\Link;
use Illuminate\Http\Resources\Json\JsonResource;

class GanttResoruce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $links = new Link();

        return[
            "data" => [
                'id'=>$this->id,
                'text'=> $this->text,
                'start_date'=> $this->start_date,
                'duration'=>$this->duration,
                'progrss'=> $this->progress,
                'parent'=> $this->parent,
        ],
            "links" => $links->all()

        ];
    }
}
