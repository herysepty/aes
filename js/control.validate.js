		$(document).ready(function() {
			$('.form_input').validate({
				rules: {
					txtusername : {
						//digits: true,
						minlength:5,
						maxlength:15
					},
					txtpassword: {
						minlength:5
					},
					txtPass: {
						minlength:5,
						maxlength:16
					},
					tgl: {
						indonesianDate:true
					},
					txtpassword2: {
						equalTo: "#txtpassword"
					}
				},
				messages: {
					txtPass: {
						required: "Password harus diisi"
					},
					txtPass: {
						required: " Password harus diisi",
						minlength: "Password minimal 5 karakter",
						maxlength: "Username maksimal 16 karakter"
					},
					txtusername: {
						required: " Username harus diisi",
						minlength: "Username minimal 5 karakter",
						maxlength: "Username maksimal 15 karakter"
					},
					txtPasswordOld: {
						required: " Password lama harus diisi"
					},
					txtpassword: {
						required: " Password harus diisi",
						minlength: "Password minimal 5 karakter"
					},
					txtnmlengkap: {
						required: " Nama lengkap harus diisi"
					},
					txtpassword2: {
						equalTo: "Password tidak sama"
					}
				}
			});
		});
		
		$.validator.addMethod(
			"indonesianDate",
			function(value, element) {
				// put your own logic here, this is just a (crappy) example
				return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
			},
			"Please enter a date in the format DD/MM/YYYY"
		);