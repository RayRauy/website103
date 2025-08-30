@extends('layouts.app')
@section('content')
    <div class="container-xxl">   
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">                      
                                <h4 class="card-title">Create Menus</h4>                      
                            </div><!--end col-->
                        </div>  <!--end row-->                                  
                    </div><!--end card-header-->
                    <div class="card-body pt-0">
                        <form id="form-validation-2" class="form" method ="POST" action = "{{route('menu.store')}}">
                            @csrf
                            <div class="mb-2">
                                <label for="title" class="form-label">Menu Title</label>
                                <input name="title" class="form-control" type="text" rows="2" placeholder="title">
                                {{-- <small>Error Message</small> --}}
                            </div>
                            <div class="mb-2">
                                <label for="sub_title" class="form-label">Sub Title</label>
                                <input name="sub_title" class="form-control" type="text" rows="2" placeholder="Name">
                                {{-- <small>Error Message</small> --}}
                            </div>
                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea name = "description" class = "form-control" rows ="2" placeholder="Description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="active" class="form-control">
                                    <option value="1" {{ old('active') == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('active') == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form><!--end form-->            
                    </div><!--end card-body--> 
                </div><!--end card--> 
            </div> <!--end col-->                                                                                
        </div><!--end row-->
    </div><!-- container -->
@endsection