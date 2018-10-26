$(document).ready(function() {
	var urlDominio = 'https://www.cerouno.me/guiascaaguazu/public/api/v1/400';
	
	$('#tableLoad').DataTable({
		processing	: true,
		destroy		: true,
		ajax		: {
			type				: 'GET',
			cache				: false,
			crossDomain			: true,
			crossOrigin			: true,
			contentType			: 'application/json; charset=utf-8',
			dataType			: 'json',
			url				: urlDominio,
			dataSrc				: 'data'
		},
		columnDefs	: [
			{ targets			: [0], visible : false, searchable : false, orderData : [0, 0] },
			{ targets			: [1], visible : true,  searchable : true,  orderData : [1, 0] },
			{ targets			: [2], visible : true,  searchable : true,  orderData : [2, 0] },
			{ targets			: [3], visible : true,  searchable : true,  orderData : [3, 0] },
			{ targets			: [4], visible : true,  searchable : true,  orderData : [4, 0] },
			{ targets			: [5], visible : true,  searchable : true,  orderData : [5, 0] },
			{ targets			: [6], visible : true,  searchable : true,  orderData : [6, 0] }
		],
		columns		: [
			{ data				: 'barrio_codigo', name : 'barrio_codigo'},
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'pais_nombre', name : 'pais_nombre'},
			{ data				: 'distrito_nombre', name : 'distrito_nombre'},
			{ data				: 'ciudad_nombre', name : 'ciudad_nombre'},
			{ data				: 'barrio_nombre', name : 'barrio_nombre'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/locmlbm.php?mode=R&codigo=' + full.barrio_codigo + '" role="button" class="btn btn-primary"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/locmlbm.php?mode=U&codigo=' + full.barrio_codigo + '" role="button" class="btn btn-success"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/locmlbm.php?mode=D&codigo=' + full.barrio_codigo + '" role="button" class="btn btn-danger"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});
});