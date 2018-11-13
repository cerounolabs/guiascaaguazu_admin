$(document).ready(function() {
	var urlDominio = 'https://www.cerouno.me/guiascaaguazu/public/api/v1/800';
	
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
			{ targets			: [5], visible : false, searchable : false, orderData : [5, 0] },
			{ targets			: [6], visible : false, searchable : false, orderData : [6, 0] },
			{ targets			: [7], visible : false, searchable : false, orderData : [7, 0] },
			{ targets			: [8], visible : true,  searchable : true,  orderData : [8, 0] }
		],
		columns		: [
			{ data				: 'empresa_codigo', name : 'empresa_codigo'},
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'tipo_subcategoria_nombre', name : 'tipo_subcategoria_nombre'},
			{ data				: 'empresa_nombre', name : 'empresa_nombre'},
			{ data				: 'empresa_ruc', name : 'empresa_ruc'},
			{ data				: 'empresa_logo', name : 'empresa_logo'},
			{ data				: 'empresa_obs_administrador', name : 'empresa_obs_administrador'},
			{ data				: 'empresa_obs_cliente', name : 'empresa_obs_cliente'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/empmemm.php?mode=R&codigo=' + full.empresa_codigo + '" role="button" class="btn btn-primary"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/empmemm.php?mode=U&codigo=' + full.empresa_codigo + '" role="button" class="btn btn-success"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/empmemm.php?mode=D&codigo=' + full.empresa_codigo + '" role="button" class="btn btn-danger"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});
});