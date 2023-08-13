<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="/">Вернуться в магазин!</a>
                @if(!empty($order))
                <table class="table">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Номер заказа:</th>
                        <th>Адресс заказа</th>
                        <th>Стоимость</th>
                        <th>Дата создания заказа</th>
                        <th>Статус заказа</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($order as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->billing_address }}</td>
                            <td>{{ number_format($item->amount, 2, '.', '') }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>

                                @if($item->status == 'payment')
                                    Заказ еще не оплачен!
                                @else($item->status == 'CONFIRMED')
                                    Заказ оплачен! но не отправлен!
                                @endif


                            </td>
                            <td>
                                @if($item->status == 'payment')
                            <form action="{{ route('payment.create') }}" method="post">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="user_id" value="{{$item->user_id}}">
                                <input type="hidden" name="order_id" value="{{$item->id}}">
                                <input type="hidden" name="amount" value="{{$item->amount}}">
                                <button type="submit">Оплатить заказ</button>
                            </form>
                                @endif
                            </td>
                        </tr>

                    @endforeach




                    </tbody>
                </table>
                @else
                    <a href="{{route('payment.index')}}">Ваши заказы</a>
                @endif

            </div>
        </div>

    </div>

</x-app-layout>
