@extends('admin.admin_dashboard');
@section('title','Room Type List')
@section('admin')
    <div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
                              
								<a href="{{route('add.room.type')}}"><i  class="btn btn-primary px-5 radius-30">Add Room Type</i></a>
								
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Room Type List</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Image</th>
										<th>Name</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($allData as $key=>$item)
									@php
										$rooms = App\Models\Room::where('roomtype_id', $item->id)->get();
									@endphp
									<tr>
										<td>{{$key+1}}</td>
										<td><img src="{{(!empty($item->room->image)) ? url('upload/roomimg/'.$item->room->image) : url('upload/no_image.jpg')}}" alt="" width="100px" height="70px"></td>
										<td>{{$item->name}}</td>
										
										<td class="d-flex; gap-3">
											@foreach ($rooms as $room)
												
						
											<a href="{{route('edit.room',$room->id)}}"><i class="btn btn-warning p-2">Edit</i></a>
											<a href="" id="delete"><i class="btn btn-danger p-2" >Delete</i></a>
											@endforeach
										</td>
									</tr>
									@endforeach
								
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			
			
				
			</div>
@endsection