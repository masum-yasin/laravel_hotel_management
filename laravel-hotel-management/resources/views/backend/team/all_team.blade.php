@extends('admin.admin_dashboard');
@section('title','All Team')
@section('admin')
    <div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
                              
								<a href="{{route('create.team')}}"><i  class="btn btn-primary px-5 radius-30">Add Team</i></a>
								
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Team</h6>
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
										<th>Position</th>
										<th>Facebook</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($team as $key=>$item)
									<tr>
										<td>{{$key+1}}</td>
										<td><img src="{{asset($item->image)}}" alt="" style="width: 70; height:40px"></td>
										<td>{{$item->name}}</td>
										<td>{{$item->position}}</td>
										<td>{{$item->facebook}}</td>
										<td class="d-flex; gap-3">
											<a href="{{route('team.edit',$item->id)}}"><i class="btn btn-warning p-2">Edit</i></a>
											<a href="{{route('team.delete',$item->id)}}" id="delete"><i class="btn btn-danger p-2" >Delete</i></a>
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