<?php

namespace App\Providers;

use App\Nova\City;
use App\Nova\Page;
use App\Nova\Type;
use App\Nova\User;
use App\Nova\About;
use App\Nova\Brand;
use App\Nova\Event;
use App\Nova\Model;
use App\Nova\Topic;
use App\Nova\Tutor;
use App\Nova\Video;
use App\Nova\Answer;
use App\Nova\Course;
use App\Nova\Region;
use App\Nova\Slider;
use App\Nova\Survey;
use App\Nova\Contact;
use App\Nova\District;
use App\Nova\Interest;
use App\Nova\MockExam;
use App\Nova\Question;
use Laravel\Nova\Nova;
use Eminiarts\Tabs\Tab;
use App\Nova\NewsLetter;
use Eminiarts\Tabs\Tabs;
use App\Nova\CrashCourse;
use App\Nova\Testimonial;
use App\Nova\BankScenario;
use App\Nova\Subscription;
use Illuminate\Http\Request;
use App\Nova\Dashboards\Main;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Menu\MenuSection;
use Illuminate\Support\Facades\Gate;
use Whitecube\NovaPage\NovaPageTool;
use Sereny\NovaPermissions\Nova\Role;
use App\Nova\Tools\CustomNovaPageTool;
use Outl1ne\NovaSettings\NovaSettings;
use Epigra\NovaSettings\NovaSettingsTool;
use Spatie\NovaTranslatable\Translatable;
use Sereny\NovaPermissions\Nova\Permission;
use Sereny\NovaPermissions\NovaPermissions;
use Whitecube\NovaFlexibleContent\Flexible;
use Laravel\Nova\NovaApplicationServiceProvider;

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
        
                MenuSection::make(__('Student & Tutors'), [
                    MenuItem::resource(User::class),
                    MenuItem::resource(Tutor::class),
                ])->icon('users')->collapsable()->collapsedByDefault(),
        
                MenuSection::make(__('Courses'), [
                    MenuItem::resource(Course::class),
                ])->icon('book-open')->collapsable()->collapsedByDefault(),
        
                MenuSection::make(__('Mock Exam'), [
                    MenuItem::resource(MockExam::class),
                ])->icon('clipboard-list')->collapsable()->collapsedByDefault(),
               
                MenuSection::make(__('Bank Scenarios'), [
                    MenuItem::resource(BankScenario::class),
                ])->icon('clipboard-list')->collapsable()->collapsedByDefault(),
        
                MenuSection::make(__('Crash Course'), [
                    MenuItem::resource(CrashCourse::class),
                ])->icon('book-open')->collapsable()->collapsedByDefault(),
        
                MenuSection::make(__('Subscriptions'), [
                    MenuItem::resource(Subscription::class),
                    MenuItem::resource(Topic::class),
                    MenuItem::resource(Video::class),
                ])->icon('credit-card')->collapsable()->collapsedByDefault(),
        
                MenuSection::make(__('Roles and Permissions'), [
                    MenuItem::resource(Role::class)->canSee(fn () => true),
                    MenuItem::resource(Permission::class)->canSee(fn () => true),
                ])->icon('shield-check')->collapsable()->collapsedByDefault(),
        
                MenuSection::make(__('Settings'), [
                    MenuItem::resource(Page::class)->canSee(fn () => true),
                    MenuItem::resource(Slider::class)->canSee(fn () => true),
                    MenuItem::resource(Testimonial::class),
                    MenuItem::link(__('Settings'), 'nova-settings/general'),
                ])->collapsable()->icon('cog')->collapsedByDefault(),
        
                MenuSection::make(__('Contact us & Subscribers'), [
                    MenuItem::resource(Contact::class)->canSee(fn () => true),
                    MenuItem::resource(NewsLetter::class)->canSee(fn () => true),
                ])->collapsable()->icon('cog')->collapsedByDefault(),
            ];
        });
        
        NovaSettings::addSettingsFields([
            Text::make(__("Facebook account"), 'facebook')
                ->rules('required', 'url')
                ->help('Enter a valid Facebook URL'),

            Text::make(__("Twitter account"), 'twitter')
                ->rules('required', 'url')
                ->help('Enter a valid Facebook URL'),

            Text::make(__("Instagram account"), 'instagram')
            ->rules('required', 'url')
            ->help('Enter a valid instagram URL'),

            Text::make(__("Youtube account"), 'youtube')
            ->rules('required', 'url')
            ->help('Enter a valid Youtube URL'),

            Text::make(__("Linkedin account"), 'linkedin')
            ->rules('required', 'url')
            ->help('Enter a valid Linkedin URL'),

            Text::make(__("Email"), 'email')
            ->rules('required', 'email')
            ->help('Enter a valid Email'),


            Text::make(__("Address"), 'address')
            ->rules('required', 'max:255')
            ->help('Enter a valid Address'),


            Text::make(__("Whats App"), 'whats_app_number')
            ->rules('required', 'numeric')
            ->help('Enter a valid Whats app number'),


            Text::make(__("Mobile number"), 'mobile')
            ->rules('required', 'numeric')
            ->help('Enter a valid Mobile'),


            Image::make(__("Logo"), 'logo'),

            Trix::make(__("What Is Mock Exam."), 'mock_description'),
         
            new Tabs('Mock Details', [
                Tab::make('Mock Content', [
                    Flexible::make('Mock Content')
                        ->addLayout('Content', 'content', [
                            Textarea::make('Content')
                        ])
                        ->button('Add New Content'),
                ]),

                Tab::make('Mock Who is the course for?', [
                    Flexible::make('Mock Who Is The Course For')
                        ->addLayout('Audience', 'audience', [
                            Textarea::make('Audience')
                        ])
                        ->button('Add New Audience'),
                ]),

                Tab::make('Mock Course Aims', [
                    Flexible::make('Mock Course Aims')
                        ->addLayout('Aims', 'aims', [
                            Textarea::make('Aims')
                        ])
                        ->button('Add New Aim'),
                ]),

                Tab::make('Mock Learning Objectives', [
                    Flexible::make('Mock Learning Objectives')
                        ->addLayout('Objective', 'objective', [
                            Textarea::make('Objective')
                        ])
                        ->button('Add New Objective'),
                ]),

                Tab::make('Mock Learning Outcomes', [
                    Flexible::make('Mock Learning Outcomes')
                        ->addLayout('Outcome', 'outcome', [
                            Textarea::make('Outcome')
                        ])
                        ->button('Add New Outcome'),
                ]),
            ]),
            
            Trix::make(__("What Is Course."), 'course_description'),
            Trix::make(__("What Is Crash Course."), 'crash_description'),
            Trix::make(__("What Is Subscription."), 'subscription_description'),

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
