<?php

namespace App\Models;
use Illuminate\Support\Arr;

Class Job {
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Community',
                'salary' => "30k"
            ],
            [
                'id' => 2,
                'title' => 'Developer',
                'salary' => "50k"
            ],
            [
                'id' => 3,
                'title' => 'YouTuber',
                'salary' => "100k"
            ],
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn ($job) => $job['id'] == $id);

        if (! $job) {
            abort(404);
        }

        return $job;
    }
}

?>
