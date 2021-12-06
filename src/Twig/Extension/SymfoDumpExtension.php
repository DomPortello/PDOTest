<?php

namespace App\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SymfoDumpExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('dump', [$this, 'symfoDump']),
        ];
    }

    public function symfoDump(mixed $var)
    {
        dump($var);
    }
}