@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Email Template</div>

                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url('template/update/'.$email_template->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="template_name" class="col-md-4 col-form-label text-md-right">Template Name</label>

                            <div class="col-md-6">
                                <input id="template_name" type="text" class="form-control @error('template_name') is-invalid @enderror" name="template_name" value="{{ $email_template->template_name }}" required readonly="" autocomplete="template_name" autofocus>

                                @error('template_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="template_layout" class="col-md-4 col-form-label text-md-right">Template Layout</label>

                            <div class="col-md-6">
                                <textarea id="template_layout" class="form-control @error('template_layout') is-invalid @enderror" name="template_layout" required autocomplete="template_layout">{{$email_template->template_layout}}</textarea>

                                @error('template_layout')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="template_status" class="col-md-4 col-form-label text-md-right">Template Status</label>

                            <div class="col-md-6">
                                <select name="template_status" id="template_status" class="form-control @error('template_status') is-invalid @enderror">
                                    <option value="1" @php if($email_template->template_status == 1){ echo "selected"; } @endphp>Active</option>
                                    <option value="0" @php if($email_template->template_status == 0){ echo "selected"; } @endphp>Inactive</option>
                                </select>

                                @error('template_layout')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@push('js')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(function () {
        CKEDITOR.replace('template_layout',{
            extraAllowedContent: '*[id];*(*);*{*};p(*)[*]{*};div(*)[*]{*};li(*)[*]{*};ul(*)[*]{*};span(*)[*]{*};table(*)[*]{*};td(*)[*]{*}',
        });
    });
</script>
@endpush
