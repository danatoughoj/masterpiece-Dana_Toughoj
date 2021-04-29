@extends('layouts.admin_layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header1">
                    <div class="header">
                        <h4 class="title" style="margin:0px">Notes</h4>
                    </div>
                    <div>
                        <a href="{{route('admin.notes.create')}}"><button class="btn btn-danger"> <i class="ti-plus"></i> Add Note</button></a>
                    </div>
                </div>
                <div class="notes-section">
                    @foreach ($notes as $note)
                        <div class="letter">
                            <form action="{{route('admin.notes.destroy',['note'=> $note->id])}}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <button type="submit" class="text-danger"><i class="ti-trash"></i></button>
                            </form>
                            <p>{{$note->body}}</p>
                            <div style="text-align: right;margin-top:50px">
                                {{$note->created_at->format('d.M.y | h:i a')}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row my-pagination">
            <div class="col-12">
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination justify-content-end">
                        {{ $notes->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection