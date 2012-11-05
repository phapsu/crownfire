var checked			= false;
var nw 				= new Date();
var	mon				= new Date();
var finalD	 		= String(mon.getFullYear()+"-"+(Number(mon.getMonth())+1)+"-"+mon.getDate());
var startWeek		= finalD;
var maxGamesPerTray	= 100;


var myDelay = 5000; // 5s
var myCurrentSlide, trayStart, trayEnd, mySlideTimer, myIndervalID;
var trayCount = 0;
var ScoreLock = false;

var controlOffset;



function addScript()
{
	if(forcedate)
	{
		startWeek 	= forcedate;
	}

     //var cluster_url = 'http://leaguestat.cluster.devel.commer.com/feed/index.php?feed=sitekit&key=4b83c0c575011359&client_code=ahl&view=scorebar&date=2011-02-15&fmt=json&callback=?';
	 //var cluster_url = "http://cluster.leaguestat.com/lsconsole/json.php?client_code=" + client_code + "&league_code=" + league_code + "&type=" + type + "&forcedate=" + startWeek+'&fmt=json&callback=?';
 	 var cluster_url = 'http://cluster.leaguestat.com/feed/index.php?feed=sitekit&key=4b83c0c575011359&client_code=' + client_code + "&view=" + type + "&date=" + startWeek+'&fmt=json&callback=?';

	 $.getJSON(cluster_url, function(data) {
		var configStr = null;
		var tomorrowData = data.SiteKit.Scorebar.date3;
		var todayData = data.SiteKit.Scorebar.date2;
		var preData = data.SiteKit.Scorebar.date1;
		//console.log(tomorrowData, todayData, preData);
		load(configStr, todayData, preData, tomorrowData);
	 });
}
var gameDay =  gauge = count = 0;
var tray	= 1;
var arr = Num = Game = League = {};
var Game;


monthNames	= ["month","Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
var vScore = hScore = 0; // RESET

function load(configStr,todayData,preData,tomorrowData)
{
	arr			= preData;
	//arr			= eval('(' + todayData + ')');
	str			= configStr;
	total = 0;
	//scoreMe(preData,tomorrowData);
	scoreMe(todayData,tomorrowData);
}



//function scoreMe(preData,tomorrowData)
function scoreMe(todayData,tomorrowData)
{
	//League		= eval(str.Strings);
	var key, Num = 0;
	for(key in arr) {
		Num++;
	}
	var fullwidth;
	var trayOut = tray;

	if(Num > 0)
	{
		for(var i=0; i < parseInt(Num); i++)
		{
			Game = eval('arr.game'+(i+1));
			if (Game) {
				total++;
				if((gauge % maxGamesPerTray) == 0)
				{
				count = 1;
				var parentNT 		= document.getElementById('tray').parentNode;
				var cloneTray 		= document.getElementById('tray').cloneNode(true);
				cloneTray.setAttribute('id','tray'+count);
				cloneTray.getElementsByTagName('legend')[0].innerHTML = League['TXT_LEAGUE_NAME'];
				parentNT.appendChild(cloneTray);
				// RATCHET TRAY COUNT
				tray++;

				gauge = 0;
				}

				gauge++;
				var hScore = 0;
				var vScore = 0;

				var sb		= document.getElementById('sbClone');
				var trayCont= document.getElementById('tray'+count);

				var clone 	= sb.cloneNode(true);
				clone.setAttribute('id','target');

				if(gameDay === 0)
				{
					clone.className='scoreBox yesterday';
				}
				else if(gameDay === 1)
				{
					clone.className='scoreBox current';
				}
				else if(gameDay === 2)
				{
					clone.className='scoreBox tomorrow';
				}

				gd = Game.Date.split("-");
				d = new Date(gd[0],gd[1] - 1,gd[2]);
				if(Game.SmallStatus.toUpperCase() == 'PRE-GAME')
				{
					clone.getElementsByTagName('h3')[0].innerHTML 	  = dateFormat(d,"mmm d") + " " + Game.ScheduledTime;
					//clone.getElementsByTagName('span')[0].innerHTML   = Game.SmallStatus.toUpperCase();
				}
				else
				{
					clone.getElementsByTagName('h3')[0].innerHTML 	  = dateFormat(d,"mmm d") + ": " + Game.SmallStatus.toUpperCase();
				}

				if (Game.StatusID == 1) { // pre-game
					hScore = '-';
					vScore = '-';
				} else {
					hScore = Game.HomeGoals;
					vScore = Game.VisitorGoals;
				}

				var dl = clone.getElementsByTagName('dl');
				dl[1].getElementsByTagName('dt')[0].innerHTML = Game.HomeCode;
				dl[1].getElementsByTagName('dd')[0].innerHTML = hScore;
				dl[0].getElementsByTagName('dt')[0].innerHTML = Game.VisitorCode;
				dl[0].getElementsByTagName('dd')[0].innerHTML = vScore;

				if(Boolean(Game.GameSummaryUrl))
				{
					clone.setAttribute('onclick','location.href="'+Game.GameSummaryUrl+'"');
				}
				else
				{
					if (Game.StatusID != 1) { // pre-game
						clone.setAttribute('onclick','location.href="/stats/schedule.php?date='+Game.Date+'"');
					} else {
						clone.setAttribute('style','cursor: default');
					}
				}
				clone.removeAttribute('id');
				trayCont.appendChild(clone);
                                
				fullwidth = parseInt(95 * total + 40);
                                
				$('#tray1').css('width',fullwidth);
			}
		}
	}
	gameDay++;
	if(gameDay != 3)
	{
	//preData,tomorrowData
		if(gameDay === 1)
		{
			arr			= todayData;
			scoreMe(todayData,tomorrowData);
		}
		else if(gameDay === 2)
		{
			arr			= tomorrowData;
			scoreMe(todayData,tomorrowData);
		}
	}
	else
	{
		gameDay = 0;

		if(count === 0)
		{
			// CHECK FOR BACKUP DATE AND RETRY
			if(forcedate && !checked)
			{
				checked 	= true;
				startWeek 	= forcedate;
				addScript();
			}
			else
			{
				// WE GOT NUTT'N, CLOSE'R UP
				aotc();
				$('#scoreBoard').html('<h3 class="noGameData">No Game Data Available</h3>');
				$('#scoreBoard').slideUp('slow');
			}
		}
		else
		{
			aotc();
			$('#scoreBoard h6').remove();
			$('#scoreBoard fieldset:first').css('display','block');
			//SCORES.init(); // HAND OFF
			$('#scoreBoard fieldset').not(':first').css({ left: -($('#scoreBoard').width()) + controlOffset,display: 'block'} )
			var totalYesterday = 0;
                        var totalToday = 0;
                        var totalTomorrow = 0;
                        var countYes = 0;
                        var countTod = 0;
                        var countTom = 0;
                        
			$('.scoreBox.yesterday').map(function () { countYes++; totalYesterday += $(this).width(); });
                        $('.scoreBox.current').map(function () { countTod++; totalToday += $(this).width(); });
                        $('.scoreBox.tomorrow').map(function () { countTom++; totalTomorrow += $(this).width(); });
                        maxWidth = 10*95;
			//if(totalMiddle < maxWidth) {
                                //roomLeft = maxWidth-totalMiddle/95;
				//$('.scoreBox').map(function () { totalMiddleAll = totalMiddleAll + $(this).width(); });
				//totalMiddleAll = totalMiddleAll-totalMiddle;
			//}
			//widthscroll = totalMiddle/95;
			//widthscroll = Math.round(widthscroll/2);
			//widthscroll = widthscroll*95;
			//alert('Yesterday is '+ totalYesterday + "\n" + 'Today is '+totalToday+"\n"+'Tomorrow is '+totalTomorrow);
			//console.log(total);
			//if (total > 10) {
                                //left=blue+floor(pink/2) and right=yellow+ceil(pink/2).
                                //alert(countYes + ' and '+countTom);
                                var left = (countYes+Math.floor(countTod/2)) * 95;
                                var right = countTom+Math.ceil(countTod/2);
                                alert(left);
                                $("#tray1").animate({"left": "-="+left+"px"}, "fast");
                                //alert(left + ' and '+right);
                                //var add = 0;
                               // if (left<right) {
                                //    add = (right-left-1) * 95;
                                //    $("#tray1").animate({"left": "-="+add+"px"}, "fast");
                               // }
                                
                               // if (right<left) {
                               //     add = (left-right-1) * 95;
                                   // $("#tray1").animate({"left": "+="+add+"px"}, "fast");
                               // }
                               // $("#tray1").animate({"left": "-=617px"}, "fast");
			//}
		}
	}
}

function aotc()
{
	document.getElementById('tray').parentNode.removeChild(document.getElementById('tray'));
	document.getElementById('sbClone').parentNode.removeChild(document.getElementById('sbClone'));
}

function countProperties(obj)
{
	var prop;
	var propCount = 0;
	for (prop in obj) {
		propCount++;
	}
	return propCount;
}
function Get(e)
{
	return document.getElementById(e);
}