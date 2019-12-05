<div class="panel-body">                  

  <!-- Obtengo la sesión actual del usuario -->
  {{ $message=Session::get('message') }} 

  <!-- Muestro el mensaje de validación -->
  @include('alerts.request')
                                  
  <section class="example mt-4">

    <form method="POST" action="{{ route('admin/jugos/store') }}" role="form" enctype="multipart/form-data">

      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      @include('admin.jugos.frm.prt')
                                                          
    </form>                                      
                                    
  </section>

</div>