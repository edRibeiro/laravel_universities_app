<?php

namespace App\View\Support;


class TextAlignment
{
    private string $align;

    public function __construct(string $align = 'left')
    {
        $this->align = $align;
    }

    public function className(): string
    {
        return [
            'left' => 'text-left',
            'right' => 'text-rigtht',
            'center' => 'text-center',
        ][$this->align] ?? 'text-left';
    }
}
