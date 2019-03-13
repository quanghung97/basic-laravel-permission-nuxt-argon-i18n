<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('typeMenu') ? 'has-error' : ''}}">
    {!! Form::label('typeMenu', 'Type Menu', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        {!! Form::select('typeMenu', $typeMenus, isset($menu)?$menu->typeMenu->id:null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('typeMenu', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dishes') ? 'has-error' : ''}}">
    {!! Form::label('dishes', 'Dishes', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('dishes[]', $dishes, isset($menu)?$menu->getDishNames():null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'multiple']) !!}
        {!! $errors->first('dishes', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

