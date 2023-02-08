/**
 * File : addKategori.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 */

$(document).ready(function(){
	
	var addKategoriForm = $("#addKategori");
	
	var validator = addKategoriForm.validate({
		rules:{
			kategori :{ required : true },
			rek_id : { required : true },
			tgl_transaksi : { required : true },
		},
		messages:{
			kategori :{ required : "Data tidak boleh kosong" },
			rek_id :{ required : "Data tidak boleh kosong" },		
			tgl_transaksi :{ required : "Data tidak boleh kosong" },		
		}
	});
});
