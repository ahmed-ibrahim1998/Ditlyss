<?php

use Spatie\LaravelSettings\Exceptions\SettingAlreadyExists;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

class GeneralSettings extends SettingsMigration
{
    /**
     * @throws SettingAlreadyExists
     */
    public function up(): void
    {
        $this->migrator->add('general.name', '');
        $this->migrator->add('general.meta_tags', '');
        $this->migrator->add('general.phone', '');
        $this->migrator->add('general.email', '');
        $this->migrator->add('general.fax', '');
        $this->migrator->add('general.logo', '');
        $this->migrator->add('general.ios_link', '');
        $this->migrator->add('general.android_link', '');
        $this->migrator->add('general.facebook', '');
        $this->migrator->add('general.instagram', '');
        $this->migrator->add('general.twitter', '');
        $this->migrator->add('general.linkedin', '');
        $this->migrator->add('general.pinterest', '');
        $this->migrator->add('general.description', '');
    }
}
