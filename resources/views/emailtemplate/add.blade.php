@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Email Template</div>

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
                    <form method="POST" action="{{ url('template/create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="template_name" class="col-md-4 col-form-label text-md-right">Template Name</label>

                            <div class="col-md-6">
                                <input id="template_name" type="text" class="form-control @error('template_name') is-invalid @enderror" name="template_name" value="{{ old('template_name') }}" required autocomplete="template_name" autofocus>

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
                                <textarea id="template_layout" class="form-control template_layout @error('template_layout') is-invalid @enderror" name="template_layout" required autocomplete="template_layout"></textarea>

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
