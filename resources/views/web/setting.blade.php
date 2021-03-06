@extends('layouts.app')

@section('title', '个性设置')

@section('tab','5')

@section('extra-css-js')
    <link rel="stylesheet" href="/css/demos.css" type="text/css"/>
    <link rel="stylesheet" href="/css/jquery.Jcrop.min.css" type="text/css"/>
    <link rel="stylesheet" href="{{ elixir('assets/css/user-center.css') }}">
    <script src="/js/jquery.Jcrop.min.js"></script>
    <script src="{{ elixir('assets/js/user-center.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10 col-sm-10">
            <div class="page-header">
                <h1>
                    基本信息
                </h1>
            </div>
            <div class="col-md-12">
                <form action="/crop" method="post" enctype="multipart/form-data" id="uploader">
                    <label for="img"><buttton class="btn btn-primary btn-lg">编辑头像<span
                                    class="glyphicon glyphicon-user"></span></buttton></label>
                    <input type="file" id="img" name="img">
                </form>
                <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#backgroundModal" disabled>编辑背景正在紧张开发中<span
                            class="glyphicon glyphicon-cog" ></span>
                </button>
            </div>
            <div class="col-md-4">
                <form class="form-horizontal" id="basic-info" action="/setting" method="post">
                    <div class="form-group">
                        <label for="inputDescription" class="col-sm-2 control-label"></label>
                        <div class="col-md-12 col-sm-10">
                            <input type="text" class="form-control" id="inputDescription" name="description"
                                   placeholder="设置个性签名">
                        </div>
                        <div class="col-md-12 col-sm-10">
                            <input type="button" id="basic-submit" class="btn btn-success form-control" value="提交">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Upload Avatar</h4>
                </div>
                <div class="modal-body">
                    <div class="row preview">
                        <img src="" id="cropbox"/>
                        <form action="/api/crop-size" method="post" enctype="multipart/form-data" id="cropForm">
                            <input type="hidden" id="x" name="x"/>
                            <input type="hidden" id="y" name="y"/>
                            <input type="hidden" id="w" name="w"/>
                            <input type="hidden" id="h" name="h"/>
                            <input type="submit" value="保存" class="btn btn-large btn-inverse btn-primary"/>
                        </form>
                    </div>
                    <div class="row">
                        <div class="alert-danger text-center" style="display: none"> 请勿上传图片格式以外的文件 !
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="backgroundModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Upload Background</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="/user/uploadBackground" method="POST" enctype="multipart/form-data"
                              id="form-background">
                            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
                                <a href="javascript:void(0);" class="thumbnail">
                                    {!! csrf_field() !!}
                                    <label for="upload-background">
                                        <img src="{{ Auth::user()->background_url }}" id="user-background">
                                    </label>
                                    <input type="file" name="background" id="upload-background" accept="image/*">
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="alert-success text-center"> 请上传高清图片以得到更好的体验 !
                        </div>
                        <div class="alert-danger text-center" style="display: none"> 请勿上传图片格式以外的文件 !
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reply-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p id="reply-info" class="text-center"></p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    {{--//---------------------------------------------------------}}




@endsection