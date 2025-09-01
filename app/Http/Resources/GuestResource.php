<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Gender;
use App\Models\FoodPreference;
class GuestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $genderName = Gender::find($this->gender_id)->gender_name;
        return [
            'guestId' => $this->id,
            'guestName' => $this->guest_name,
            'mobile' => $this->mobile,
            'wpNumber' => $this->wp_number,
            'address' => $this->address,
            'email' => $this->email,
            'genderId' => $this->gender_id,
            'genderName' => $genderName,
            'foodPreferenceId' => $this->food_preference_id,
            'foodPreferenceName' => FoodPreference::find($this->food_preference_id)->food_preference_name,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,   
        ];
    }
}
