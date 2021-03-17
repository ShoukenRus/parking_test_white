@extends('templates.base')

@section('title')
    Список клиентов
@endsection

@section('content')
    <div class="container main">
        <table class="table table-striped">
            <tr>
                <th></th>
                <th>ФИО</th>
                <th>Марка</th>
                <th>Регистрационный номер РФ</th>
                <th></th>

            </tr>
            @foreach($data as $item)
                <tr>
                    <td>{{ ($data->currentPage()- 1) * $data->perPage() + $loop->index + 1 }}</td>
                    <td>{{ $item->lastname . ' ' . $item->firstname . ' ' . $item->middlename}}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->license_plate }}</td>
                    <td>
                        <a class="table_item_button" href="{{ route('client.edit', $item->client_id) }}"><img src="{{ asset('assets/images/pencil.svg') }}"></a>
                        <form action="{{ route('car.destroy', $item->car_id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="table_item_button"><img  src="{{ asset('assets/images/delete.svg') }}"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $data->links("pagination::bootstrap-4") }}
    </div>
@endsection
