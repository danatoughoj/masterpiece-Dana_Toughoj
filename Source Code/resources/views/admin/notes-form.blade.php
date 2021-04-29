@extends('layouts.admin_layout')
@section('content')
<div class="my-form">
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                    <h4 class="title">Add Note</h4>
            </div>
            <div class="content">
                <form action="{{route('admin.notes.store')}}" method="post">
                    {{ method_field('post') }}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Note Body</label>
                                <textarea name="note" rows="5" class="form-control border-input" placeholder="Enter Your Note Here">{{ $category->description ?? old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    @error('note')
                    <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger btn-fill btn-wd">Add</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection