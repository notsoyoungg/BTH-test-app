@extends('layouts.app2')
@section('content')
    <h1>Товары</h1>
    <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modal_create_product">Добавить</button>
    <div class="card card-primary card-outline">
        <div class="card-header">
            Товары
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="" >
                        @if(!$products->isEmpty())
                            <table class="table table-striped">
                                <thead class="text-center">
                                <tr>
                                    <th>Артикул</th>
                                    <th>Название</th>
                                    <th>Статус</th>
                                    <th>Атрибуты</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($products as $product)
                                        <tr class="text-center">
                                            <th><a href="{{ route('product.show', $product->id) }}">{{ $product->article }}</a></th>
                                            <th>{{ $product->name }}</th>
                                            <th>{{ $product->status === 'available' ? 'Доступен': 'Не доступен' }}</th>
                                            @if($product->data)
                                                <th>
                                                    @foreach(json_decode($product->data) as $key => $value)
                                                        {{ $key }}: {{ $value }}<br>
                                                    @endforeach
                                                </th>
                                            @else
                                                <th>--</th>
                                            @endif
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            Товыры отсутствуют
                        @endif
                    </div>
                </div>
            </div>

            <!-- /.table-responsive -->
        </div>
    </div>
    @include('modal-create-product')
@endsection

