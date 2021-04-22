<?php

namespace App\Web\MenuFilters;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Illuminate\Contracts\Translation\Translator;

class LangFilter implements FilterInterface
{
    protected $langGenerator;

    public function __construct(Translator $langGenerator)
    {
        $this->langGenerator = $langGenerator;
    }

    public function transform($item)
    {
        if (isset($item['header'])) {
            $item['header'] = $this->langGenerator->get($item['header']);
        }
        if (isset($item['text'])) {
            $item['text'] = $this->langGenerator->get($item['text']);
        }
        return $item;
    }
}
