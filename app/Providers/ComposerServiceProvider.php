<?php

namespace App\Providers;

use App\User;
use App\HRPerson;
use App\CompanyIdentity;
use App\Module_access;
use App\ModuleRibbon;
use App\Module;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


        $companyDetails = CompanyIdentity::systemSettings();
        view()->composer('includes.header', function ($view) use ($companyDetails) {
            $user = Auth::user()->load('person');

            $companyDetailLogo = CompanyIdentity::first();

            $defaultAvatar = (empty($user->person->gender === 0)) ? 'avatars/f-silhouette.jpg' : 'avatars/m-silhouette.jpg';
            $avatar = $user->person->profile_pic;
            $position = ($user->person->position) ? DB::table('hr_positions')->find($user->person->position)->name : '';

            $headerNameBold = $companyDetails['header_name_bold'];
            $headerNameRegular = $companyDetails['header_name_regular'];
            $headerAcronymBold = $companyDetails['header_acronym_bold'];
            $headerAcronymRegular = $companyDetails['header_acronym_regular'];


            $data['user'] = $user;
            $data['companyDetailLogo'] = (!empty($companyDetailLogo->company_logo)) ? Storage::disk('local')->url("logo/$companyDetailLogo->company_logo") : '';
            $data['full_name'] = $user->person->first_name . " " . $user->person->surname;
            $data['avatar'] = (!empty($avatar)) ? Storage::disk('local')->url("avatars/$avatar") : Storage::disk('local')->url($defaultAvatar);
            $data['position'] = $position;
            $data['headerNameBold'] = $headerNameBold;
            $data['headerNameRegular'] = $headerNameRegular;
            $data['headerAcronymBold'] = $headerAcronymBold;
            $data['headerAcronymRegular'] = $headerAcronymRegular;

            $view->with($data);
        });

        view()->composer('layouts.page_head', function ($view) use ($companyDetails) {
            $headerNameBold = $companyDetails['header_name_bold'];
            $data['headerNameBold'] = $headerNameBold;
            $view->with($data);
        });

        view()->composer('includes.footer', function ($view) use ($companyDetails) {
            $headerNameBold = $companyDetails['header_name_bold'];
            $data['headerNameBold'] = $headerNameBold;
            $view->with($data);
        });

        /**
         * layout sidebar
         */

        $companyDetails = CompanyIdentity::systemSettings();

        view()->composer('includes.sidebar', function ($view) use ($companyDetails) {

            $user = Auth::user()->load('person');


            $defaultAvatar = ($user->person->gender === 0) ? 'avatars/f-silhouette.jpg' : 'avatars/m-silhouette.jpg';
            $avatar = $user->person->profile_pic;
            $position = ($user->person->position) ? DB::table('hr_positions')->find($user->person->position)->name : '';

            $modulesAccess = Module::whereHas('moduleRibbon', function ($query) {
                $query->where('active', 1);
            })->where('active', 1)
                ->whereIn('id', Module_access::where('user_id', $user->id)->select('module_id')->where(function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                    $query->whereNotNull('access_level');
                    $query->where('access_level', '>', 0);
                })->get())
                ->with(['moduleRibbon' => function ($query) use ($user) {
                    $query->whereIn('id', ModuleRibbon::select('module_ribbons.id')->join('module_accesses', function ($join) use ($user) {
                        $join->on('module_ribbons.module_id', '=', 'module_accesses.module_id');
                      //  $join->on('module_ribbons.access_level', '<=', 'module_accesses.access_level');
                    })->get());
                    $query->orderBy('sort_order', 'Asc');
                }])
                ->orderBy('name', 'DESC')->get();

            $headerNameBold = $companyDetails['header_name_bold'];
            $headerNameRegular = $companyDetails['header_name_regular'];
            $headerAcronymBold = $companyDetails['header_acronym_bold'];
            $headerAcronymRegular = $companyDetails['header_acronym_regular'];

            $data['headerNameBold'] = $headerNameBold;
            $data['headerNameRegular'] = $headerNameRegular;
            $data['headerAcronymBold'] = $headerAcronymBold;
            $data['headerAcronymRegular'] = $headerAcronymRegular;
            $data['user'] = $user;
            $data['full_name'] = $user->person->first_name . " " . $user->person->surname;
            $data['avatar'] = (!empty($avatar)) ? Storage::disk('local')->url("avatars/$avatar") : Storage::disk('local')->url($defaultAvatar);
            $data['position'] = $position;

            $data['company_logo'] = $companyDetails['company_logo_url'];
            $data['modulesAccess'] = $modulesAccess;
            $view->with($data);
        });

        //Compose main layout
        view()->composer('layouts.main_layout', function ($view) use ($companyDetails) {
            $skinColor = $companyDetails['sys_theme_color'];

            $data['skinColor'] = $skinColor;
            $data['system_background_image_url'] = $companyDetails['system_background_image_url'];
            $data['login_background_image_url'] = $companyDetails['login_background_image_url'];

            $view->with($data);
        });

    }
}
