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
                        'icon_color' => 'lime',
                        'url' => 'dashboard/projetos'
                    ]
                ],
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
                        array_push($menu['submenu'][$key + 1]['submenu'], [
                            'text' => "Gerenciar torres",
                            'url' => "dashboard/projetos/{$project->id}/torres",
                            'icon_color' => 'cyan'
                        ]);
                        array_push($menu['submenu'][$key + 1]['submenu'], [
                            'text' => "Estoque {$project->name}",
                            'icon' => "fas fa-boxes",
                            'url' => "dashboard/projetos/{$project->id}/estoque",
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
                                // dd($trechos->get());
                                array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 3]['submenu'], [
                                    'text' => "Gerenciar Trechos",
                                    'url' => "dashboard/projetos/lotes/{$lote->id}/trechos",
                                    'icon_color' => 'red',
                                ]);
                                array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 3]['submenu'], [
                                    'text' => "Estoque {$lote->name}",
                                    'icon' => "fas fa-boxes",
                                    'url' => "dashboard/projetos/lotes/{$lote->id}/estoque",
                                    'icon_color' => 'red'
                                ]);
                                foreach ($trechos->get() as $key3 => $trecho) {
                                    //Listagem de Trechos
                                    array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 3]['submenu'], [
                                        'text' => $trecho->name,
                                        'url' => "dashboard/projetos/lotes/{$lote->id}/trechos",
                                        'icon_color' => 'red',
                                        'submenu' => []
                                    ]);
                                    if ($canteiros = $trecho->canteiros()) {
                                        array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 3]['submenu'][$key3 + 2]['submenu'], [
                                            'text' => "Gerenciar Canteiros",
                                            'icon_color' => 'yellow',
                                            'url' => "dashboard/projetos/lotes/trechos/{$trecho->id}/canteiros",
                                        ]);
                                        array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 3]['submenu'][$key3 + 2]['submenu'], [
                                            'text' => "Estoque {$trecho->name}",
                                            'icon' => "fas fa-boxes",
                                            'url' => "dashboard/projetos/lotes/trechos/{$trecho->id}/estoque",
                                            'icon_color' => 'yellow'
                                        ]);
                                        foreach ($canteiros->get() as $key4 => $canteiro) {
                                            //dd($canteiro->name);
                                            //dd($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'][$key3 + 1]['submenu']);
                                            array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 3]['submenu'][$key3 + 2]['submenu'], [
                                                'text' => $canteiro->name,
                                                'icon_color' => 'yellow',
                                                'url' => "dashboard/projetos/lotes/trechos/canteiros/{$canteiro->id}",
                                                'submenu' => []
                                            ]);
                                            if ($sectors = $canteiro->sectors()) {
                                                array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 3]['submenu'][$key3 + 2]['submenu'][$key4 + 2]['submenu'], [
                                                    'text' => "Gerenciar Setores",
                                                    'icon_color' => 'green',
                                                    'url' => "dashboard/projetos/lotes/trechos/canteiros/{$canteiro->id}/setores",
                                                ]);
                                                array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 3]['submenu'][$key3 + 2]['submenu'][$key4 + 2]['submenu'], [
                                                    'text' => "Estoque {$canteiro->name}",
                                                    'icon' => "fas fa-boxes",
                                                    'url' => "dashboard/projetos/lotes/trechos/canteiros/{$canteiro->id}/estoque",
                                                    'icon_color' => 'green'
                                                ]);
                                                foreach ($sectors->get() as $key5 => $sector) {
                                                    array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 3]['submenu'][$key3 + 2]['submenu'][$key4 + 2]['submenu'], [
                                                        'text' => "{$sector->name}",
                                                        'url' => "#",
                                                        'icon_color' => 'green',
                                                        'submenu' => [
                                                            [
                                                                'text' => "Estoque {$sector->name}",
                                                                'url' => "dashboard/projetos/lotes/trechos/canteiros/setor/{$sector->id}/estoque",
                                                                'icon_color' => 'aqua',
                                                                'icon' => "fas fa-boxes",
                                                                ],
                                                            [
                                                                'text' => "Gerenciar {$sector->name}",
                                                                'url' => "dashboard/projetos/lotes/trechos/canteiros/setor/{$sector->id}/painel"
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
            $event->menu->add([
                'text'       => 'Rodapé',
                'classes' => 'bg-light',
                'url'        => '#',

            ]);
        });
    }
}
