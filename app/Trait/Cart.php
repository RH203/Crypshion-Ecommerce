<?php

namespace App\Trait;

trait Cart
{
    public function delivery()
    {
        return [
            [
                'name' => 'Faster',
                'estimation' => '2 - 4 day',
                'cost' => 17000
            ],
            [
                'name' => 'Reguler',
                'estimation' => '5 - 7 day',
                'cost' => 13000
            ],
            [
                'name' => 'Economic',
                'estimation' => '7 - 10 day',
                'cost' => 8000
            ]
        ];
    }
}
