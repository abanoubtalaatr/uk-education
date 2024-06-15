<?php

namespace App\Providers;

use App\Nova\About;
use App\Nova\City;
use App\Nova\Type;
use App\Nova\User;
use App\Nova\Brand;
use App\Nova\Event;
use App\Nova\Model;
use App\Nova\Tutor;
use App\Nova\Answer;
use App\Nova\Course;
use App\Nova\CrashCourse;
use App\Nova\Region;
use App\Nova\Survey;
use App\Nova\District;
use App\Nova\Interest;
use App\Nova\MockExam;
use App\Nova\Question;
use Laravel\Nova\Nova;
use Illuminate\Http\Request;
use App\Nova\Dashboards\Main;
use App\Nova\Page;
use App\Nova\Slider;
use App\Nova\Subscription;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Illuminate\Support\Facades\Gate;
use Sereny\NovaPermissions\Nova\Role;
use Outl1ne\NovaSettings\NovaSettings;
use Epigra\NovaSettings\NovaSettingsTool;
use Spatie\NovaTranslatable\Translatable;
use Sereny\NovaPermissions\Nova\Permission;
use Sereny\NovaPermissions\NovaPermissions;
use Laravel\Nova\NovaApplicationServiceProvider;
use App\Nova\Tools\CustomNovaPageTool;
use Whitecube\NovaPage\NovaPageTool;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        Nova::withBreadcrumbs();

        Translatable::defaultLocales(['en', 'ar']);

        Nova::userLocale(function () {
            return match (app()->getLocale()) {
                'en' => 'en',
                'ar' => 'ar',
                default => null,
            };
        });

        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::dashboard(Main::class)->icon('chart-bar'),

                MenuSection::make(__('Customers'), [
                    MenuItem::resource(User::class),
                    MenuItem::resource(Tutor::class),
                ])->icon('user')->collapsable()->collapsedByDefault(),

                MenuSection::make(__('Courses'), [
                    MenuItem::resource(Course::class),
                ])->icon('user')->collapsable()->collapsedByDefault(),

                MenuSection::make(__('Mock Course'), [
                    MenuItem::resource(MockExam::class),
                ])->icon('user')->collapsable(),

                MenuSection::make(__('Crash Course'), [
                    MenuItem::resource(CrashCourse::class),
                ])->icon('user')->collapsable(),

                MenuSection::make(__('Subscriptions'), [
                    MenuItem::resource(Subscription::class),
                ])->icon('user')->collapsable(),

                MenuSection::make(__('Roles and Permissions'), [
                    MenuItem::resource(Role::class)->canSee(fn () => true),
                    MenuItem::resource(Permission::class)->canSee(fn () => true),
                ])->icon('shield-check')->collapsable()->collapsedByDefault(),

                MenuSection::make(__('Settings'), [
                    MenuItem::resource(Page::class)->canSee(fn () => true),
                    MenuItem::resource(Slider::class)->canSee(fn () => true),
                    MenuItem::link(__('Settings'), 'nova-settings/general'),
                ])->collapsable()->icon('cog'),
            ];
        });

        NovaSettings::addSettingsFields([
            Text::make(__("Facebook account"), 'facebook')
                ->rules('required', 'url')
                ->help('Enter a valid Facebook URL'),

            Text::make(__("Twitter account"), 'twitter')
                ->rules('required', 'url')
                ->help('Enter a valid Facebook URL'),
        ]);
    }

    public function tools(): array
    {
        return [
            new NovaPermissions(),
            new \Outl1ne\NovaSettings\NovaSettings,
            // \Whitecube\NovaPage\NovaPageTool::make(),
        ];
    }

    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    public function menu(Request $request)
    {
        return MenuItem::make('Settings')
            ->path('/nova-settings')
            ->icon('settings');
    }

    public function register(): void
    {
        //
    }

    protected function gate(): void
    {
        Gate::define('viewNova', function ($user) {
            return $user->hasRole('super-admin');
        });
    }

    protected function dashboards(): array
    {
        return [
            new \App\Nova\Dashboards\Main(),
        ];
    }
}
