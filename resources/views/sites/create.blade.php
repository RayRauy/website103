@extends('layouts.app')
@section('content')
    <div class="container-xxl">   
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Create Sites</h4>                      
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <form enctype="multipart/form-data" id="form-validation-2" class="form" method ="POST" action = "{{  route('site.store')  }}">
                            @csrf
                            <div class="mb-2">
                                <label for="title" class="form-label">Site Title</label>
                                <input name="title" class="form-control" type="text" rows="2" placeholder="Title">
                                {{-- <small>Error Message</small> --}}
                            </div>
                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea name = "description" class = "form-control" rows ="2" placeholder="Description"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="content" class="form-label">Content</label>
                                <textarea name = "content" class = "form-control" rows ="2" placeholder="Content"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="facebook" class="form-label">Facebook</label>
                                <textarea name = "facebook" class = "form-control" rows ="2" placeholder="Facebook"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="telegram" class="form-label">Telegram</label>
                                <textarea name = "telegram" class = "form-control" rows ="2" placeholder="Telegram"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="youtube" class="form-label">Youtube</label>
                                <textarea name = "youtube" class = "form-control" rows ="2" placeholder="Youtube"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="logo" class="form-label"><strong>Logo:</strong></label>
                                <input 
                                    type="file" 
                                    name="logo" 
                                    class="form-control @error('logo') is-invalid @enderror" 
                                    id="inputImage">
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