@extends('Layouts.Backex.app')

@section('title','Post-Create')

@push('css')
    <style>
        div.mce-fullscreen {
            position: fixed;
            top: 10%;
            left: 10%;
            width: 80%;
            height: auto;
            z-index: 10000;
        }
        #holder img{
            height: 15rem !important;
        }
    </style>
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10" style="float: none;margin: 0 auto;">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Create A New Post</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12" style="float: none; margin: 0 auto;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" id="title" class="form-control" name="title">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Category</label>
                                        <select type="text" class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="bmd-label-floating">Post</label>
                                            <textarea class="my-editor" id="BlogDetails" name="blog_details"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Featured Image</label>
                                        </div>
                                        <div class="fileinput fileinput-new text-center" >
                                            <div id="avatar" class="fileinput-new thumbnail img-raised">
                                                <img src="http://style.anu.edu.au/_anu/4/images/placeholders/person_8x10.png" rel="nofollow" alt="...">
                                            </div>
                                        </div>
                                        <div class="fileinput fileinput-new text-center" >
                                            <div class="fileinput-new thumbnail img-raised">
                                                <div id="holder"></div>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                                  <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input hidden id="thumbnail" class="form-control" type="text" name="fImage">
                                            <input hidden id="thumbnail" class="form-control" type="text" name="author" value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="publish" name="publish">
                                                Publish The Post
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4" style="float: none; margin: 0 auto;">
                                        <input type="submit" class="btn btn-primary btn-round" value="Save">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script>
        var route_prefix = "/filemanager";
    </script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media fullscreen",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
    <script>
        var lfm = function(id, type, options) {
            let button = document.getElementById(id);
            button.addEventListener('click', function () {
                var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                var target_input = document.getElementById(button.getAttribute('data-input'));
                var target_preview = document.getElementById(button.getAttribute('data-preview'));
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = function (items) {
                    var file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');
                    // set the value of the desired input to image url
                    target_input.value = file_path;
                    target_input.dispatchEvent(new Event('change'));
                    // clear previous preview
                    target_preview.innerHtml = '';
                    // set or change the preview image src
                    items.forEach(function (item) {
                        let img = document.createElement('img')
                        img.setAttribute('style', 'height: 5rem')
                        img.setAttribute('src', item.thumb_url)
                        target_preview.appendChild(img);
                    });
                    // trigger change event
                    target_preview.dispatchEvent(new Event('change'));
                };
            });
        };
        lfm('lfm2', 'file', {prefix: route_prefix});
    </script>
    <script>
        $(document).ready(function(){
            $('#thumbnail').change(function(e){
                $('#avatar').hide();
            });
        });
    </script>
@endpush
