@extends('templates.base')

@push('scripts')
    <script src="{{ asset('assets/js/main_client_edit.js') }}"></script>
@endpush

@section('title')
    Добавление клиента
@endsection

@section('content')
    <div class="container main">
        <div class="row">
            <div class="col-6">
                <div class="card car-item">
                    <div class="card-body">
                        <form action="{{ route('client.store') }}" method="post">
                            @csrf
                            <!-- Client -->
                            <h3>Добавление клиента</h3>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Фамилия</th>
                                        <td>
                                            <input class="form-control input_field" name="lastname" type="text" >
                                            <div class="form-text">
                                                @error('lastname')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Имя</th>
                                        <td>
                                            <input class="form-control input_field" name="firstname" type="text" >
                                            <div class="form-text">
                                                @error('firstname')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Отчество</th>
                                        <td>
                                            <input class="form-control input_field" name="middlename" type="text">
                                            <div class="form-text">
                                                @error('middlename')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Пол</th>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="gender-dropdown-item dropdown-toggle" role="button" id="dropdownMenuLink">Выберите пол</a>
                                                <div class="dropdown-menu" id="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" id="dropdown-item-male">Мужской</a>
                                                    <a class="dropdown-item" id="dropdown-item-female">Женский</a>
                                                </div>
                                                <input class="form-control" id="gender-input" name="is_male" type="hidden" value="">
                                                <div class="form-text">
                                                    @error('is_male')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Телефон</th>
                                        <td><input class="form-control input_field" name="phone" type="number">
                                            <div class="form-text">
                                                @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Адрес</th>
                                        <td><input class="form-control input_field" name="address" type="text" value="" placeholder="">
                                            <div class="form-text">
                                                @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="submit" class="btn btn-primary btn-save" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
