<div class="form-group row">
    <label for="{{$name}}"  class="col-md-4 col-form-label text-md-right" >{{$label}}</label>
    <div class="col-md-6">
        <textarea @isset($readonly) readonly @endisset class="form-control" name="{{$name}}" placeholder="{{$placeholder ?? ''}}" id="{{$name}}" rows="3">

            @isset(($object->{$name})) 
            {{old($name) ? old($name) : $object->{$name} }}
        @else 
            {{old($name)}}
        @endisset
        
        </textarea>
        @error($name)
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
   
</div>