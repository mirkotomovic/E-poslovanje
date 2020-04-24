@extends('layouts.base')

@section('container')

<div class="mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="img">
                        <img src="{{ asset('img/placeholder.jpg') }}" alt="" srcset=""
                            class="img-thumbnail mx-auto d-block">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $user->name }}
                            </h4>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center py-2">
                                    Email
                                    <span class="">{{ $user->email }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center mt-3 mb-2">
                    <h2>Lista tranzakcija</h2>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Column heading</th>
                            <th scope="col">Column heading</th>
                            <th scope="col">Column heading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-primary">
                            <th scope="row">Primary</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="table-secondary">
                            <th scope="row">Secondary</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="table-primary">
                            <th scope="row">Primary</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="table-secondary">
                            <th scope="row">Secondary</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="table-primary">
                            <th scope="row">Primary</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="table-secondary">
                            <th scope="row">Secondary</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="table-primary">
                            <th scope="row">Primary</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                        <tr class="table-secondary">
                            <th scope="row">Secondary</th>
                            <td>Column content</td>
                            <td>Column content</td>
                            <td>Column content</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
