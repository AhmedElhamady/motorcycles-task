<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slider extends Model
{
    use HasTranslations;

    protected $fillable = [
        'image',
        'tag',
        'bio',
        'cv',
        'type_text',
    ];

    public array $translatable = [
        'tag',
        'bio',
    ];

    protected function casts(): array
    {
        return [
            'type_text' => 'array',
        ];
    }

    public function getTypeTitles(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();
        $raw = $this->type_text[$locale] ?? null;

        if (empty($raw) && is_array($this->type_text)) {
            foreach ($this->type_text as $locVal) {
                if (!empty($locVal)) {
                    $raw = $locVal;
                    break;
                }
            }
        }

        if (empty($raw)) {
            return [];
        }

        $results = [];

        // If string, attempt JSON decode or comma split
        if (is_string($raw)) {
            $decoded = json_decode($raw, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $raw = $decoded;
            } else {
                $raw = explode(',', $raw);
            }
        }

        // If array was corrupted by comma-exploding Tagify JSON, rejoin and decode
        if (is_array($raw)) {
            $joined = implode(',', $raw);
            $decoded = json_decode($joined, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                $raw = $decoded;
            }
        }

        if (is_array($raw)) {
            foreach ($raw as $item) {
                if (is_array($item)) {
                    if (isset($item['value'])) {
                        $results[] = trim($item['value']);
                    }
                } elseif (is_string($item)) {
                    $item = trim($item);
                    if (str_starts_with($item, '{') && str_ends_with($item, '}')) {
                        $decodedItem = json_decode($item, true);
                        if (isset($decodedItem['value'])) {
                            $results[] = trim($decodedItem['value']);
                            continue;
                        }
                    }
                    // Strip any stray JSON syntax
                    $cleaned = preg_replace('/^[\[{\s]*"?value"?\s*:\s*"?/i', '', $item);
                    $cleaned = preg_replace('/"?[\s\]}]*$/i', '', $cleaned);
                    $cleaned = trim($cleaned, " \t\n\r\0\x0B\"'[]{}");
                    if (!empty($cleaned)) {
                        $results[] = $cleaned;
                    }
                }
            }
        }

        return array_values(array_filter($results));
    }
}
