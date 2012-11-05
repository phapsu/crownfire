	function goSearch(){
	  if($('#search').val()==''){
	    alert('Please enter text to search');
		return;
	  }
	  document.forms[0].doact.value = "search";
	  document.forms[0].submit();	
	}
	
	function awardSearch(){
	  if($('#userid').val()==''){
	    alert('User ID cannot be empty');
		return;
	  }
	  document.forms[0].doact.value = "search";
	  document.forms[0].submit();	
	}
    