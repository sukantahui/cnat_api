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
            'token' => $this->token,
            'guestName' => $this->guest_name,
            'mobileMasked' => $this->maskMobile($this->mobile),
            'mobile' => $this->mobile,
            'wpNumberMasked' => $this->maskMobile($this->wp_number),
            'wpNumber' => $this->wp_number,
            'address' => $this->address,
            'email' => $this->email,
            'genderId' => $this->gender_id,
            'genderName' => $genderName,
            'foodPreferenceId' => $this->food_preference_id,
            'foodPreferenceName' => FoodPreference::find($this->food_preference_id)->food_preference_name,
            'isPresent' => $this->is_present,
            'comment' => $this->comment,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,   
        ];
    }
    private function maskMobile($mobile)
    {
        if (!$mobile || strlen($mobile) < 4) {
            return $mobile; // fallback if invalid number
        }

        $firstTwo = substr($mobile, 0, 2);
        $lastTwo  = substr($mobile, -2);
        $masked   = str_repeat('X', strlen($mobile) - 4);

        return $firstTwo . $masked . $lastTwo;
    }
}
