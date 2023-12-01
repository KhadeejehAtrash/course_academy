@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Courses_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.Courses') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


@if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
@endif



<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('Courses_trans.add_Course') }}
            </button> --}}
            <br><br>

            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('Courses_trans.Name') }}</th>
                            <th>{{ trans('Courses_trans.Notes') }}</th>
                            {{-- <th>{{ trans('Courses_trans.Processes') }}</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach ($Courses as $Course)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td>{{ $Course->Name }}</td>
                                <td>{{ $Course->Notes }}</td>
                                {{-- <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $Course->id }}"
                                        title="{{ trans('Courses_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $Course->id }}"
                                        title="{{ trans('Courses_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></button>
                                </td> --}}
                            </tr>

                            {{-- <!-- edit_modal_Course -->
                            <div class="modal fade" id="edit{{ $Course->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Courses_trans.edit_Course') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('Courses.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                            class="mr-sm-2">{{ trans('Courses_trans.stage_name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="Name"
                                                            class="form-control"
                                                            value="{{ $Course->getTranslation('Name', 'ar') }}"
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $Course->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                            class="mr-sm-2">{{ trans('Courses_trans.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ $Course->getTranslation('Name', 'en') }}"
                                                            name="Name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('Courses_trans.Notes') }}
                                                        :</label>
                                                    <textarea class="form-control" name="Notes"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3">{{ $Course->Notes }}</textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Courses_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('Courses_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Course -->
                            <div class="modal fade" id="delete{{ $Course->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('Courses_trans.delete_Course') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Courses.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('Courses_trans.Warning_Course') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $Course->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Courses_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('Courses_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}


                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


{{-- <!-- add_modal_Course -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Courses_trans.add_Course') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('Courses.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Courses_trans.stage_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="Name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('Courses_trans.stage_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('Courses_trans.Notes') }}
                            :</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('Courses_trans.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('Courses_trans.submit') }}</button>
            </div>
            </form>

        </div>
    </div>
</div>

</div> --}}

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
