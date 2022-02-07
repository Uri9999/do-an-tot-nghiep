@extends('admin.master');

@section('title', 'edit cate')

@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục sản phẩm</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<form action="{{ route('postEditCate', $category->id) }}" method="post">
						@csrf
							<div class="panel-heading">
								Sửa danh mục
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label>Tên danh mục:</label>
									<input type="text" name="name" value="{{ $category->cate_name}}" class="form-control" placeholder="Tên danh mục...">
								</div>
								<input type="submit"  value="sua">
							</div>
						</form>
					</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection