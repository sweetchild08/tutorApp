@extends('layouts.base')

@section('content')
    <x-alert-message />
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            {{-- Data --}}
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Students</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">All Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Today</option>
                                    <option value="">3 Days</option>
                                    <option value="">1 Week</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>

                        {{-- general actions --}}
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addteacher">
                                <i class="zmdi zmdi-plus"></i>Add Student</button>
                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                <select class="js-select2" name="type">
                                    <option selected="selected">Export</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                        {{-- end general actions --}}
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    {{-- <th>status</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                <tr class="tr-shadow">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{$student->getFullName()}}</td>
                                    <td>{{$student->username}}</td>
                                    <td><span class="block-email">{{$student->email}}</span></td>
                                    {{-- <td>
                                        <span class="status--process">Processed</span>
                                    </td> --}}
                                    <td>
                                        <div class="table-data-feature">
                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                <i class="zmdi zmdi-mail-send"></i>
                                            </button> --}}
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <button class="item del" data-toggle="tooltip" data-placement="top" title="Delete" data-userid="{{$student->id}}">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr class="spacer"></tr>
                                @empty
                                    <tr><td colspan="6" class="text-center"><h3>No data...</h3></td></tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal id="addteacher" :isForm="true" >
        <x-slot name="header">
            <h3>Add Student</h3>
        </x-slot>
        <div class="card-body card-block">
            @csrf
            <x-form.input name="first_name" label="First Name"  />
            <x-form.input name="middle_name" label="Middle Name"  />
            <x-form.input name="last_name" label="Last Name"  />
            <x-form.input name="username" label="Username"  />
            <x-form.input name="email" label="Email" type="email"  />
            <x-form.input name="password" label="Password" type="password"  />
            <x-form.input name="password_confirmation" label="Confirm Password" type="password"  />
        </div>
        <x-slot name="buttons">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" id="btnaddteacher" class="btn btn-primary">Add</button>
        </x-slot>
    </x-modal>
@endsection

@push('scripts')
    <script>
        $('#frmaddteacher').submit((e)=>{
            e.preventDefault()
            $.ajax({
                url:"{{route('teacher.students.store')}}",
                type:'post',
                data:$('#frmaddteacher').serialize(),
                success:(res)=>{
                    swal(res.message, {
                            icon: "success",
                        });
                    // $.notify(res.message,'success');
                    location.reload()
                },
                error:(err)=>{
                    if(err.status==422){
                        showInputErrors(err);
                    }
                }
            })
        })
        $('.del').click(function(e){
            let id=$(this).data('userid')
            let url='{{route('admin.teachers.destroy',':id')}}';
            url=url.replace(':id',id)
            swal({
            title: "Are you sure to delete?",
            // text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url:url,
                    type:'delete',
                    data:{_token:'{{csrf_token()}}'},
                    success:(res)=>{
                        swal(res.message, {
                            icon: "success",
                        });
                        location.reload()
                    },
                    error:(err)=>{
                        swal({
                            title: "Teacher Deleting Failed",
                            text: err.responseJSON.message,
                            icon: "error",
                        });
                    }
                })
            }
            });
        })

    </script>
@endpush