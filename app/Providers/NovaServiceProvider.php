<?php

namespace App\Providers;

use App\Nova\Page;
use App\Nova\User;
use App\Nova\Topic;
use App\Nova\Tutor;
use App\Nova\Video;
use App\Nova\Course;
use App\Nova\Slider;
use App\Nova\Contact;
use App\Nova\MockExam;
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
use App\Nova\Scenario;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Menu\MenuSection;
use Illuminate\Support\Facades\Gate;
use Sereny\NovaPermissions\Nova\Role;
use Outl1ne\NovaSettings\NovaSettings;
use DigitalSolutions\Calendar\Calendar;
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
                    MenuItem::resource(  Scenario::class),
                ])->icon('clipboard-list')->collapsable()->collapsedByDefault(),
        
                MenuSection::make(__('Crash Course'), [
                    MenuItem::resource(CrashCourse::class),
                ])->icon('book-open')->collapsable()->collapsedByDefault(),
        
                MenuSection::make(__('Subscriptions'), [
                    MenuItem::resource(Subscription::class),
                    MenuItem::resource(Topic::class),
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

                (new Calendar())->menu($request)
            ];
        });
        // if (auth()->check() && auth()->user()->can('viewAnySetting')) {
            NovaSettings::addSettingsFields([
            Text::make(__("Facebook account"), 'facebook')
                ->rules('required', 'url')
                ->help('Enter a valid Facebook URL'),

            Text::make(__("Twitter account"), 'twitter')
                ->rules('required', 'url')
                ->help('Enter a valid Twitter URL'),

            Text::make(__("Instagram account"), 'instagram')
                ->rules('required', 'url')
                ->help('Enter a valid Instagram URL'),

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

         
            //Mock
            new Tabs('Our Plab2 Mocks', [
                Tab::make('Our Plab2 Mocks', [
                    Flexible::make('Our Plab2 Mocks')
                        ->addLayout('Plab2 Mocks', 'plab_mocks', [
                            Textarea::make('Plab2 Mocks')
                        ])
                        ->button('Add New'),
                ]),

                Tab::make('Why is it important', [
                    Flexible::make('Why is it important')
                        ->addLayout('Why is it important', 'why_is_it_important', [
                            Textarea::make('Important')
                        ])
                        ->button('Add New'),
                ]),

                Tab::make('When to take a mock', [
                    Flexible::make('When to take a mock')
                        ->addLayout('When', 'when_to_take_a_mock', [
                            Textarea::make('When')
                        ])
                        ->button('Add New'),
                ]),
                
                Tab::make('Mock results and feedback', [
                    Flexible::make('Mock results and feedback')
                        ->addLayout('Feedback', 'feedback', [
                            Textarea::make('Feedback')
                        ])
                        ->button('Add New'),
                ]),
    
            ]),
            

            //Course
            new Tabs('PLAB2/CPSA Course', [
                Tab::make('PLAB2/CPSA Course', [
                    Flexible::make('PLAB2/CPSA Course')
                        ->addLayout('PLAB2/CPSA Course', 'plab_course', [
                            Textarea::make('Plab2 Course')
                        ])
                        ->button('Add New'),
                ]),

                
                Tab::make('Course content', [
                    Flexible::make('Course content')
                        ->addLayout('Course content', 'course_content', [
                            Textarea::make('course_content')
                        ])
                        ->button('Add New'),
                ]),

                Tab::make('Who the course for', [
                    Flexible::make('Who the course for')
                        ->addLayout('Who the course for', 'who_the_course_for', [
                            Textarea::make('Who the course for')
                        ])
                        ->button('Add New'),
                ]),

                Tab::make('Course aims', [
                    Flexible::make('Course aims')
                        ->addLayout('Course aims', 'course_aims', [
                            Textarea::make('Course Aims')
                        ])
                        ->button('Add New'),
                ]),
                
                Tab::make('Learning objectives', [
                    Flexible::make('Learning objectives')
                        ->addLayout('Learning objectives', 'course_learning_objectives', [
                            Textarea::make('Learning objectives')
                        ])
                        ->button('Add New'),
                ]),

                Tab::make('Learning outcomes', [
                    Flexible::make('Learning outcomes')
                        ->addLayout('Learning outcomes', 'course_learning_outcomes', [
                            Textarea::make('Learning outcomes')
                        ])
                        ->button('Add New'),
                ]),
    
            ]),
            
            new Tabs('Plab2/CPSA crash course', [
                Tab::make('Plab2/CPSA crash course', [
                    Flexible::make('Plab2/CPSA crash course')
                        ->addLayout('PLAB2/CPSA Crash Course', 'plab_crash_course', [
                            Textarea::make('Plab2 Crash Course')
                        ])
                        ->button('Add New'),
                ]),

                
                Tab::make('Crash course content', [
                    Flexible::make('Crash course content')
                        ->addLayout('Crash course content', 'crash_course_content', [
                            Textarea::make('Crash Course Content')
                        ])
                        ->button('Add New'),
                ]),

                Tab::make('Who the crash course for', [
                    Flexible::make('Who the crash course for')
                        ->addLayout('Who the crash course for', 'who_the_crash_course_for', [
                            Textarea::make('Who the crash course for')
                        ])
                        ->button('Add New'),
                ]),

                Tab::make('Crash Course aims', [
                    Flexible::make('Crash Course aims')
                        ->addLayout('Crash Course aims', 'crash_course_aims', [
                            Textarea::make('Crash Course Aim')
                        ])
                        ->button('Add New'),
                ]),
                
                Tab::make('Crash Course Learning objectives', [
                    Flexible::make('Crash Course Learning objectives')
                        ->addLayout('Crash Course Learning objectives', 'crash_course_learning_objectives', [
                            Textarea::make('Crash Course Learning objectives')
                        ])
                        ->button('Add New'),
                ]),

                Tab::make('Crash Course Learning outcomes', [
                    Flexible::make('Crash Course Learning outcomes')
                        ->addLayout('Crash Course Learning outcomes', 'crash_course_learning_outcomes', [
                            Textarea::make('Crash Course Learning outcomes')
                        ])
                        ->button('Add New'),
                ]),
    
            ]),
            

        ]);
    // }
    }

    public function tools(): array
    {
        return [
            new NovaPermissions(),
            new \Outl1ne\NovaSettings\NovaSettings,
            new Calendar(),
            
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
