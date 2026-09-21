@extends('admin.layouts.app')
@section('title', 'Blog Posts')
@section('page-title', 'Blog Posts')
@section('content')

<div
    id="blog-table-app"
    data-list-url="{{ route('admin.blog.list') }}"
    data-create-url="{{ route('admin.blog.create') }}"
></div>

@endsection