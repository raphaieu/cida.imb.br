@if (session('success'))
    <br/>
    <div class="alert alert-success alert-close mb-5">
        <button class="alert-btn-close">
            <i class="fad fa-times"></i>
        </button>
        <span>{{ session('success') }}</span>
    </div>
@endif
@if (session('error'))
    <br/>
    <div class="alert alert-error alert-close">
        <button class="alert-btn-close">
            <i class="fad fa-times"></i>
        </button>
        <span>{{ session('error') }}</span>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-error alert-close">
        <button class="alert-btn-close">
            <i class="fad fa-times"></i>
        </button>
        <ul class="list-disc pl-5 flex-auto">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br/>
@endif
