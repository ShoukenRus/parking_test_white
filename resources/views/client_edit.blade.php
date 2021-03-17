@extends('templates.base')

@push('scripts')
    <script src="{{ asset('assets/js/main_client_edit.js') }}"></script>
@endpush


@section('title')
    Редактирование данных о клиенте
@endsection

@section('content')
<div class="container main">
    <div class="section">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('client.update', $client->id) }}">
                        @method('PATCH')
                        @csrf
                        <!-- Client -->
                            <h3>Информация о клиенте</h3>
                            <table class="table table-borderless">
                                <tr>
                                    <td>Фамилия</td>
                                    <td>
                                        <input class="form-control" name="lastname" type="text" value="{{ $client->lastname }}">
                                        <div class="form-text">
                                            @error('lastname')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Имя</td>
                                    <td>
                                        <input class="form-control" name="firstname" type="text" value="{{ $client->firstname }}">
                                        <div class="form-text">
                                            @error('firstname')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Отчество</td>
                                    <td>
                                        <input class="form-control" name="middlename" type="text" value="{{ $client->middlename }}">
                                        <div class="form-text">
                                            @error('middlename')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Телефон</td>
                                    <td>
                                        <input class="form-control" name="phone" type="text" value="{{ $client->phone }}">
                                        <div class="form-text">
                                            @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Адрес</td>
                                    <td>
                                        <input class="form-control" name="address" type="text" value="{{ $client->address }}">
                                        <div class="form-text">
                                            @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Пол</td>
                                    <td>
                                        <div class="dropdown show">
                                            <a class="gender-dropdown-item dropdown-toggle" role="button" id="dropdownMenuLink">
                                                @if ($client->is_male)
                                                    Мужской
                                                @else
                                                    Женский
                                                @endif
                                            </a>
                                            <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" id="dropdown-item-male">Мужской</a>
                                                <a class="dropdown-item" id="dropdown-item-female">Женский</a>
                                            </div>
                                        </div>
                                        <input class="form-control" id="gender-input" name="is_male" type="hidden" value="{{ $client->is_male }}">
                                        <div class="form-text">
                                            @error('is_male')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <input type="submit" class="btn btn-primary btn-save" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <!-- Add car -->
        <h3>Автомобили клиента</h3>
        <div class="row">
            @foreach($cars as $car)
                <div class="col-6">
                    <div class="card car-item">
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Модель</td>
                                        <td>{{ $car->model }}</td>
                                    </tr>
                                    <tr>
                                        <td>Цвет</td>
                                        <td>{{ $car->color }}</td>
                                    </tr>
                                    <tr>
                                        <td>Регистрационный номер РФ</td>
                                        <td>{{ $car->license_plate }}</td>
                                    </tr>
                                    <tr>
                                        <td>Код региона</td>
                                        <td>{{ $car->code_region }}</td>
                                    </tr>
                                    <tr>
                                        <td>Статус присутствия автомобиля на стоянке</td>
                                        <td>
                                            <form method="post" action="{{ route('car.update', $car->id)  }}">
                                                @method('PATCH')
                                                @csrf
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="is_parked" @if ($car->is_parked) checked @endif >
                                                </div>
                                                <input type="hidden" name="holder_id" value="{{ $car->holder_id }}">
                                                <input type="submit" class="btn btn-primary btn-save" value="Сохранить">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="section">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('car.store') }}">
                            @csrf
                            <h3>Добавление автомобиля</h3>
                            <table class="table table-borderless">
                                <tr>
                                    <td>Марка автомобиля</td>
                                    <td>
                                        <input class="form-control input_field" name="brand" type="text">
                                        <div class="form-text">
                                            @error('brand')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Модель</td>
                                    <td>
                                        <input class="form-control input_field" name="model" type="text">
                                        <div class="form-text">
                                            @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Цвет кузова</td>
                                    <td>
                                        <input class="form-control input_field" name="color" type="text">
                                        <div class="form-text">
                                            @error('color')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Номер</td>
                                    <td>
                                        <input class="form-control input_field" name="license_plate" type="number">
                                        <div class="form-text">
                                            @error('license_plate')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Код региона</td>
                                    <td>
                                        <input class="form-control input_field" name="code_region" type="number">
                                        <div class="form-text">
                                            @error('code_region')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="holder_id" value="{{ $client->id }}">
                            <input type="submit" class="btn btn-primary btn-save" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
