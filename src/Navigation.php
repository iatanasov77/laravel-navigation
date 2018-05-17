<?php namespace IA\Laravel\Modules\Navigation;

use Lavary\Menu\Facade      as LavaryMenu;
use Lavary\Menu\Item        as LavaryItem;
use Illuminate\Support\Facades\Cache;
use IA\Laravel\Modules\Navigation\Entities\Menu;

class Navigation
{
    private $builder;

    public function build( Menu $menu )
    {
        $items      = \json_decode( $menu->items, true );

        $navigation = LavaryMenu::make( $menu->slug, function( $builder ) use ( $items )
        {
            $this->builder  = $builder;

            if ( ! empty( $items ) )
            {
                $this->addItems( $items );
            }
        });

        Cache::forever( 'navigation.' . $menu->slug, $menu );

        return $navigation;
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    protected function addItems( array $items, LavaryItem $parent = null )
    {
        $parent = $parent ?:  $this->builder;

        foreach ( $items as $item )
        {
            $options    = [
                'id'    => $item['title'],
                'title' => $item['text'],
                'url'   => $item['href']
            ];

            $subItem    = $parent   ->add( $item['text'], $item['href'] )
                                    ->data( 'target', $item['target'] )
                                    ->data( 'icon', $item['icon'] );

            if ( ! empty( $item['permissions'] ) )
            {
                $subItem->data( 'permissions', $item['permissions'] );
            }

            $subItem->active( $item['href'] );

            if ( ! empty( $item['children'] ) )
            {
                $this->addItems( $item['children'], $subItem );
            }

        }
    }
}
