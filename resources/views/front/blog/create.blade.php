@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
</style>
@endpush

@section('content')
<main class="container">
    
    <div class="row g-5 mt-1">
        <div class="col-md-10 mx-auto card">

            <form method="post" action="javascript:void(0);" id="blog-form">
                @csrf()
                <div class="row mt-2">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control frm-inpt" id="title" name="title" value="{{ old('title') }}" placeholder="Title"/>
                        <span id="title_err" class="text-danger text-sm clserr" style="display:none;"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control frm-inpt" id="category" name="category" value="{{ old('category') }}" placeholder="Category"/>
                        <span id="category_err" class="text-danger text-sm clserr" style="display:none;"></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="content" class="form-label">Content</label>
                        <textarea id="content" name="content" class="form-control"></textarea>
                        <span id="category_err" class="text-danger text-sm clserr" style="display:none;"></span>
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <button class="btn btn-md btn-info" id="btn_draft">Save as Draft</button>
                        <button class="btn btn-md btn-success" id="btn_publish">Publish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/tp2modrr5fad248bpet35cvv4j3kfbu8cah1jziakgou4djc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: '#content',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
});
jQuery(document).ready(function() {

    $.ajax({
        url: '{{ route('get_cats') }}',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        data: {},
        dataType: 'JSON', // use JSONP
        success: function(response) {
            if (response && response.success == '1') {
                let availableTags = response.data;
                let tags = new Array();
                let i = 0;
                jQuery.each(response.data, function(key, val) {
                    tags[i] = val.name;
                    i++;
                });
                $( "#category" ).autocomplete({
                    source: tags
                });
            }

        }
    });

    jQuery('#btn_draft').on('click', function() {

        jQuery('.clserr').hide();
        tinyMCE.triggerSave();
        var fd = new FormData($('#blog-form')[0]);
        fd.append('type', 2);
        $.ajax({
            url: "{{ route('post_blog.create') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: fd,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'POST',
            success: function(data) {
                
                if (data.success == 1) {
                    alert('Blog saved successfully!');
                    window.location.href = '{{ route('home') }}';
                } else if (data.success == 2) {
                    jQuery.each(data.msgs, function(key, val) {
                        jQuery('#' + key + '_err').html(val[0]);
                        jQuery('#' + key + '_err').show();
                    });
                } else {
                    alert('Something went wrong! Please try again.');
                }

            }
        });

    });

    jQuery('#btn_publish').on('click', function() {

        jQuery('.clserr').hide();
        tinyMCE.triggerSave();
        var fd = new FormData($('#blog-form')[0]);
        fd.append('type', 1);
        $.ajax({
            url: "{{ route('post_blog.create') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: fd,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'POST',
            success: function(data) {
                
                if (data.success == 1) {
                    alert(data.msg);
                    window.location.href = '{{ route('home') }}';
                } else if (data.success == 2) {
                    jQuery.each(data.msgs, function(key, val) {
                        jQuery('#' + key + '_err').html(val[0]);
                        jQuery('#' + key + '_err').show();
                    });
                } else {
                    alert('Something went wrong! Please try again.');
                }

            }
        });

    });

});
</script>
@endpush