@if (Session::has('message'))
<div class="container">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ Session::get('message') }}</p>
        </div>
</div>
@endif

@if ($errors->any())
<div class="container">
        {{ implode('', $errors->all('
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            :message
        </div>
        ')) }}
</div>
@endif

@if (Session::has('success'))
<div class="container">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ Session::get('success') }}</p>
        </div>
</div>
@endif

@if ( Session::get('notice') )

<div class="container">
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{{ Session::get('notice') }}}
    </div>
</div>
@endif

@if ( Session::get('error') )
<div class="container">
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{{ Session::get('error') }}}
    </div>
</div>
@endif