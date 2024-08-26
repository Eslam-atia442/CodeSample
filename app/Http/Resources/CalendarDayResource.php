<?php

namespace App\Http\Resources;


use \Illuminate\Http\Request;

class CalendarDayResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request) : array
    {
        $this->micro = [
            'id' => $this->id,
        ];
        $this->mini = [
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
        $this->full = [
            'day_date' => $this->day_date,
            'clinic_id' => $this->clinic_id,
        ];
        //$this->relationLoaded()
        $this->relations = [
            'clinic' => $this->whenLoaded('clinic', fn() => new ClinicResource($this->clinic)),
        ];
        return $this->getResource();
    }
}
