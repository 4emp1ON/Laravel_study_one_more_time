@extends('layouts/template')

@section('title')
    Форма запроса (HW4)
@endsection

@section('content')
    @if (session()->has('msg'))
        <div class="alert alert-success" role="alert">
            {{ session('msg') }}
        </div>
    @endif
    <form method="POST" action="{{ route('order.store') }}">
        @csrf
        <fieldset class="mt-3">
            <legend>Форма запроса</legend>
            <div class="form-group row">
                <label for="Name" class="col-sm-2 col-form-label mb-3">Имя заказчика</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <label for="phone" class="col-sm-2 col-form-label mb-3">Номер телефона</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                </div>
                <label for="email" class="col-sm-2 col-form-label mb-3">E-mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <label for="items" class="col-sm-2 col-form-label mb-3">Что вы хотите купить</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="items" name="items" value="{{ old('items') }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Отправить</button>
        </fieldset>
    </form>
@endsection

@section('script')
    <script src="https://unpkg.com/imask"></script>
    <script>
        const maskedElement = document.querySelector('#phone');
        const maskOptions = {
            mask: '+{7}(000)000-00-00'
        };
        const mask = IMask(maskedElement, maskOptions);

        setInterval(hideAlert, 2000);


        function hideAlert() {
            const el = document.querySelector('.alert');
            el.remove();
        }
    </script>
@endsection
