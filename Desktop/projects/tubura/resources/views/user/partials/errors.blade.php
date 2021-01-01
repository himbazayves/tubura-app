<div style="border-left:5px solid red" class="alert alert-light">
    <p>You have following errors in your form</p>
    <ol>
        @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
        @endforeach
    </ol>
</div>