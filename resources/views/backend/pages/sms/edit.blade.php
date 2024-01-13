@extends('backend.layouts.master')

@section('title')
    Sms Edit - Admin Panel
@endsection



@section('admin-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Sms Edit</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.admins.index') }}">All Smss</a></li>
                        <li><span>Edit Sms - {{ $sms->title }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- page title area end -->

    <div class="main-content-inner">
        <div class="row">
            <!-- data table start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> Sms - {{ $sms->id }}</h4>
                        @include('backend.layouts.partials.messages')

                        {{-- <form action="{{ route('admin.sms.update', $sms->id) }}" method="POST"> --}}

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Number</label>
                                <input type="text" disabled class="form-control" value="{{ $sms->number }}">
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Send Time</label>
                                <input type="text" disabled class="form-control" value="{{ $sms->send_time }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Send Time</label>
                                <textarea disabled class="form-control">{{ $sms->message }}</textarea>
                            </div>


                        </div>

                        <hr>

                        <h4 class="header-title">User's Info</h4>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">User Name</label>
                                <input type="text" disabled class="form-control" value="{{ $sms->user->name }}">
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">User E-mail</label>
                                <input type="text" disabled class="form-control" value="{{ $sms->user->email }}">
                            </div>


                        </div>




                        {{-- </form> --}}
                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
    </script>
@endsection
