$(document).ready(function(){

	ajaxGet = function(url, data, callback, button_id)
	{
	 $.ajax({
	   type: "GET",
	   url: url,
	   data: data,
	   //dataType: "json",
	   beforeSend: function(){
	   		$('#'+button_id).hide();
	   		$('#'+button_id).after('<img src=\'images/ajax_loader.gif\' class=\'ajax_loader\'>');
	   },
	   complete: function(XMLHttpRequest, textStatus){
			//alert( "Responce Status: " + textStatus );
	   		$('.ajax_loader').remove();
	   		if(button_id){
	   			$('#'+button_id).show();
	   		}
	   },

	   error: function (XMLHttpRequest, textStatus, errorThrown) {
			this.success({error: 'AJAX Error Occured'});
		},

	   success: function(callback_data){
	   		//alert( "Data Received: " + callback_data );
		    try{
		    	var myobj = eval('('+callback_data+')');
		     	callback(myobj);
		     }catch(err){
		     	//alert('Error: '+err);
		     	callback(callback_data);
		     }
	   }
	 });
	}
	
});