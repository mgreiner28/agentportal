<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Faq management
        Gate::define('faq_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Faq categories
        Gate::define('faq_category_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_category_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_category_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_category_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Faq questions
        Gate::define('faq_question_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_question_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_question_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_question_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('faq_question_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Deals
        Gate::define('deal_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Sales
        Gate::define('sale_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('sale_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('sale_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('sale_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('sale_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Internal notifications
        Gate::define('internal_notification_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('internal_notification_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('internal_notification_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('internal_notification_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('internal_notification_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
