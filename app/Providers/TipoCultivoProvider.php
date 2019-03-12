<?php

  namespace App\Providers;
  use App\TipoCultivo;
  use Illuminate\Support\ServiceProvider;

  class TipoCultivoProvider extends ServiceProvider{

    public function boot(){
      view()->composer('*',function($view){
        $view->with('ArrayFrutos', TipoCultivo::all());
      });
    }

  }
