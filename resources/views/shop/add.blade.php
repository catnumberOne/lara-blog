<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
<title>Добавить товар</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/page1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset("js/functions.js")}}"></script>
</head>
<body>
<form action="{{url('/additem')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
		{{ csrf_field() }}
<div class="container">
	<h1>Добавить товар</h1>
	<hr>

	<div class="row">
		<div class="col-md-4">
			<input type="file" name="preview[]" multiple="multiple"><br>
		</div>
		<div class="col-md-8">
			<i class="glyphicon glyphicon-arrow-left"></i> Выберите миниатюру для товара. <p class="help-block">Размер изображения 150x150px, не более 200Кб</p>
		</div>
		<div class="col-md-8">
			<hr>
				<h3>Дополнительные изображения</h3>
				<button class="btn btn-primary add_images" type="button">+</button>
			<hr>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			<label class="control-label" for="item_title">Название товара</label>			
			<input class="form-control" type="text" name="item_title">
			<label for="description" class="control-label">Описание товара</label>
			<textarea class="form-control" rows="4" name="description"></textarea>

			<label class="control-label" for="price">Цена</label>
			<input class="form-control" type="text" name="price"/>
		</div>
	</div>
	<h2>Параметры товара</h2>
	<hr>
	<button class="btn btn-primary btn-lg add_button" type="button">Добавить</button>
</div>
<div class="container">
	<button class="btn btn-default btn-lg" type="submit">Сохранить товар</button>
</div>
<form>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Добавить параметр</h4>
</div>
<div class="modal-body">
	<input type="text" class="form-control parameter_modal" name="title" placeholder="Наименование параметра"/><br>
	<input type="text" class="form-control unit_modal" name="unit" placeholder="Единица измерения"/>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
	<button type="button" class="btn btn-primary save_and_close">Сохранить изменения</button>
</div>
</div>
</div>
</div>
<!-- End Modal -->

</body>
</html>