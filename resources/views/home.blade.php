@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4>{{ __('Bem-vindo!') }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-center">{{ __('Gerencie seus produtos de forma simples e eficiente.') }}</p>

                    <div class="text-center mt-4">
                        <a href="{{ route('produtos.index') }}" class="btn btn-primary">
                            {{ __('Ver Produtos') }}
                        </a>
                        <a href="{{ route('produtos.create') }}" class="btn btn-success">
                            {{ __('Criar Novo Produto') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
