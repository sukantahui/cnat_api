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
        $genderName = $this->relationLoaded('gender')
            ? $this->gender?->gender_name
            : (Gender::find($this->gender_id)?->gender_name ?? null);

        $foodPreferenceName = $this->relationLoaded('foodPreference')
            ? $this->foodPreference?->food_preference_name
            : (FoodPreference::find($this->food_preference_id)?->food_preference_name ?? null);

        return [
            'id'                 => $this->id,
            'guestId'            => $this->id,
            'year'               => $this->year,
            'token'              => $this->token,
            'guestName'          => $this->guest_name,
            'age'                => $this->age,
            'mobileMasked'       => $this->maskMobile($this->mobile),
            'mobile'             => $this->mobile,
            'wpNumberMasked'     => $this->maskMobile($this->wp_number),
            'wpNumber'           => $this->wp_number,
            'address'            => $this->address,
            'email'              => $this->email,
            'pin'                => $this->pin,
            'genderId'           => (string) $this->gender_id,
            'genderName'         => $genderName,
            'foodPreferenceId'   => (string) $this->food_preference_id,
            'foodPreferenceName' => $foodPreferenceName,
            'isAttending'        => (bool) $this->is_attending,
            'is_present'         => (bool) $this->is_attending,
            'is_attending'       => (bool) $this->is_attending,
            'comment'            => $this->comment,
            'createdAt'          => $this->created_at?->toIso8601String(),
            'updatedAt'          => $this->updated_at?->toIso8601String(),
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
