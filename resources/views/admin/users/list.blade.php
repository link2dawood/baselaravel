@extends('layouts.header')
@section('content')
<style> 
        .card{
            box-shadow:  20px 20px 60px #bebebe,
             -20px -20px 60px #ffffff;
        }   
</style>
<div class="page-header d-print-none">
            <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="font-weight-bold text-primary d-flex justify-content-between">Users</h6>
                             @if(\Auth::user()->role==1)
                                <div class="card-actions card-toolbar d-flex justify-content-between">
                                    <!--begin::Button-->
                                    <a href="{{$action}}/create" style="color:  white; background-image: linear-gradient(180deg, #313331 10%, #224abe 100%);" class="btn d-none d-sm-inline-block">
                                        <span class="svg-icon svg-icon-md">
                                            + Add  {{@$module['singular']}}
                                        </span>
                                    </a>
                                </div>
                             @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Created Date</th>
                                            @if(\Auth::user()->role==1)
                                                <th class="w-1">Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($users['data']) && sizeof($users['data'])>0)
                                        @foreach($users['data'] as $key => $val)
                                        <tr class="list_{{$val[$module['db_key']]}}">
                                            <th scope="row">{{ ( $currentPage - 1 ) * $perPage + $key + 1 }}</th>
                                            <td>{{$val['name']}}</td>
                                            <td>{{$val['email']}}</td>
                                            <td>@if($val['role'] == '1') Admin @else User @endif</td>
                                            <td>{{date('Y-m-d',strtotime($val['created_at']))}}</td>
                                            <td>
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{$action}}/edit/{{$val[$module['db_key']]}}" data-url="{{$action}}/edit/{{$val[$module['db_key']]}}">Edit</a>
                                                        <a class="dropdown-item" data-action="delete_record" href="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}" data-url="{{url($module['action'].'/delete/'.$val[$module['db_key']])}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
</div>

@endsection
