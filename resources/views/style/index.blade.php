@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mt-2">Style</h5>

                        <div>

                            <a href="{{route('styles.create')}}"
                               class="btn btn-outline-primary">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                MCQ</a>

                            <a href="{{url()->previous()}}"
                               class="btn btn-outline-secondary">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                Back</a>

                        </div>

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Style Basis</th>
                                <th scope="col">Create By</th>
                                <th scope="col">Option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($styles as $style)
                                <tr>
                                    <th scope="row">{{$style->id}}</th>
                                    <td>{{$style->style_code}}</td>
                                    <td>{{$style->user->name}}</td>
                                    <td>
                                        <a class="btn btn-outline-primary" href="{{route('styles.show-content',$style->id)}}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <form style="display:inline;padding: 0;" action="{{route('styles.destroy', $style->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-secondary"
                                                    onclick="return confirm('Delete Style ID#{{$style->id}}  ?')" >
                                                <i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h4 class="text-danger">No Record</h4>
                            @endforelse

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
