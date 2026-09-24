<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use App\Helper\ResponseHelper;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Display a listing of all users (Admin only).
     */
    public function index()
    {
        try {
            $users = User::with(['userType', 'employee.department', 'employee.designation', 'student'])->orderBy('id', 'desc')->get();
            return ResponseHelper::success('Users retrieved successfully', UserResource::collection($users));
        } catch (Exception $e) {
            return ResponseHelper::error($e->getMessage());
        }
    }

    /**
     * Store a newly created user (Admin provisioned).
     */
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'email'        => $request->email,
                'password'     => Hash::make($request->password),
                'user_type_id' => $request->user_type_id,
                'employee_id'  => $request->employee_id,
                'student_id'   => $request->student_id,
            ]);

            if ($user) {
                $user->load(['userType', 'employee.department', 'employee.designation', 'student']);
                return ResponseHelper::success(
                    'User created successfully',
                    ['user' => new UserResource($user)],
                    201
                );
            } else {
                return ResponseHelper::error('Failed to register user');
            }
        } catch (Exception $e) {
            return ResponseHelper::error($e->getMessage());
        }
    }

    /**
     * User login & token generation (Sanctum).
     */
    public function login(LoginRequest $request)
    {
        // Check if database connection is active
        try {
            DB::connection()->getPdo();
        } catch (Exception $e) {
            return ResponseHelper::error($e->getMessage(), null, 503);
        }

        try {
            // Attempt to authenticate the user
            if (!Auth::attempt($request->only('email', 'password'))) {
                return ResponseHelper::error('Invalid credentials', null, 401);
            }

            // Get the authenticated user
            $user = Auth::user();

            // Generate a new token for API authentication (Using Laravel Sanctum)
            $token = $user->createToken('auth_token')->plainTextToken;

            return ResponseHelper::success('login successfully', [
                'user'  => new UserResource($user),
                'token' => $token,
            ], 200);
        } catch (Exception $e) {
            return ResponseHelper::error($e->getMessage(), null);
        }
    }

    /**
     * Get current authenticated user details.
     */
    public function getCurrentUser()
    {
        $user = auth()->user();

        if (!$user) {
            return ResponseHelper::error('token expired', null, 401);
        }

        return ResponseHelper::success('User fetched', new UserResource($user), 200);
    }

    /**
     * Get extended user details.
     */
    public function getCurrentUser2()
    {
        $user = auth()->user();

        if (!$user) {
            return ResponseHelper::error('token expired', null, 401);
        }

        return ResponseHelper::success('User fetched', $user, 200);
    }

    /**
     * Log out the current user session (delete token).
     */
    public function logout()
    {
        $user = auth()->user();
        if ($user) {
            $user->tokens()->delete();
        }
        return ResponseHelper::success('Logged out successfully', $user, 200);
    }

    /**
     * Revoke all personal access tokens for the current user.
     */
    public function revoke_all()
    {
        $user = auth()->user();
        $result = $user ? $user->tokens()->delete() : null;
        return ResponseHelper::success('Revoke all', $result, 200);
    }

    /**
     * Self-Service: Change password for the currently logged-in user.
     * Requires: current_password, new_password, (optional) confirm_password
     */
    public function changePassword(Request $request)
    {
        try {
            $user = auth()->user();

            if (!$user) {
                return ResponseHelper::error('Unauthenticated', null, 401);
            }

            $currentPassword = $request->current_password 
                ?? $request->currentPassword 
                ?? $request->oldPassword 
                ?? $request->old_password;

            $newPassword = $request->new_password 
                ?? $request->newPassword 
                ?? $request->password;

            $confirmPassword = $request->confirm_password 
                ?? $request->confirmPassword 
                ?? $request->new_password_confirmation 
                ?? $request->password_confirmation;

            if (empty($currentPassword) || empty($newPassword)) {
                return ResponseHelper::error('Current password and new password are required', null, 422);
            }

            // Verify current password against existing user hash
            if (!Hash::check($currentPassword, $user->password)) {
                return ResponseHelper::error('Current password is incorrect', null, 400);
            }

            // Verify password match if confirmation was passed
            if (!empty($confirmPassword) && $newPassword !== $confirmPassword) {
                return ResponseHelper::error('New password and confirmation do not match', null, 422);
            }

            // Minimum length rule
            if (strlen($newPassword) < 6) {
                return ResponseHelper::error('New password must be at least 6 characters', null, 422);
            }

            // Save new hashed password
            $user->password = Hash::make($newPassword);
            $user->save();

            return ResponseHelper::success('Password updated successfully', [
                'user' => new UserResource($user)
            ], 200);

        } catch (Exception $e) {
            return ResponseHelper::error($e->getMessage(), null, 500);
        }
    }

    /**
     * Admin-Service: Reset user password by user ID or email (Admin only).
     * Accepts: password (or defaults to 'India2day@2026')
     */
    public function adminResetPassword(Request $request, $id = null)
    {
        try {
            $userId = $id ?? $request->id ?? $request->user_id ?? $request->userId;
            $email = $request->email ?? $request->userName ?? $request->user_name;
            $newPassword = $request->password ?? $request->new_password ?? $request->newPassword ?? 'India2day@2026';

            $user = null;
            if ($userId) {
                $user = User::find($userId);
            } elseif ($email) {
                $user = User::where('email', $email)->first();
            }

            if (!$user) {
                return ResponseHelper::error('User account not found', null, 404);
            }

            if (strlen($newPassword) < 6) {
                return ResponseHelper::error('Password must be at least 6 characters', null, 422);
            }

            $user->password = Hash::make($newPassword);
            $user->save();

            return ResponseHelper::success('User password has been reset successfully', [
                'userId'   => $user->id,
                'email'    => $user->email,
                'password' => $newPassword,
            ], 200);

        } catch (Exception $e) {
            return ResponseHelper::error($e->getMessage(), null, 500);
        }
    }

    /**
     * Public self-service password reset (by email / enrollment number).
     */
    public function publicResetPassword(Request $request)
    {
        try {
            $identifier = trim($request->email ?? $request->userName ?? $request->identifier ?? '');
            $newPassword = $request->password ?? $request->new_password ?? $request->newPassword;
            $confirmPassword = $request->confirm_password ?? $request->confirmPassword ?? $request->password_confirmation;

            if (empty($identifier)) {
                return ResponseHelper::error('Email or enrollment number is required', null, 422);
            }

            // Find user by email or enrollment handle
            $user = User::where('email', $identifier)->first();

            if (!$user) {
                return ResponseHelper::error('No user account found matching this identifier', null, 404);
            }

            if (empty($newPassword)) {
                return ResponseHelper::error('New password is required', null, 422);
            }

            if (!empty($confirmPassword) && $newPassword !== $confirmPassword) {
                return ResponseHelper::error('New password and confirmation do not match', null, 422);
            }

            if (strlen($newPassword) < 6) {
                return ResponseHelper::error('New password must be at least 6 characters', null, 422);
            }

            $user->password = Hash::make($newPassword);
            $user->save();

            return ResponseHelper::success('Password has been reset successfully. Please sign in with your new password.', [
                'email' => $user->email
            ], 200);

        } catch (Exception $e) {
            return ResponseHelper::error($e->getMessage(), null, 500);
        }
    }
}
