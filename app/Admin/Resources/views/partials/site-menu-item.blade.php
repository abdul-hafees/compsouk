@if(isset($menu['is_category']) && $menu['is_category'])
    <li class="site-menu-category">{{ $menu['label'] }}</li>
@elseif(empty($menu['sub_menus']))
    <li class="site-menu-item {{ \App\Helpers\MenuHelper::setActive(app('request')->route(), $menu) }}" data-prefix="{{app('request')->route()->getPrefix()}}">
        <a class="animsition-link" href="{{ \App\Helpers\MenuHelper::getHref($menu) }}">
            @if(!isset($level) || $level == 0)
                <i class="site-menu-icon {{ $menu['icon'] }}" aria-hidden="true"></i>
            @endif
            <span class="site-menu-title">{{ $menu['label'] }}</span>
            {{--<span class="badge badge-info"><i class="icon wb-info-circle"></i></span>--}}
            @if(isset($menu['info']) && !empty($menu['info']))
                <span data-toggle="tooltip" data-placement="top" class="icon wb-info-circle" style="margin-left: 10px;" title="" data-original-title="{{ $menu['info'] }}"></span>
            @endif
        </a>
    </li>
@else
    <li class="site-menu-item has-sub {{ \App\Helpers\MenuHelper::setActive(app('request')->route(), $menu, 'active open') }}" data-prefix="{{app('request')->route()->getPrefix()}}">
        <a class="animsition-link" href="javascript:void(0)">
            @if(!isset($level) || $level == 0)
                <i class="site-menu-icon {{ $menu['icon'] }}" aria-hidden="true"></i>
            @endif
            <span class="site-menu-title">{{ $menu['label'] }}</span>
            @if(isset($menu['info']) && !empty($menu['info']))
                <span data-toggle="tooltip" data-placement="top" class="icon wb-info-circle" style="margin-left: 10px;" title="" data-original-title="{{ $menu['info'] }}"></span>
            @endif
            <span class="site-menu-arrow"></span>
        </a>
        <ul class="site-menu-sub">
            @foreach($menu['sub_menus'] as $menu)
                @if(\App\Helpers\MenuHelper::isVisible($menu))
                    @include('admin::partials.site-menu-item', ['level' => isset($level) ? $level+1 : 1, 'menu' => $menu])
                @endif
            @endforeach
        </ul>
    </li>
@endif