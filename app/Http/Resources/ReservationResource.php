<?php

namespace App\Http\Resources;


use \Illuminate\Http\Request;

class ReservationResource extends BaseResource
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
            'type' => $this->type,

        ];
        $this->mini = [
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at?->format('Y-m-d H:i:s'),
        ];
        $this->full = [
            'type_text' => $this->type_text,

            'scheduled_at' => $this->scheduled_at,
            'patient_name' => $this->patient_name,
            'patient_phone' => $this->patient_phone,

            'gender' => $this->gender,
            'gender_text' => $this->gender_text,

            'email' => $this->email,
            'dob' => $this->dob,
            'is_saudi' => $this->is_saudi,
            'national_id' => $this->national_id,
            'residency_number' => $this->residency_number,
        ];
        //$this->relationLoaded()
        $this->relations = [
        ];
        return $this->getResource();
    }
}
