@extends('layout.app')
@section('pageTitle',trans('Add Photo to Album'))
@section('pageSubTitle',trans('Add Photo'))
@push("styles")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
<style>
    .dz-image img {
    width: 100%;
    height: 100%;
}
.dropzone.dz-started .dz-message {
	display: block !important;
}
.dropzone {
	border: 2px dashed #028AF4 !important;;
}
.dropzone .dz-preview.dz-complete .dz-success-mark {
    opacity: 1;
}
.dropzone .dz-preview.dz-error .dz-success-mark {
    opacity: 0;
}
.dropzone .dz-preview .dz-error-message{
	top: 144px;
}
</style>
@endpush
@section('content')
  <section id="multiple-column-form">
      <div class="row match-height">
          <div class="col-12">
              <div class="card">
                  <div class="card-content">
                      <div class="card-body">
                        <a href="{{route(currentUser().'.pGalleryCat.index')}}" class="float-end btn btn-danger btn-sm">Back to Album</a>
                        <label for="image"><b>{{__('Gallery Photo')}}</b></label>
                        <form action="{{route(currentUser().'.pGallery.store')}}" method="post" enctype="multipart/form-data" id="image-upload" class="mt-3 dropzone">
                            @csrf
                            <input type="hidden" class="form-control" name="album" value="{{$pGalleryCat}}" id="album" required>
                            <div>
                                
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<script>
    
var myDropZone = new Dropzone("#image-upload", {
	    maxFiles: 55, 
        maxFilesize: 256,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        init:function() {
            // Get images
            var myDropzone = this;

            $.ajax({
                url: "{{route(currentUser().'.pGallery.index')}}",
                type: 'GET',
                dataType: 'json',
                data: {gid: {{$pGalleryCat}}},
                success: function(data){
                    console.log(data);
                    $.each(data, function (key, value) {
                        var file = {name: value.name, size: value.size};
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, value.path);
                        myDropzone.emit("complete", file);
                    });
                }
            });
        },
        removedfile: function(file) 
        {
            if (this.options.dictRemoveFile) {
                
                return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
                if(file.previewElement.id != ""){
                    var name = file.previewElement.id;
                }else{
                    var name = file.name;
                }
                //console.log(name);
                $.ajax({
                    type: 'get',
                    url: "{{route(currentUser().'.image.delete')}}",
                    data: {filename: name},
                    success: function (data){
                        //toastr.success(data.success +" File has been successfully removed!");
                        toastr.success("File has been successfully removed!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
                });
            }		
        },
    
        success: function(file, response) 
        {
            file.previewElement.id = response.success;
            //console.log(file); 
            // set new images names in dropzone’s preview box.
            var olddatadzname = file.previewElement.querySelector("[data-dz-name]");   
            file.previewElement.querySelector("img").alt = response.success;
            olddatadzname.innerHTML = response.success;
        },
        error: function(file, response)
        {
            if($.type(response) === "string")
                var message = response; //dropzone sends it's own error messages in string
            else
                var message = response.message;
            file.previewElement.classList.add("dz-error");
            _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
            _results = [];
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i];
                _results.push(node.textContent = message);
            }
            return _results;
        }
            
    });
 
    FileReaderJS.setupClipboard(document.body, {
        accept: {
            'image/*': 'DataURL'
        },
        on: {
            load: function (e, cfile) {           
                $(Dropzone).addfile(cfile);
            }
        }
    });

    // Initialize Dropzone
    // Dropzone.options.dropzone = {
    //     url: "{{ route(currentUser().'.pGallery.store') }}",
    //     paramName: "feature_image", // Name of the input field
    //     maxFilesize: 2, // Maximum file size in MB
    //     acceptedFiles: ".jpg,.jpeg,.png", // Accepted file types
    //     addRemoveLinks: true, // Show remove links
    //     dictDefaultMessage: "Drag and drop an image here or click to upload",
    //     success: function (file, response) {
    //         // Handle successful upload here
    //     },
    //     error: function (file, errorMessage) {
    //         // Handle error here
    //     },
    //     sending: function(file, xhr, formData) {
    //         console.log('Sending file:', file);
    //     },
    // };
    </script>
@endpush