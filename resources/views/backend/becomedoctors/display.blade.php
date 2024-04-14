@extends('backend.layouts.master')
@section('backend-title', 'BecomeDoctor List')
@section('page-specific-css')
@endsection
@section('backend-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                BecomeDoctor <small>List</small>

            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box no-padding">
                <div class="box-header with-border">
                    <h3 class="box-title"><a class="btn bg-purple btn-flat" href="{{ route('becomedoctors.usercreate') }}"><i
                                class="fa fa-plus"></i>
                            &nbsp;Add BecomeDoctor</a></h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">S.N</th>
                                <th>User</th>
                                <th>Medical License</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($becomedoctors->isNotEmpty())
                                @foreach ($becomedoctors as $becomedoctor)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $becomedoctor->user->name }}</td>
                                        <td>{{ $becomedoctor->medical_license }}</td>
                                        <td>{{ $becomedoctor->status }}</td>
                                        <td>
                                            <a href="{{ route('becomedoctors.useredit', $becomedoctor) }}" class="btn btn-info btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                    
                                            {{-- Show button --}}
                                            <a href="{{ route('becomedoctors.usershow', $becomedoctor) }}" class="btn btn-success btn-xs" title="Show Details">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">No Data !</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
