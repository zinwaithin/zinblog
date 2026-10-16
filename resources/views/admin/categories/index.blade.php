@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    <div class="my-4">

        <h1 class="d-inline">
            Categories
        </h1>

        <a href="{{ route('admin.categories.create') }}"
           class="btn btn-primary float-end">

            <i class="fas fa-plus me-1"></i>
            Create Category

        </a>

    </div>


    <ol class="breadcrumb mb-4">

        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">
                Dashboard
            </a>
        </li>

        <li class="breadcrumb-item active">
            Categories
        </li>

    </ol>


    <div class="card mb-4">

        <div class="card-header">

            <i class="fas fa-list me-1"></i>
            Categories List

        </div>


        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                </thead>


                <tbody>

                    @foreach($categories as $category)

                    <tr>

                        <td>
                            {{ $category->id }}
                        </td>

                        <td>
                            {{ $category->name }}
                        </td>

                        <td>

                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                               class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>
                                Edit

                            </a>


                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure to delete?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    <i class="fas fa-trash"></i>
                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>


            {{ $categories->links() }}

        </div>

    </div>

</div>

@endsection