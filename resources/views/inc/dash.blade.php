
<!-- Page Content -->

              @if($cultivos != 'admin')
              <!-- DASH DEL CLIENTE -->
              <h1 class="text-center mb-4">Cultivos Registrados</h1>
              <div class="container-fluid">
                  <div class="card-deck">
                @if(count($cultivos) > 0)
                  @foreach($cultivos as $cultivo)
                    <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2 mx-auto">
                      <div class="card my-3 align-items-center">
                          <div class="card-body">
                            <a href="/cultivo/{{$cultivo->id}}" title="{{$cultivo->Ubicacion}}"><img src="/img/{{$cultivo->TipoCultivo}}.png" class="img-fluid" alt="Fruto"/></a>
                            <h3 class="card-title">{{$cultivo->TipoCultivo}}</h3>
                            <h5 class="card-subtitle"></h5>
                            <hr>
                            <p class="text-center"><strong>{{$cultivo->NombreCultivo}}</strong></p>
                          </div>
                      </div>
                    </div>
                  @endforeach
                @endif

                <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2 mx-auto my-auto">
                  <div class="card my-3 align-items-center">
                    <div class="card-body">
                      <a href="" data-toggle="modal" data-target="#nCultivosModal" title="Agregar cultivo"><img src="/img/add.png" class="img-fluid" alt="Agregar Cultivo"/></a>
                    </div>
                  </div>
                </div>
              @else
                <!-- DASH DEL ADMIN -->
                <h1 class="text-center mb-4">Administración</h1>
                  <div class="card-deck">
                    <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2 mx-auto">
                      <div class="card my-3 align-items-center">
                        <hr>
                        <button class="btn" style="background-color:white;"><a href="/Usuarios" style="color:black"><i class="fas fa-users fa-10x"></i></a></button>
                        <div class="card-body">
                        <hr>
                          <h5 class="card-title">Usuarios</h5>
                          <p class="card-text">Administración de los usuarios existentes</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2 mx-auto">
                      <div class="card my-3 align-items-center">
                        <hr>
                        <button class="btn" style="background-color:white;"><a href="/Cultivos" style="color:black"><i class="fas fa-spa fa-10x"></i></a></button>
                        <div class="card-body">
                        <hr>
                          <h5 class="card-title">Cultivos</h5>
                          <p class="card-text">Administración de los cultivos existentes</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2 mx-auto">
                      <div class="card my-3 align-items-center">
                        <hr>
                        <button class="btn" style="background-color:white;"><a href="/Frutos" style="color:black"><i class="fas fa-lemon fa-10x"></i></a></button>
                        <div class="card-body">
                        <hr>
                          <h5 class="card-title">Frutos</h5>
                          <p class="card-text">Administración de los frutos existentes</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2 mx-auto">
                      <div class="card my-3 align-items-center">
                        <hr>
                        <button class="btn" style="background-color:white;"><a href="/Riegos" style="color:black"><i class="fas fa-tint fa-10x"></i></a></button>
                        <div class="card-body">
                        <hr>
                          <h5 class="card-title">Riegos</h5>
                          <p class="card-text">Administración de los tipos de riegos existentes</p>
                        </div>
                      </div>
                    </div>
                    <div class=" col-sm-4 col-md-4 col-lg-3 col-xl-2 mx-auto">
                      <div class="card my-3 align-items-center">
                        <hr>
                        <button class="btn" style="background-color:white;"><a href="/Suelos" style="color:black"><i class="fas fa-mountain fa-10x"></i></a></button>
                        <div class="card-body">
                        <hr>
                          <h5 class="card-title">Suelos</h5>
                          <p class="card-text">Administración de los tipos de suelos existentes</p>
                        </div>
                      </div>
                    </div>
                    <div class=" col-sm-4 col-md-4 col-lg-3 col-xl-2 mx-auto">
                      <div class="card my-3 align-items-center">
                        <hr>
                        <button class="btn" style="background-color:white;"><a href="/Sensores" style="color:black"><i class="fas fa-filter fa-10x"></i></a></button>
                        <div class="card-body">
                        <hr>
                          <h5 class="card-title">Sensores</h5>
                          <p class="card-text">Administración de los sensores de los cultivos</p>
                        </div>
                      </div>
                    </div>
                  </div>
              @endif



            </div>
      </div>
