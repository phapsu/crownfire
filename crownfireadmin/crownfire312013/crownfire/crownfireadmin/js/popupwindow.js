var popup_profiles =
{
	window600x1100:
	{
		height:600,
		width:1100,
		status:1,
		center:1,
		location:1,
		createnew: 1
	},
	windowRoomPreview:
	{
		height:620,
		width:820,
		status:1,
		center:1,
		location:1,
		createnew: 1
	},
	window_useritems:
	{
		height:620,
		width:600,
		status:0,
		center:1,
		location:1,
		createnew: 1
	},
	window_backdoor:
	{
		height:700,
		width:1050,
		status:0,
		center:1,
		location:1,
		createnew: 1,
		scrollbars: 0
	},
	window_bannotes:
	{
		height:300,
		width:400,
		status:0,
		center:1,
		location:1,
		createnew: 1,
		scrollbars: 0
	},
        window_tshirt:
        {
                //height:600,
                width:850,
                status:1,
                center:1,
                location:1,
                createnew: 1
        }


};

popupwindow = function(url, type)
{

	var profiles = popup_profiles;

	var settings, parameters, mysettings, b, a;
	
	// for overrideing the default settings
	mysettings = {}; 

	
	settings = {
		height:600, // sets the height in pixels of the window.
		width:600, // sets the width in pixels of the window.
		toolbar:0, // determines whether a toolbar (includes the forward and back buttons) is displayed {1 (YES) or 0 (NO)}.
		scrollbars:1, // determines whether scrollbars appear on the window {1 (YES) or 0 (NO)}.
		status:0, // whether a status line appears at the bottom of the window {1 (YES) or 0 (NO)}.
		resizable:1, // whether the window can be resized {1 (YES) or 0 (NO)}. Can also be overloaded using resizable.
		left:0, // left position when the window appears.
		top:0, // top position when the window appears.
		center:1, // should we center the window? {1 (YES) or 0 (NO)}. overrides top and left
		createnew:1, // should we create a new window for each occurance {1 (YES) or 0 (NO)}.
		location:1, // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
		menubar:0 // determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
	};


	a = type;
	// see if a profile has been defined
	if(typeof popup_profiles[a] != "undefined")
	{
		settings = jQuery.extend(settings, popup_profiles[a]);
	}

	// center the window
	if (settings.center == 1)
	{
		settings.top = (screen.height-(settings.height + 110))/2;
		settings.left = (screen.width-settings.width)/2;
	}
	
	parameters = "location=" + settings.location + ",menubar=" + settings.menubar + ",height=" + settings.height + ",width=" + settings.width + ",toolbar=" + settings.toolbar + ",scrollbars=" + settings.scrollbars  + ",status=" + settings.status + ",resizable=" + settings.resizable + ",left=" + settings.left  + ",screenX=" + settings.left + ",top=" + settings.top  + ",screenY=" + settings.top;
		
//		jQuery(this).bind("click", function(){
//			var name = settings.createnew ? "PopUpWindow" + index : "PopUpWindow";
			window.open(url, name, parameters).focus();
//			return false;
//		});
};

//force all links with class='popup' to open in popup window 
$(document).ready(function(){
	$('a.popup').click(function(){
		popupwindow($(this).attr('href'), $(this).attr('rel')?$(this).attr('rel'):'');
		return false;
	});
});
