<?php

  namespace App\Providers;
  use App\TipoSuelo; // write model name here
  use Illuminate\Support\ServiceProvider;

  class TipoSueloProvider extends ServiceProvider{

    public function boot(){
      view()->composer('*',function($view){
        $view->with('ArraySuelos', TipoSuelo::all());
      });
    }

  }
