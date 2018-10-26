$(document).ready(function() {
	var urlDominio = 'https://www.cerouno.me/guiascaaguazu/public/api/v1/600';
	
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
			{ targets			: [2], visible : false, searchable : false, orderData : [2, 0] },
			{ targets			: [3], visible : true,  searchable : true,  orderData : [3, 0] },
			{ targets			: [4], visible : false, searchable : false, orderData : [4, 0] },
			{ targets			: [5], visible : true,  searchable : true,  orderData : [5, 0] },
			{ targets			: [6], visible : false, searchable : false, orderData : [6, 0] },
			{ targets			: [7], visible : true,  searchable : true,  orderData : [7, 0] }
		],
		columns		: [
			{ data				: 'categoria_subcategoria_codigo', name : 'categoria_subcategoria_codigo'},
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'tipo_categoria_codigo', name : 'tipo_categoria_codigo'},
			{ data				: 'tipo_categoria_nombre', name : 'tipo_categoria_nombre'},
			{ data				: 'tipo_subcategoria_codigo', name : 'tipo_subcategoria_codigo'},
			{ data				: 'tipo_subcategoria_nombre', name : 'tipo_subcategoria_nombre'},
			{ data				: 'categoria_subcategoria_descripcion', name : 'categoria_subcategoria_descripcion'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/parmtcm.php?mode=R&codigo=' + full.categoria_subcategoria_codigo + '" role="button" class="btn btn-primary"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/parmtcm.php?mode=U&codigo=' + full.categoria_subcategoria_codigo + '" role="button" class="btn btn-success"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/parmtcm.php?mode=D&codigo=' + full.categoria_subcategoria_codigo + '" role="button" class="btn btn-danger"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});
});