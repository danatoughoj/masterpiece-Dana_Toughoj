@extends('layouts.admin_layout')
@section('content')
<div class="my-form">
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <div class="header">
                @if($status =="add")
                    <h4 class="title">Add User</h4>
                @else
                    <h4 class="title">Edit User</h4>
                @endif
            </div>
            <div class="content">
                {{-- Add user from --}}
                @if($status == "add")
                    <form action="/admin-side/users" method="post"  enctype="multipart/form-data">
                        {{ method_field('post') }}
                        {{ csrf_field() }}
                {{-- Edit user form --}}
                @else
                    <form action="/admin-side/users/{{$user->id}}" method="post"  enctype="multipart/form-data">
                        {{ method_field('put') }}
                        {{ csrf_field() }}
                @endif
                    <div class="row">
                        {{-- Name Field --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control border-input" placeholder="Enter Name" value="{{ $user->name ?? old('name')}}" required>
                            </div>
                        </div>
                        {{-- Password Field --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control border-input" placeholder="Enter Password" required>
                            </div>
                        </div>
                    </div>
                    {{-- Name Field Error --}}
                    @error('name')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Password Field Error --}}
                    @error('password')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Email Error --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control border-input" placeholder="Enter Email" value="{{ $user->email ?? old('email')}}" required>
                            </div>
                        </div>
                    </div> 
                     {{-- Email Field Error --}}
                     @error('email')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    <div class="row">
                        {{-- Age Field --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Age</label>
                                <input type="number" name="age" min="1" class="form-control border-input" placeholder="Enter Age" value="{{ $user->age ?? old('age')}}" required>
                            </div>
                        </div>
                        {{-- Gender Field --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control border-input" value="{{$user->gender ??old('gender')}}" required>
                                        @if(isset($user) && $user->gender == "female")
                                            <option value="female" selected>Female</option>
                                            <option value="male" >Male</option>
                                        @else
                                            <option value="female">Female</option>
                                            <option value="male" selected>Male</option>                                    
                                        @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- Age Field Error --}}
                    @error('age')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Gender Field Error --}}
                    @error('gender')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    <div class="row">
                        {{-- Age Field --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Location</label>
                                <select name="location" class="form-control border-input" value="{{$user->location ??old('location')}}">
                                    <option value="Amman" selected>Amman</option>
                                    <option value="Balqa" >Balqa</option>
                                    <option value="Madaba">Madaba</option>
                                    <option value="Zarqa">Zarqa</option>                                    
                                    <option value="Ajlun">Ajlun</option>                                    
                                    <option value="Irbid">Irbid</option>                                    
                                    <option value="Jerash">Jerash</option>                                    
                                    <option value="Mafraq">Mafraq</option>                                    
                                    <option value="Aqaba">Aqaba</option>                                    
                                    <option value="Karak">Karak</option>                                    
                                    <option value="Tafilah">Tafilah</option>                                    
                                </select>
                            </div>
                        </div>
                        {{-- Phone Number Field --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" name="phone_number" min="1" class="form-control border-input" placeholder="Enter phone number" value="{{ $user->phone_number ?? old('phone_number')}}" required>
                            </div>
                        </div>
                    </div>
                    {{-- Location Field Error --}}
                    @error('location')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Number Field Error --}}
                    @error('phone_number')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror
                    {{-- Image Field --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control border-input">
                            </div>
                        </div>
                    </div> 
                    {{-- Image Field Error --}}
                    @error('image')
                        <div class="text-danger"> {{ $message }} </ div>
                    @enderror                      
                    <div class="text-center">
                        @if($status =="add")
                            <button type="submit" class="btn btn-danger btn-fill btn-wd">Add</button>
                        @else
                            <button type="submit" class="btn btn-danger btn-fill btn-wd">Update</button>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection