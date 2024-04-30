@extends('admin.admin_dashboard');
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="page-content">
    <div class="container">
            <div class="main-body">
                <div class="row">


                    <div class="card-body">
                        <ul class="nav nav-tabs nav-primary" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Manage Room</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                    aria-selected="false" tabindex="-1">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Room Number</div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
                                <form class="row g-3">
                                    <div>
                                        <h5 class="mb-4">UPDATE ROOM</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input1" class="form-label">Room Type Name</label>
                                        <input type="text" class="form-control" id="input1" name="roomtype_id"
                                            value="{{ $editData['type']['name'] }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input2" class="form-label">Total Adult</label>
                                            <input type="text" class="form-control" id="input2" name="total_adult"
                                                value="{{ old('total_adult', $editData->total_adult) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input2" class="form-label">Totla Child</label>
                                        <input type="text" class="form-control" id="input2" name="total_child"
                                            value="{{ old('total_child', $editData->total_child) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input3" class="form-label">Main Image</label>
                                        <input type="file" class="form-control" id="image" name="image">

                                        <img id="showImage"
                                        src="{{(!empty($editData->image)) ? url('upload/roomimg/'.$editData->image) : url('upload/no_image.jpg')}}"
                                        class="rounded-circle p-1 bg-primary" alt="" width="120px">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="input4" class="form-label">Gellery Image</label>
                                        <input type="file" class="form-control" id="multiImg" name="multi_img[]"
                                            accept="image/jpeg, image/jpg, image/gif, image/png" multiple>
                                            <div class="row" id="preview_id"></div>
                                    </div>



									<div class="col-md-4">
                                        <label for="input1" class="form-label">Room Price</label>
                                        <input type="text" class="form-control" id="input1" name="price"
                                            value="{{ $editData->price}}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input2" class="form-label">Discount (%)</label>
                                            <input type="text" class="form-control" id="input2" name="discount"
                                                value="{{ old('discount', $editData->discount) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="input2" class="form-label">Room Capacity</label>
                                        <input type="text" class="form-control" id="input2" name="room_capacity"
                                            value="{{ old('room_capacity', $editData->room_capacity) }}">
                                    </div>

									<div class="col-md-6">
                                        <label for="input7" class="form-label">Room View</label>
                                        <select id="input7" class="form-select" name="view">
                                            <option selected="">Choose...</option>
                                            <option value="Sea View">Sea View</option>
                                            <option value="Hill View">Hill View</option>
                                            <option value="Natural View">Natural View</option>
                                        </select>
                                    </div>

									<div class="col-md-6">
                                        <label for="input7" class="form-label">Bed Style</label>
                                        <select id="input7" class="form-select" name="bed_style">
                                            <option selected="">Choose...</option>
                                            <option value="Queen Bed">Queen Bed</option>
                                            <option value="Twin Bed">Twin Bed</option>
                                            <option value="King Bed">King Bed</option>
                                        </select>
                                    </div>



                                   
                                    
                                   
                                    
                                   
                                    <div class="col-md-12">
                                        <label for="input11" class="form-label">Short Description</label>
                                        <textarea class="form-control" id="input11" placeholder="Address ..." rows="3" name="short_desc">{{$editData->short_desc}}</textarea>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <label for="input11" class="form-label">Description</label>
                                        <textarea class="form-control" 
                                        id="myeditorinstance"
                                        name="description" >{{$editData->description}}</textarea>
                                    </div>
                                  
                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="button" class="btn btn-primary px-4">Submit</button>
                                            <button type="button" class="btn btn-light px-4">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            {{-- Here is primaryhome end --}}






                            <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                    Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                    artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo
                                    enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud
                                    organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia
                                    yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes
                                    anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson
                                    biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente
                                    accusamus tattooed echo park.</p>
                            </div>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0'])
            });
        });
    </script>
@endsection
