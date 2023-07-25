<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Models\User;

trait CreateNotification {
    public function pushAdminNotification($type, $title, $description){
        $admins = User::where('user_type_id', 1)->get();
        foreach($admins as $admin){
            $admin->notifications()->create([
                'type' => $type,
                'title' => $title,
                'description' => $description,
            ]);
        }
    }

    public function pushUserNotification($user, $type, $title, $description, $resource){
        $user->notifications()->create([
            'type' => $type,
            'title' => $title,
            'description' => $description,
            'resource' => $resource,
        ]);

    }
}