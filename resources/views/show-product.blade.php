@extends('layouts.app2')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        Товар
                    </div>
                    <div class="col text-right">
                        <a href="#" class="edit-product btn btn-primary" data-url="{{ route('product.edit', $product->id) }}" title="" data-toggle="tooltip" data-original-title="{{ __('main.Edit') }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li><b>Артикул:</b> {{ $product->article }}</li>
                    <li><b>Название:</b> {{ $product->name }}</li>
                    <li><b>Статус:</b> {{ $product->status === 'available' ? 'Доступен': 'Не доступен' }}</li>
                    <li><b>Атрибуты:</b>
                        <ul>
                            @if($product->data)
                                @foreach(json_decode($product->data) as $key => $value)
                                    <li>{{ $key }}: {{ $value }}</li>
                                @endforeach
                            @else
                                отсутствуют
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
