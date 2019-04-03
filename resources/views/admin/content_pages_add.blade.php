<div class="wrapper container-fluid">
    {!! Form::open(['url'=>route('PagesAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
<div class="form-group">
    {!! Form::label('name', 'Title', ['class'=>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'fill name of page']) !!}
    </div>
</div>
    <div class="form-group">
        {!! Form::label('alias', 'Title', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', old('alias'), ['class'=>'form-control', 'placeholder'=>'fill name of page']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('text', 'Text:', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', old('text'), ['id'=>'editor', 'class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Image:', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', old('alias'), ['class'=>'filestyle', 'data-buttonText'=>'choose image', 'data-buttonName'=>'btn-primary', 'placeholder'=>'no file']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Save', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
</div>
