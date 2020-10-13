<?php

namespace App\Providers;

use App\Models\Lote;
use App\Models\Project;
use App\Observers\ProjectObserver;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        Project::observe(ProjectObserver::class);
        $this->buildMenu($events);
    }
    public function buildMenu($events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            // $event->menu->add(trans('Gerenciar Projetos'));
            $menu = [
                'text' => 'Projetos',
                'url' => '#',
                'icon' => 'fas fa-code-branch',
                'icon_color' => 'white',
                'submenu' => [
                    [
                        'text' => 'Gerenciar Projetos',
                        'icon_color' => 'cyan',
                        'url' => 'dashboard/projetos'
                    ]
                ]
            ];
            if ($projects = Project::all()) {
                foreach ($projects as $key => $project) {
                    array_push($menu['submenu'], [
                        'text' => $project->name,
                        'url' => '#',
                        'icon' => 'fas fa-code-branch',
                        'icon_color' => 'lime',
                        'submenu' => []
                    ]);
                    if ($lotes = $project->lotes()) {
                        array_push($menu['submenu'][$key + 1]['submenu'], [
                            'text' => "Gerenciar Lotes",
                            'url' => "dashboard/projetos/{$project->id}/lotes",
                            'icon_color' => 'cyan'
                        ]);
                        foreach ($lotes->get() as $key2 => $lote) {
                            //Listagem de lotes
                            array_push($menu['submenu'][$key + 1]['submenu'], [
                                'text' => $lote->name,
                                'url' => "#",
                                'icon_color' => 'cyan',
                                'submenu' => []
                            ]);
                            if ($trechos = $lote->trechos()) {
                                array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'], [
                                    'text' => "Gerenciar Trechos",
                                    'url' => "dashboard/projetos/lotes/{$lote->id}/trechos",
                                    'icon_color' => 'red',
                                ]);
                                foreach ($trechos->get() as $key3 => $trecho) {
                                    //Listagem de Trechos
                                    array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'], [
                                        'text' => $trecho->name,
                                        'url' => "dashboard/projetos/lotes/{$lote->id}/trechos",
                                        'icon_color' => 'red',
                                        'submenu' => []
                                    ]);
                                    if ($canteiros = $trecho->canteiros()) {
                                        array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'][$key3 + 1]['submenu'], [
                                            'text' => "Gerenciar Canteiros",
                                            'icon_color' => 'yellow',
                                            'url' => "dashboard/projetos/lotes/trechos/{$trecho->id}/canteiros",
                                        ]);
                                        foreach ($canteiros->get() as $key4 => $canteiro) {
                                            //dd($canteiro->name);
                                            //dd($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'][$key3 + 1]['submenu']);
                                            array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'][$key3 + 1]['submenu'], [
                                                'text' => $canteiro->name,
                                                'icon_color' => 'yellow',
                                                'url' => "dashboard/projetos/lotes/trechos/canteiros/{$canteiro->id}",
                                                'submenu' => []
                                            ]);
                                            if ($sectors = $canteiro->sectors()) {
                                                array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'][$key3 + 1]['submenu'][$key4 + 1]['submenu'], [
                                                    'text' => "Gerenciar Setores",
                                                    'icon_color' => 'red',
                                                    'url' => "dashboard/projetos/lotes/trechos/canteiros/{$canteiro->id}/setores",
                                                ]);
                                                foreach ($sectors->get() as $key5 => $sector) {
                                                    array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'][$key3 + 1]['submenu'][$key4 + 1]['submenu'], [
                                                        'text' => "{$sector->name}",
                                                        'url' => "#",
                                                        'icon_color' => 'red',
                                                        'submenu' => [
                                                            [
                                                                'text' => "Estoque {$sector->name}",
                                                                'url' => "#",
                                                                'icon_color' => 'aqua',
                                                                'submenu' => [
                                                                    [
                                                                        'text' => "Consulta",
                                                                        'icon_color' => 'aqua',
                                                                        'url'  => "#"
                                                                    ], [
                                                                        'text' => "Entrada",
                                                                        'icon_color' => 'lime',
                                                                        'url' => "#"
                                                                    ], [
                                                                        'text' => "Saída",
                                                                        'icon_color' => 'red',
                                                                        'url'  => "#"
                                                                    ]
                                                                ]
                                                            ],
                                                            [
                                                                'text' => "Gerenciar {$sector->name}",
                                                                'url' => "dashboard/projetos/lotes/trechos/canteiros/setores/{$sector->id}"
                                                            ]
                                                        ]
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $event->menu->add($menu);
        });
    }
}
