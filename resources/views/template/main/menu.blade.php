<?php
Menu::make('menu', function($menu)
{
	$menu->raw('NAWIGACJA', ['class' => 'header', 'style' => 'text-align: center;']);
    $menu->add('<i class="fa fa-home"></i> <span>Strona główna</span>', ['route' => 'main.index.get']);
    $menu->add('<i class="fa fa-home"></i> <span>Konspekty</span>', ['route' => 'konspekty.index.get'])->active('konspekty/*');
	$menu->add('<i class="fa fa-home"></i> <span>Zabawy</span>', ['route' => 'zabawy.index.get'])->active('zabawy/*');


	if(Auth::guest())
	{
		$menu->raw('LOGOWANIE', ['class' => 'header', 'style' => 'text-align: center;']);
		$menu->add('<i class="fa fa-user"></i> <span>Zaloguj się</span>', ['route' => 'main.login.get']);
	}
});
?>
{!! Menu::get('menu')->asUl(['class' => 'sidebar-menu']) !!}