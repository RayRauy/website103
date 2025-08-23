@extends('master_page')

@section('content')
    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Create News</h2>
                
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" required>
                                    <option value="">Select a category</option>
                                    <option value="1">Politics</option>
                                    <option value="2">Technology</option>
                                    <option value="3">Sports</option>
                                    <option value="4">Entertainment</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Featured Image</label>
                                <input class="form-control" type="file" id="image">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" rows="10" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags (comma separated)</label>
                                <input type="text" class="form-control" id="tags" placeholder="tag1, tag2, tag3">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="featured">
                                <label class="form-check-label" for="featured">Featured News</label>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">Publish</button>
                                <button type="button" class="btn btn-secondary">Save Draft</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection