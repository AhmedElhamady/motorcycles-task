<?php

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';
    case DataEntry = 'data-entry';

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::DataEntry => 'Data Entry',
        };
    }

    public function abilities(): array
    {
        return match ($this) {
            self::Admin => [
                'manage-users',
                'manage-brands',
                'manage-categories',
                'manage-services',
                'manage-motorcycles',
                'manage-enquiries',
                'manage-sliders',
            ],
            self::DataEntry => [
                'manage-motorcycles',
                'manage-enquiries',
            ],
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }

        return $options;
    }
}
