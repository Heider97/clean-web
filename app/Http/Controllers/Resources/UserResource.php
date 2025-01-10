<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'firebase_token' => $this->firebase_token,
            'last_seen' => $this->last_seen,
            'profile_photo_url' => $this->profile_photo_url,
            'customer' => $this->customer,
            'specialist' => $this->specialist,
            'role' => $this->roles->first(), // Return only the first role as an object
            'permissions' => $this->getAllPermissions()->pluck('name')
        ];
    }
}
