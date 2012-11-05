

function showIt(div){
	if (document.getElementById('button_add')) {
			hideAll();
	}
    if (document.getElementById) {  // for Netscape
      myDiv = document.getElementById(div);
         myDiv.style.display = 'inline';
    }

    if (document.all) {     // for IE
      eval("myDiv = "+div+";");
         myDiv.style.display = 'inline';
    }
}

function hideIt(div){
     if (document.getElementById) {  // for Netscape
       myDiv = document.getElementById(div);
          myDiv.style.display = 'none';
     }

     if (document.all) {     // for IE
       eval("myDiv = "+div+";");
          myDiv.style.display = 'none';
     }
}


function cofirmMultipleDelete(theForm) {
	if (confirm('Are you sure?')) {
		theForm.submit();
	}
}

function confirmSingleDelete() {
	if (confirm('Are you sure?')) {
		return true;
	} else {
		return false;
	}
}

function checkOptionField(field) {
	if (document.getElementById(field+'new').value == '') {
		hideIt(field+'Option'); 
		hideIt(field+'CancelLink'); 
		showIt(field+'_id'); 
		showIt(field+'NewLink');
	} else {
		hideIt(field+'_id'); 
		hideIt(field+'NewLink'); 
		showIt(field+'Option'); 		
		showIt(field+'CancelLink');	
	}
}

function openLogWindow(section, type, id) {
	window.open('logger.php?section='+section+'&type='+type+'&id='+id,"mywindow","location=0,status=0,scrollbars=1,width=800,height=450");
}

function saveIt() {
    window.location = document.getElementById("canvas").toDataURL('image/png');
}

function openDrawWindow(id) {
	window.open('draw.php?document_id='+id,'mywin','left=20,top=20,width=700,height=400,toolbar=0,resizable=0');
}