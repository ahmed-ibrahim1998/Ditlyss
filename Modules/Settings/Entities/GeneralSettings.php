<?php


namespace Modules\Settings\Entities;


use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    public  $name;
    public  $meta_tags;
    public  $phone;
    public  $email;
    public  $fax;
    public  $logo;
    public  $ios_link;
    public  $android_link;
    public  $facebook;
    public  $instagram;
    public  $twitter;
    public  $linkedin;
    public  $pinterest;
    public  $description;


    public static function group(): string
    {
        return 'general';
    }

}
