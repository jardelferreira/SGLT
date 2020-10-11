<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class ProjectObserver
{
    public $events;
    public function __construct(Dispatcher $events)
    {
        $this->events = $events;
    }
    /**
     * Handle the project "created" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function created()
    {
        $this->menuBuilder();
    }

    public function creating(Project $project)
    {
        $project->uuid = Str::uuid();
    }
    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function updated()
    {
        $this->menuBuilder();
    }

    /**
     * Handle the project "deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function deleted()
    {
        $this->menuBuilder();
    }

    /**
     * Handle the project "restored" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function restored()
    {
        //
    }

    /**
     * Handle the project "force deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }

    public function menuBuilder()
    {
        $this->events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(trans('Gerenciar Projetos'));
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
                                //dd($menu);
                                foreach ($trechos->get() as $key3 => $trecho) {
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
                                        foreach ($canteiros as $key => $canteiro) {
                                            array_push($menu['submenu'][$key + 1]['submenu'][$key2 + 1]['submenu'][$key3 + 1]['submenu'], [
                                                'text' => $canteiro->name,
                                                'url' => "dashboard/projetos/lotes/trechos/{$canteiro->id}/canteiros",
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
