<!-- Modal -->
<div class="modal fade" id="modal{{$detalle->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">Material</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" action="{{route('detalle.orden.update',[$ordenTrabajo,$detalle])}}"
             class="form-floating">
                @csrf
                @method('put')
                <div class="modal-body">


                    <p class="fs-6">{{$detalle->materiales->nombre}}</p>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="cantidad_edit"
                            value="{{$detalle->cantidad}}">
                        <label for="floatingInput">Cantidad</label>

                        @error('cantidad_edit')
                        <li class="text-danger">{{$message}}</li>
                        @enderror
                        
                        @error('messages')
                        <li class="text-danger">{{$message}}</li>
                        @enderror

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary" id="update">Registrar</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>