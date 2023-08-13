@extends('layouts.layouts')
@section('content')
    @include('layouts.header')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">

                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Поподнить баланс</h2>
                        <br>
                        <form action="{{ route('payment.create') }}">
                            @csrf
                            <label for="">Сумма платежа</label>
                            <input type="number" name="amount">
                            <button type="submit" >Suceess</button>
                        </form>
                        <br>
                        <h2>Список транзакций</h2>

                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')


@endsection
