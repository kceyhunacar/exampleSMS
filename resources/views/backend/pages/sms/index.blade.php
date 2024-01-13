@extends('backend.layouts.master')

@section('title')
    Sms - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('admin-content')
    <!-- page title area start -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Sms</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li><span>All Sms</span></li>
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
                        <h4 class="header-title float-left">Sms List</h4>
                       
                        <div class="clearfix"></div>
                        @include('backend.layouts.partials.messages')

                        <div class="table-responsive">

                            <table class="table table-striped gy-7 gs-7 data-table">

                                <thead>
                                    <tr class="fw-bold fs-6 text-gray-800 border-gray-200">
                                        <th width="5%">#</th>
                                        <th>Send Time</th>
                                        <th>Number</th>
                                        <th>User</th>
                                        <th width="13%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>





                    </div>
                </div>
            </div>
            <!-- data table end -->

        </div>
    </div>
@endsection


@section('scripts')
    <!-- Start datatable js -->
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                // "oLanguage": {
                //     "sUrl": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Turkish.json"
                // },
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.sms.index') }}",


                },

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'send_time',
                        name: 'send_time'
                    },
                    {
                        data: 'number',
                        name: 'number'
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('#committee_id').change(function() {
                table.draw();
            });
        });

        $('#deleteModal').on('show.bs.modal', function(e) {

            var id = $(e.relatedTarget).data('id');

            $('.modalDeleteButton').on('click', function() {

                window.location.href = "{{ route('admin.sms.delete') }}/" + id;

            });
        })
    </script>

 
@endsection
