<ul class="site-menu" data-plugin="menu">
  @php $menus = \App\Admin\MenuProvider::getMenu() @endphp
  @foreach($menus as $menu)
    @if(\App\Helpers\MenuHelper::isVisible($menu))
      @include('admin::partials.site-menu-item', ['level' => 0, 'menu' => $menu])
    @endif
  @endforeach
</ul>