@extends('layouts.admin')

@section('content')
<div class="main-content-inner">

        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap-5 mb-6">

                <h3>User Message</h3><br>
                                  
                <ul class="breadcrumbs flex items-center flex-wrap gap-2">
                    <li><a href="{{ route('admin.dashboard') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a></li>
                    <li><i class="icon-chevron-right"></i></li>
                    
                </ul>
            </div>
 @if(session('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>danger!</strong> {{ session('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

   <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)

                            <tr>
                                <td>{{ $contact->id}}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->comment }}</td>
                                <td>
                                    <form action="{{ route('admin.contacts.delete', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact message?');">
                                        @csrf
                                        @method('DELETE')
                                         <button type="submit" class="item text-danger delete"
                                                style="border: none; background: none; padding: 0; margin: 0; cursor: pointer;">
                                                <i class="icon-trash-2"></i>
                                            </button>
                                    </form>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            </div>



@endsection