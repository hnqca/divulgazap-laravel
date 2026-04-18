@extends('layouts.base')

@section('title', 'Share your WhatsApp Group - '. config('app.name'))

@section('scripts')
<script src="/assets/js/pages/page-group-create.js"></script>
@endsection

@section('styles')
<link rel="stylesheet" href="/assets/css/page-group-create.css">
@endsection

@section('content')
<div class="group-create-container">
    <aside class="preview-sidebar">
        <span class="label-preview">Group preview</span>
        <div class="card">
            <div class="card-image">
                <i class="fas fa-image" id="icon-group-placeholder-image"></i>
                <img width="100%" height="200px" src="/assets/images/placeholder.png" id="demo-group-image" class="object-fit-cover d-none" />
            </div>
            <div class="card-body">
                <span class="category-tag mt-1" id="demo-group-category">Category</span>
                <h3 class="card-title" id="demo-group-name">Group Name</h3>
                <p class="card-desc" id="demo-group-description">Your group's awesome description will appear here...</p>
            </div>
        </div>
    </aside>


    <main class="form-content">
        <h1>Promote your Group</h1>
        <p>and start getting new members! 😍</p>

        <form id="form-create-group">
            <div id="first-step" class="form-group">
                <label>Group Link (WhatsApp)</label>
                <div class="input-icon-wrapper">
                    <i class="fas fa-link"></i>
                    <input type="url" id="link" value="" placeholder="https://chat.whatsapp.com/..." required>
                </div>
            </div>

            <div id="second-step" class="d-none">
               <div class="form-group">
                    <label>Category</label>
                    <div class="input-icon-wrapper wrapper-select2">
                        <i class="fas fa-th-large select2-icon"></i>
                        <select id="category_id" name="category_id" class="select2-dark">
                            <option value="" disabled selected>Choose a Category</option>
                            @foreach($groupCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Group Name</label>
                    <div class="input-icon-wrapper">
                        <i class="fas fa-users"></i>
                        <input type="text" id="name" placeholder="Group Name" maxlength="30">
                    </div>
                </div>

                <div class="form-group">
                    <label>Description (optional)</label>
                    <textarea id="description" rows="4" placeholder="Tell us a little about this group"></textarea>
                </div>

                <div style="width: 100%; margin-bottom: 2rem;">
                    <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}" data-theme="dark" data-size="normal"></div>
                </div>

            </div>

            <div id="alert-create-group" class="alert alert-warning d-none" role="alert" style="position: relative;">
                <span class="text-center"></span>
            </div>

            <button type="submit" id="btn-submit" class="btn btn-submit">
                 <div id="loading" class="spinner-border-custom spinner-light d-none" role="status"></div>
                <span id="text">Verify link</span>
            </button>

        </form>
    </main>
</div>
@endsection