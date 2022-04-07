@extends('layout')

@section('content')


<div class="container justify-content-center" style="margin-bottom: 50px; margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col d-flex justify-content-center">
            <div class="card " style="margin-top: 50px; width: 60%">
                <div class="card-header" style="background-color: #4d587d; color: white; text-align: center;">
                    Adding <span style="text-decoration:underline">{{ $book->title }}</span> to a listing: 
                </div>

                <div class="card-body">
                    <form action="/book/{{$book->key}}/store" method="POST" enctype="multipart/form-data">
                        @csrf

                        <img src="{{ $book->img }}" style="height: 300px; display: block; margin-left: auto; margin-right: auto;">

                        <div class="form-group">
                            <label for="condition" class="col-sm-2 col-form-label mb-0 pb-1">Book condition<span style="color: red;">*</span></label>
                            <select name="condition" class="form-select mb-2">
                                <option value="0">Brand new</option>
                                <option value="1">Like new</option>
                                <option value="2">Used</option>
                                <option value="3">Vintage</option>
                            </select>
                        </div>
                        @error("condition")
                        <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="price" class="col-sm-2 col-form-label mb-0 pb-1">Price<span style="color: red;">*</span></label>
                            <div class="row">
                                <div class="col-sm-2">
                                    <select name="currency" class="form-select mb-2">
                                        <option value="0">$</option>
                                        <option value="1">€</option>
                                        <option value="2">£</option>
                                        <option value="3">¥</option>
                                    </select>
                                </div>

                                <div class="col-sm-10">
                                    <input type="price" class="form-control mb-2" placeholder="00.00" name="price" id="price" required>
                                </div>
                            </div>
                        </div>

                        @error("price")
                        <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
                        @enderror
                        @error("currency")
                        <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="description" class="col-sm-2 col-form-label mb-0 pb-1">Description</label>
                            <textarea class="form-control mb-2" name="description" id="description" placeholder="How would you describe your copy?">{{ old('description') }}</textarea>
                        </div>
                        @error("description")
                        <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <div class="row my-3">
                                <div class="mb-1">Location</div>
                                <div class="col-6">
                                    <label for="city" class="mb-0 pb-1">city:<span style="color: red;">*</span></label>
                                    <input type="text" value="{{old('city')}}" class="form-control" placeholder="ex: Cairo" name="city" id="city" required>
                                </div>
                                @error("city")
                                <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
                                @enderror

                                <div class="col-6">
                                    <label for="country" class="mb-0 pb-1">country:<span style="color: red;">*</span></label>
                                    <input type="text" value="{{old('country')}}" class="form-control " placeholder="ex: Egypt" name="country" id="country" required>
                                </div>
                                @error("country")
                                <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact" class="col-form-label mb-0 pb-1">Contact Email Address:<span style="color: red;">*</span></label>
                            <input type="email" value="{{old('contact')}}" class="form-control mb-2" placeholder="yourcontact@email.com" name="contact" id="contact" required>
                        </div>
                        @error("contact")
                        <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
                        @enderror


                        <div class="mb-3 form-group">
                            <label for="pics" class="col-form-label mb-0 pb-1 mt-3">Upload some photos:</label>
                            <input class="form-control" type="file" name="pics[]" id="pics" multiple accept=".png, .jpg, .jpeg">
                        </div>

                        @error('pics.*')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror

                        <div>
                            <button type="submit" class="btn mb-2 mt-4" style="background-color: #4d587d; color: white;">Publish Listing</button>
                            <section class="mt-0 pt-0" style="text-align: right;"><span style="color: red;">*</span> fields are required</section>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection