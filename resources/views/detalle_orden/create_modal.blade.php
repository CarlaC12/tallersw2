<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="staticBackdropLabel">Material</h5>

                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form method="post" action="{{route('detalle.orden.store',[$ordenTrabajo])}}" class="form-floating">
                @csrf
                
                <div class="modal-body">
                    
                    

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="cantidad" value="{{old('cantidad')}}">
                        <label for="floatingInput">Cantidad</label>

                        @error('cantidad')
                       <li class="text-danger">{{$message}}</li>
                        @enderror
                        
                        @error('message')
                        <li class="text-danger">{{$message}}</li>
                        @enderror

                    </div>

                    <select name="material_id" id="material">
                        <option value="" disabled selected>Seleccione un Material</option>
                        @foreach($materiales as $material)
                        <option value="{{$material->id}}">{{ $material->nombre}}</option>

                        @endforeach    
                    </select>

                    @error('material_id')
                        <li class="text-danger">{{$message}}</li>
                    @enderror

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary" id="store">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>