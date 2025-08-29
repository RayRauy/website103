@extends('layouts.app')

@section('content')
<div class="container-xxl"> 
    <div class="row">
        <div class="col-12">            
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Post</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('post.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                    <!-- <form action="{{ route('post.update', $row->id) }}" method="POST"> -->
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $row->title) }}">
                            @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sub_title" class="form-label">Sub Title</label>
                            <input type="text" name="sub_title" class="form-control" value="{{ old('sub_title', $row->sub_title) }}">
                            @error('sub_title') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description', $row->description) }}</textarea>
                            @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" class="form-control" rows="5">{{ old('content', $row->content) }}</textarea>
                            @error('content') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        @if($row->image)
                        <div class="mb-3">
                            <label class="form-label d-block">Current Image</label>
                            <img src="{{ asset($row->image) }}" width="120" alt="Current Image">
                        </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="active" class="form-control">
                                <option value="1" {{ old('active', $row->active) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('active', $row->active) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('post.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
</div><!--end container-->
@endsection