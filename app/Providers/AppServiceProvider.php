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

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
           // $event->menu->add(trans('Gerenciar Projetos'));
            $menu = [
                'text' => 'Projetos',
                'url' => '#',
                'submenu' => [
                    [
                        'text' => 'Gerenciar Projetos',
                        'url' => 'dashboard/projetos'
                    ]
                ]
            ];
            if ($projects = Project::all()) {
                foreach ($projects as $key => $project) {
                    array_push($menu['submenu'], [
                        'text' => $project->name,
                        'url' => '#',
                        'submenu' => []
                    ]);
                    if ($lotes = $project->lotes()) {
                        array_push($menu['submenu'][$key + 1]['submenu'], [
                            'text' => "Gerenciar Lotes",
                            'url' => "dashboard/projetos/{$project->id}/lotes",
                        ]);
                        foreach ($lotes->get() as $key2 => $lote) {
                            //Listagem de lotes
                            array_push($menu['submenu'][$key + 1]['submenu'], [
                                'text' => $lote->name,
                                'url' => "#",
                                'submenu' => []
                            ]);
                            if ($trechos = $lote->trechos()) {
                                array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'], [
                                    'text' => "Gerenciar Trechos",
                                    'url' => "dashboard/projetos/lotes/{$lote->id}/trechos",
                                ]);
                                foreach ($trechos->get() as $key3 => $trecho) {
                                    //Listagem de Trechos
                                    array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'], [
                                        'text' => $trecho->name,
                                        'url' => "dashboard/projetos/lotes/{$lote->id}/trechos",
                                        'submenu' => []
                                    ]);
                                    if ($canteiros = $trecho->canteiros()) {
                                        array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'][$key3 + 1]['submenu'], [
                                            'text' => "Gerenciar Canteiros",
                                            'url' => "dashboard/projetos/lotes/trechos/{$trecho->id}/canteiros",
                                        ]);
                                        foreach ($canteiros->get() as $key4 => $canteiro) {
                                            //dd($canteiro->name);
                                            //dd($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'][$key3 + 1]['submenu']);
                                            array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'][$key3 + 1]['submenu'], [
                                                'text' => $canteiro->name ,
                                                'url' => "dashboard/projetos/lotes/trechos/canteiros/{$canteiro->id}",
                                                'submenu' => []
                                            ]);
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
