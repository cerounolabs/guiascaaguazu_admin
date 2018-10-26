$(document).ready(function() {
	var nomDominio = document.getElementById('tableDominio').className;
	var urlDominio = 'https://www.cerouno.me/guiascaaguazu/public/api/v1/500/dominio/' + nomDominio;
	var codDominio = 0;
	
	switch(nomDominio) {
		case 'CATEGORIATIPO':
			codDominio	= 3;
			break;
		case 'SUBCATEGORIATIPO':
			codDominio	= 4;
			break;
		case 'DOMINIOSISTEMA':
			codDominio	= 5;
			break;
		case 'DOMINIOESTADO':
			codDominio	= 6;
			break;
		case 'PERSONATIPO':
			codDominio	= 29;
			break;
		case 'DOCUMENTOTIPO':
			codDominio	= 30;
			break;
		case 'USUARIOTIPO':
			codDominio	= 36;
			break;
		case 'ACCESOTIPO':
			codDominio	= 37;
			break;
		case 'PUBLICACIONESTADO':
			codDominio	= 44;
			break;
		case 'EMPRESAREDSOCIAL':
			codDominio	= 76;
			break;
	}
	
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
		],
		columns		: [
			{ data				: 'tipo_codigo', name : 'tipo_codigo'},
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'tipo_nombre', name : 'tipo_nombre'},
			{ data				: 'tipo_dominio', name : 'tipo_dominio'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/parmtdm.php?dominio='+ codDominio +'&mode=R&codigo=' + full.tipo_codigo + '" role="button" class="btn btn-primary"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/parmtdm.php?dominio='+ codDominio +'&mode=U&codigo=' + full.tipo_codigo + '" role="button" class="btn btn-success"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/parmtdm.php?dominio='+ codDominio +'&mode=D&codigo=' + full.tipo_codigo + '" role="button" class="btn btn-danger"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});
});