<?php

  namespace App\Providers;
  use App\TipoRiego; // write model name here
  use Illuminate\Support\ServiceProvider;

  class TipoRiegoProvider extends ServiceProvider{

    public function boot(){
      view()->composer('*',function($view){
        $view->with('ArrayRiegos', TipoRiego::all());
      });
    }

  }
