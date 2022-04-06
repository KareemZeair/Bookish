@extends('layout')

@section('content')

<body>

    <div class="container justify-content-center" style="margin-bottom: 50px; margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="col d-flex justify-content-center">
                <div class="card " style="margin-top: 50px; width: 60%">
                    <div class="card-header" style="background-color: #4d587d; color: white; text-align: center;">
                        Adding >book< to a listing: </div>


                            <div class="card-body">
                                <!-- <form action="/register" method="POST" enctype="multipart/form-data"> -->
                                <!-- @csrf -->

                                <img src="/MediaAssets/1984.jpg" style="height: 300px; display: block; margin-left: auto; margin-right: auto;">

                                <div class="form-group">
                                    <label for="condition" class="col-sm-2 col-form-label mb-0 pb-1">Book condition<span style="color: red;">*</span></label>
                                    <select class="form-select mb-2">
                                        <option value="New">Brand new</option>
                                        <option value="Like new">Like new</option>
                                        <option value="Used">Used</option>
                                        <option value="Vintage">Vintage</option>
                                    </select>
                                </div>

                                <!-- @error("name")
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror -->

                                <div class="form-group">
                                    <label for="price" class="col-sm-2 col-form-label mb-0 pb-1">Price<span style="color: red;">*</span></label>
                                    <div class="row">
                                        <div class="col-sm-2"> <select class="form-select mb-2">
                                                <option value="Dollar">$</option>
                                                <option value="Euro">€</option>
                                                <option value="Pound">£</option>
                                                <option value="Yen">¥</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="price" class="form-control mb-2" placeholder="00.00" name="price" id="price" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- @error("email")
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror -->

                                <div class="form-group">
                                    <div class="row my-3">
                                        <div class="mb-1">Location</div>
                                        <div class="col-6">
                                            <label for="city" class="mb-0 pb-1">city:<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control" placeholder="ex: Cairo" name="city" id="city" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="country" class="mb-0 pb-1">country:<span style="color: red;">*</span></label>
                                            <input type="text" class="form-control " placeholder="ex: Egypt" name="country" id="country" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- @error("username")
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror -->

                                <div class="form-group">
                                    <label for="contact" class="col-form-label mb-0 pb-1">Contact Email Address:<span style="color: red;">*</span></label>
                                    <input type="contact" class="form-control mb-2" placeholder="yourcontact@email.com" name="contact" id="contact" required>
                                </div>
                                <!-- @error("password")
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror -->

                                <div class="mb-3 form-group">
                                    <label for="pics" class="col-form-label mb-0 pb-1 mt-3">Upload some photos:</label>
                                    <input class="form-control" type="file" id="pics" multiple accept=".png, .jpg, .jpeg">
                                </div>

                                <!-- @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror -->

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
</body>

@endsection