<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Log an admin action.
     *
     * @param string $action
     * @param string $details
     * @return void
     */
    protected function logAdminAction(string $action, string $details = '')
    {
        Log::info('Admin Action: ' . $action, ['details' => $details]);
    }

    /**
     * Authorize an admin action.
     *
     * @param string $ability
     * @param mixed $arguments
     * @return void
     */
    protected function authorizeAdminAction(string $ability, $arguments = [])
    {
        $this->authorize($ability, $arguments);
    }

    /**
     * Get the current admin user.
     *
     * @return \App\Models\User
     */
    protected function getAdminUser()
    {
$user = auth()->user();
if (!$user) {
    // Handle the case where no user is authenticated
    return null; // or throw an exception
}
return $user;
    }

    /**
     * Check if the current user is an admin.
     *
     * @return bool
     */
    protected function isAdmin()
    {
        $user = $this->getAdminUser();
        return $user && $user->role === 'admin';
    }
}
