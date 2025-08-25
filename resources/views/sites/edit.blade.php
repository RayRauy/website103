@extends('layouts.app')

@section('content')
    <div class="container-xxl">   
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Update Sites</h4>                      
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <form enctype="multipart/form-data" id="form-validation-2" class="form" method ="POST" action = "{{route('site.update', $row -> id)}}">
                            @csrf
                            @method('PUT')
                            <div class="mb-2">
                                <label for="title" class="form-label">Site Title</label>
                                <input name="title" class="form-control" type="text" value="{{ $row -> title }}">
                                {{-- <small>Error Message</small> --}}
                            </div>
                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea name = "description" class = "form-control" rows ="2">{{ $row -> description }}</textarea>
                            </div>
                            <div class="mb-2">
                                <label for="content" class="form-label">Content</label>
                                <input name="content" class="form-control" type="text" value="{{ $row -> content }}">
                                {{-- <small>Error Message</small> --}}
                            </div>
                            <div class="mb-2">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input name="facebook" class="form-control" type="text" value="{{ $row -> facebook }}">
                                {{-- <small>Error Message</small> --}}
                            </div>
                            <div class="mb-2">
                                <label for="telegram" class="form-label">Telegram</label>
                                <input name="telegram" class="form-control" type="text" value="{{ $row -> telegram }}">
                                {{-- <small>Error Message</small> --}}
                            </div>
                            <div class="mb-2">
                                <label for="youtube" class="form-label">Youtube</label>
                                <input name="youtube" class="form-control" type="text" value="{{ $row -> youtube }}">
                                {{-- <small>Error Message</small> --}}
                            </div>
                            <div class="mb-2">
                                <label for="logo" class="form-label"><strong>Logo:</strong></label>
                                <input 
                                    type="file" 
                                    name="logo" 
                                    class="form-control @error('logo') is-invalid @enderror" 
                                    id="logo">
                                <img src="{{ asset($row->logo) }}" width="300px">
                                @error('logo')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form><!--end form-->            
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col-->                                                                                
        </div><!--end row-->
    </div><!-- container -->
@endsection