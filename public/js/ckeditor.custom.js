// Personalización de ckeditor
ClassicEditor
	.create( document.querySelector( '#id_descripcion' ),{ 									 
		ckfinder: {
			uploadUrl: '/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
			 },
		image: {
			toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],							
			styles: [
				'full',							
				'alignLeft',
				'alignRight'
			]
		}                    
	})
	.then( editor => {
		console.log( editor );
	} )
	.catch( error => {
		console.error( error );
	} );