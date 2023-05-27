@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')

    <section>
        <div class="container pt-5">
            <div class="row justify-content-center">
                <?php foreach([1, 2, 3, 4, 5, 6] as $item): ?>
                <div class="col-md-2">
                    <div class="card bg-danger text-white text-center">
                        <i class="bi bi-file-earmark-pdf h1"></i>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

@endsection
