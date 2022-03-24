@extends('layouts.base')
@push('head')
    
<!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
 
<!-- the fileinput plugin styling CSS file -->
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
 
@endpush
@section('content')
<x-alert-message />
<div class="section__content section__content--p30">
    <div class="container-fluid">
        {{-- Data --}}
        <div class="row">
            <div class="col-lg-12 col-md-12 p-4">
                 <!-- This file input will automatically converted into "Bootstrap File Input" -->
                <!-- Iconic preview for thumbs and detailed preview for zoom -->
                <div class="file-loading">
                    {{-- <input id="input-ficons-5" name="" multiple type="file"> --}}
                    <input type="file" id="input-ficons-5" name="audios[]" accept="audio/*" multiple>
                </div>

                <div class="p-4 flex text-center">
                    <button id="btnupload" type="submit" class="btn btn-success">Upload</button>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Playback</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($audios as $audio)
                                <tr>
                                    <td>{{$audio->title}}</td>
                                    <td>{{$audio->description??'--'}}</td>
                                    <td class="process">{{$audio->status}}</td>
                                    <td></td>
                                    <td>
                                        <div class="table-data-feature">
                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button> --}}
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <button class="item del" data-toggle="tooltip" data-placement="top" title="Delete" data-audioid="{{$audio->id}}">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">NO DATA</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
    </div>
</div>

<x-modal id="addteacher" :isForm="true" >
    <x-slot name="header">
        <h3>Add teacher</h3>
    </x-slot>
    <div class="card-body card-block">
        @csrf
        <x-form.input name="first_name" label="First Name"  />
        <x-form.input name="middle_name" label="Middle Name"  />
        <x-form.input name="last_name" label="Last Name"  />
        <x-form.input name="username" label="Username"  />
        <x-form.input name="email" label="Email" type="email"  />
        <x-form.input name="password" label="Password" type="password"  />
        <x-form.input name="password_confirmation" label="Confirm Password" type="password"  />
    </div>
    <x-slot name="buttons">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" id="btnaddteacher" class="btn btn-primary">Add</button>
    </x-slot>
</x-modal>
@endsection

@push('scripts')

<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js" type="text/javascript"></script>
 
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
        This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js" type="text/javascript"></script>
    
    <!-- the main fileinput plugin script JS file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
 
     
<script>

$("#input-ficons-5").fileinput({
    uploadUrl: "{{route('teacher.audio.store')}}",
    // uploadAsync:false,
    showUpload: false,
    uploadExtraData: {
            '_token': '{{csrf_token()}}', // for access control / security 
        },
    allowedFileTypes: ['audio'],
    deleteUrl:'',
    previewFileIcon: '<i class="fa fa-file"></i>',
    preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
    previewFileIconSettings: {
      // configure your icon file extensions
      mov: '<i class="far fa-file-video text-warning"></i>',
      mp3: '<i class="far fa-file-audio text-warning"></i>',
      img: '<i class="far fa-file-image text-danger"></i>',
      model: '<i class="fas fa-draw-polygon"></i>',
    },
    previewFileExtSettings: {
      // configure the logic for determining icon file extensions
      mov: function(ext) {
        return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
      },
      mp3: function(ext) {
        return ext.match(/(mp3|wav)$/i);
      },
      img: function(ext) {
        return ext.match(/(jpg|gif|png|svg)$/i)
      },
      model: function(ext) {
        return ext.match(/(obj|fbx)$/i)
      }
    }
  });
  $('#btnupload').click((e)=>{
    $('#input-ficons-5').fileinput('upload');
  })
//   $('#input-ficons-5').on('filebatchpreupload', function(event, data) {
//     var form = data.form, files = data.files, extra = data.extra,
//         response = data.response, reader = data.reader;
//     console.log('File batch pre upload');
// });
$('#input-id').on('filebatchuploadcomplete', function(event, preview, config, tags, extraData) {
    console.log('File batch upload complete', preview, config, tags, extraData);
    location.reload();
});

$('.del').click(function(e){
    let id=$(this).data('audioid')
    let url='{{route('teacher.audio.destroy',':id')}}';
    url=url.replace(':id',id)
    swal({
    title: "Are you sure to delete?",
    // text: "Once deleted, you will not be able to recover this imaginary file!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        $.ajax({
            url:url,
            type:'delete',
            data:{_token:'{{csrf_token()}}'},
            success:(res)=>{
                swal(res.message, {
                    icon: "success",
                });
                location.reload()
            },
            error:(err)=>{
                swal({
                    title: "Teacher Deleting Failed",
                    text: err.responseJSON.message,
                    icon: "error",
                });
            }
        })
    }
    });
})
</script>    
  
@endpush