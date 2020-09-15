@extends('layouts.app')

@section('title', App\Utility::find(1)->nama_website . ' - Gallery')

@section('styles')
<link rel="stylesheet" href="/assets/css/dropzone.css">
<link rel="stylesheet" href="/assets/css/custom.css">
<link rel="stylesheet" href="/assets/css/jquery.fancybox.css">
<style>
    .hapus{
        position: absolute;
        top: 25;
        right: 25;
    }
    img.zoom {
        width: 100%;
        height: 200px;
        border-radius: 5px;
        object-fit: cover;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
    }
    img.zoom:hover {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }
    #check-all{
        -ms-transform: scale(2); /* IE */
        -moz-transform: scale(2); /* FF */
        -webkit-transform: scale(2); /* Safari and Chrome */
        -o-transform: scale(2); /* Opera */
        transform: scale(1.5);
        position: relative;
        bottom: 8px;
    }
</style>
@endsection

@section('slider-area')
@include('layouts.components.alert')
<div class="slider-area2">
    <div class="pb-100 pt-100 hero-overly">
        <div class="container">
            <div class="row justify-content-center text-white">
                <div class="col-lg-6">
                    <div class="pt-80 hero-cap hero-cap2 text-center">
                        <h2 class="text-center">GALLERY</h2>
                        <a href="#tambah-gambar" data-toggle="modal" class="btn header-btn mb-3">Tambah Gambar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="slider-area2 container pt-100 pb-100">
    <div class="hero-cap hero-cap2">
        <div class="text-right">
            <input type="checkbox" id="check-all" class="mb-2" title="centang untuk menghapus semua">
            <a href="#hapus-gambar-terpilih" id="delete-check" class="btn bg-danger mb-3">Hapus Gambar</a>
        </div>
        <div id="gallery" class="row mt-5"></div>
        <div id="loading" class="row">
            <div class="col-lg-4 col-md-6 mb-3">
                <img src="/assets/img/img-lazy-loading.gif" class="zoom img-fluid"  alt="Loading">
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <img src="/assets/img/img-lazy-loading.gif" class="zoom img-fluid"  alt="Loading">
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <img src="/assets/img/img-lazy-loading.gif" class="zoom img-fluid"  alt="Loading">
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah-gambar" tabindex="-1" aria-labelledby="tambah-gambarLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="tambah-gambarLabel">Tambah Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route("gallery.store") }}" class="dropzone dz-clickable" id="dropzoneForm" method="POST">
                    @csrf
                    <div class="dz-default dz-message"><span class="h3 mb-0 text-primary">Click or drop files here to upload - max file size is 2mb</span></div>
                </form>
                <small>Sistem hanya bisa memproses 10 file per upload</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="submit-btn" id="submit-all">Upload</button>
            </div>
        </div>
    </div>
</div>
<hr class="m-0">
@endsection

@push('scripts')
<script src="/assets/js/dropzone.js"></script>
<script src="/assets/js/jquery.fancybox.js"></script>
<script>
    let page = 1;
    let dataExists = true;

    Dropzone.options.dropzoneForm = {
        autoProcessQueue: false,
        parallelUploads: 10,
        maxFiles: 10,
        maxFilesize: 2,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        dictRemoveFile: 'Remove file',
        dictFileTooBig: 'Image is larger than 2MB',
        init: function() {
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this;

            submitButton.addEventListener("click", function(){
                myDropzone.processQueue();
            });

            // Execute when file uploads are complete
            this.on("complete", function() {
            // If all files have been uploaded
                if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                {
                    var _this = this;
                    // Remove all files
                    _this.removeAllFiles();
                    page = 1;
                    dataExists = true;
                    $("#gallery").html("");
                    load_more(page);
                    alertSuccess("Gambar berhasil ditambahkan");
                }
            });
        }
    };

    load_more(page);

    $(window).scroll(function() { //detect page scroll
        if($(window).scrollTop() + $(window).height() >= $(document).height() - $("footer").height()) { //if user scrolled from top to bottom of the page
            if (dataExists) {
                page++; //page number increment
                load_more(page); //load content
            }
        }
    });

    $(document).on("click", "#delete-check", function (event){
        event.preventDefault();
        let id = [];
        let btn = this;

        $(".gambar-check").each(function (index, e) {
            if ($(this).is(':checked')) {
                id.push(this.value);
            }
        });

        if (id.length > 0) {
            if (confirm("Apakah anda yakin ingin menghapus data ini?")) {
                $.ajax({
                    url     : "/delete-galleries",
                    method  : "delete",
                    data : {
                        _token  : "{{ csrf_token() }}",
                        id      : id
                    },
                    beforeSend : function () {
                        $(btn).html("Loading ...");
                        $(btn).attr("disabled", "disabled");
                    },
                    success : function (response) {
                        $(btn).html("Hapus Gambar");
                        $(btn).removeAttr("disabled");
                        $("input:checkbox").prop("checked", false);
                        if (response.success) {
                            page = 1;
                            dataExists = true;
                            $("#gallery").html("");
                            load_more(page);
                            alertSuccess(response.message);
                        }
                    }
                })
            }
        }
    });

    $(document).on("click", "#check-all", function(){
        if (this.checked) {
            $(".gambar-check").prop('checked',true);
        } else {
            $(".gambar-check").prop('checked',false);
        }
    });

    $(document).on('click','.hapus', function(event) {
        event.preventDefault();
        const btn = this;
        if(confirm('Apakah anda yakin ingin menghapus foto ini? ')){
            $.ajax({
                url: "/gallery/" + $(btn).data('id'),
                method: "delete",
                data: {
                    _token : "{{ csrf_token() }}"
                },
                beforeSend: function () {
                    $(btn).html("<img src='/assets/img/loading.gif' height='20px'>");
                    $(btn).attr('disabled', 'disabled');
                },
                success: function (response) {
                    if (response.success) {
                        page = 1;
                        dataExists = true;
                        $("#gallery").html("");
                        load_more(page);
                        alertSuccess(response.message);
                    }
                }
            });
        };
    });

    function load_more(page) {
        $.ajax({
            url: "/load-gallery?page="+page,
            method: "GET",
            beforeSend: function () {
                $("#loading").show();
            },
            success: function (response) {
                $("#loading").hide();

                if (response.data.length == 0) {
                    dataExists = false;
                }

                if (page == 1 && dataExists == false) {
                    showNothing();
                }

                if (response.next_page_url == null) {
                    dataExists = false;
                }

                $.each(response.data, function(index,result){
                    showImage(result);
                });
            }
        });
    }

    function alertSuccess(kalimat) {
        $(".notifikasi").html(`
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="fas fa-check-circle"></i></span>
                <span class="alert-text">
                    <strong>Berhasil</strong>
                    ${kalimat}
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `);
    }

    function showImage(result){
        $("#gallery").append(`
            <div class="col-lg-4 col-md-6 mb-3">
                <a href="${result.foto.replace('public','/storage')}" data-fancybox="images">
                    <img src="${result.foto.replace('public','/storage')}" class="zoom img-fluid" alt="${result.caption}">
                </a>
                <input type="checkbox" class="gambar-check" name="delete[]" title="centang untuk menghapus beberapa gambar" value="${result.id}" style="transform:scale(1.5);position: absolute; top: 7px; left: 20px;">
                <a href="#hapus" data-id="${result.id}" title="Hapus" class="p-2 text-white rounded bg-danger hapus" style="position: absolute; top: 0; right: 15px;"><i class="fas fa-trash"></i></a>
            </div>
        `);
    }

    function showNothing(){
        $("#gallery").append(`
            <div class="col">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h4 class="text-dark">Data belum tersedia</h4>
                    </div>
                </div>
            </div>
        `);
    }
</script>
@endpush
