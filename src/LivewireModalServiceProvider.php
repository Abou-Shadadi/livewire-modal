<?php

namespace devsrv\LivewireModal;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use devsrv\LivewireModal\Livewire\Modal as WireModal;
use devsrv\LivewireModal\Components\{
    Base,
    ModalBase,
    Trigger,
};
use devsrv\LivewireModal\Components\UI\{
    Modal,
    Alertify
};

class LivewireModalServiceProvider extends ServiceProvider
{

    public function boot()
    {
        Livewire::component('base-wire-modal', WireModal::class);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewiremodal');

        $this->loadViewComponentsAs('livewiremodal', [
            Base::class,
            Alertify::class,
            Modal::class,
            Trigger::class,
            ModalBase::class,
        ]);

        $this->publishes([
            __DIR__.'/../public/dist' => public_path('vendor/livewiremodal'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../config/livewiremodal.php' => config_path('livewiremodal.php'),
        ], 'config');

        collect(['info', 'warning', 'success', 'danger'])->each(fn($type) =>
            \Livewire\Component::macro($type, fn ($msg) =>
                session()->flash('alertify', ['type' => $type, 'message' => $msg])
            )
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
