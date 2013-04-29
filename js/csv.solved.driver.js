
 var activeDrop = null;
 var sourceFile = null;
 var contrastFile = null;

$(window).load(function() {
	applyDropZoneListeners();
})

function applyDropZoneListeners() {
	$('[name="dzone"]').each(function() {
		var obj = $(this);
		$(this).dropzone({ 	url:'bin/pre-process-csv.php', 
							method:'POST', 
							accept:fileCheck,
							maxFilesize:'30', 
							paramName:'csv-file', 
							init:initDrop, 
							enqueueForUpload:true, 
							thumbnail:false, 
							drop:showProgress,
							sending:function (file, request, form) {
								activeDrop = obj;
								file.previewTemplate.remove();
								activeDrop.removeAllFiles;
							}, 
							uploadprogress:progressStatus, 
							complete:uploadComplete,
							success:completeFinal,
							previewsContainer:'#'+$(this).attr('id')+'-preview'
							//previewTemplate:''
						});
		
	})
}

function initDrop() {

}

function fileCheck(file, done) {
	var extension = file.name.substr( (file.name.lastIndexOf('.') +1) );
	if (extension == 'csv' || extension == 'xlsx')
		done();
	else
		done('The file you dropped is a '+extension+' and this process only accepts CSV or XLSX files. \nPlease make sure the file is formatted correctly before upload');
}

function showProgress(file) {
	
	activeDrop.find('.progress').css('width', '0%');
	activeDrop.find('.progress').show();
	activeDrop.find('.progress').fadeIn();
}


function progressStatus(a, b) {
	activeDrop.find('.progress').clearQueue();
	activeDrop.find('.progress').animate({width:(b * 2)+'px'}, 100);
}

function uploadComplete(file, b) {
	if (sourceFile && contrastFile)
		activateOptions();
	activeDrop.parent().find('.filename').html(file.name);
	activeDrop.find('.progress').fadeOut(500, function() { 
			activeDrop.find('.progress').css('width', '0px');
		});
	
}

function completeFinal(a, returnContent) {
	alert((returnContent))
	switch(activeDrop.attr('id')) {
		case 'source':
		sourceFile = $.parseJSON(returnContent);
		alert('source length '+sourceFile.length)
		break;
		case 'contrast':
		contrastFile = $.parseJSON(returnContent);
		alert('source length '+contrastFile.length)
		break;
	}
}

function activateOptions() {
	$('#options').show();
	$('.select').click(function() {
		alert(sourceFile.files)
		$.ajax({
	      type: "POST",
	      url: "bin/process-csv.php",
	      enctype: 'multipart/form-data',
	      beforeSend:removeResults,
	      data: {
	      	datatype: $(this).attr('id'),
	        source: sourceFile,
	        contrast: contrastFile
	      },
	      success: successResponse,
	      complete:uploadResponse
	    });
	})
}

function removeResults() {
	$('#results_pane').fadeOut();
}

function successResponse(a, b) {

	$('#results_pane').fadeIn();
	$('#results_pane').html(a);
}

function uploadResponse(a) {
}
