@extends('layouts.app')

@section('content')
    <div class="container-xxl"> 
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Roles</h4>                      
                            </div><!--end col-->
                            <div class="col-auto"> 
                                <form class="row g-2">
                                    <div class="col-auto">
                                        <a class="btn bg-primary-subtle text-primary dropdown-toggle d-flex align-items-center arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" data-bs-auto-close="outside">
                                            <i class="iconoir-filter-alt me-1"></i> Filter
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-start">
                                            <div class="p-2">
                                                <div class
                                                ="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" checked id="filter-all">
                                                    <label class="form-check-label" for="filter-all">
                                                      All 
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" checked id="filter-one">
                                                    <label class="form-check-label" for="filter-one">
                                                        New
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" checked id="filter-two">
                                                    <label class="form-check-label" for="filter-two">
                                                        VIP
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" checked id="filter-three">
                                                    <label class="form-check-label" for="filter-three">
                                                        Repeat
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" checked id="filter-four">
                                                    <label class="form-check-label" for="filter-four">
                                                        Referral
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" checked id="filter-five">
                                                    <label class="form-check-label" for="filter-five">
                                                        Inactive
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" checked id="filter-six">
                                                    <label class="form-check-label" for="filter-six">
                                                        Loyal
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    
                                    <div class="col-auto">
                                        <a class="btn btn-primary" href="{{ route('post.create') }}">
                                            <i class="fa-solid fa-plus me-1"></i> Add Role
                                        </a>
                                    </div><!--end col-->
                                </form>    
                            </div><!--end col-->
                        </div><!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        
                        <div class="table-responsive">
                            <table class="table mb-0 checkbox-all" id="datatable_1">
                                <thead class="table-light">
                                  <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Active</th>
                                    <th>Actions</th> 
                                  </tr>
                                </thead>
                                <tbody>
                                    @if ($rows)                                    
                                        @foreach($rows as $row)
                                        <tr>
                                            <td>{{ $row->id}}</td>
                                            <td>{{ $row->title}}</td>
                                            <td>{{ $row->sub_title }}</td>
                                            <td>{{ $row->description }}</td>
                                            <td>
                                                @if($row->image)
                                                <img src="{{ asset($row->image) }}" width="60" height="60" alt="Image">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $row->active ? 'Active' : 'Inactive' }}</td>

                                            <td>
                                                <a href="{{ route('post.edit', $row->id) }}">Edit</a> |
                                                <form action="{{ route('post.delete', $row->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->                                     
    </div><!-- container -->
@endsection