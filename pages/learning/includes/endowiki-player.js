/*

Endoscopy Wiki video player
Code license David Tate 2019.  All rights reserved.

page requirements

jquery.vimeo.api.min.js

<div class='row'>
	<div class='col-9'>
		<h2 id="pageTitle" style="text-align:left;"><?php echo $general->getVideoTitle($id)?></h2>
	</div>
</div>

<div class='row'>
    <div class='col-9'>

        <p id="tagsDisplay" style="text-align: left;">Ideas in this video</p>
    </div>
    <div class='col-3 yellow-light center'>
        <?php
        //echo $currentUserLevel . 'is current user level';
        if ($currentUserLevel == 1){
        
        echo '<div class="row">';
        echo '<div id="chapterEdit" style="text-align:right;">';
        echo '<span style="font-size: 1em;">';
        echo '<i id="editSuper" class="fas fa-edit"></i>';
        echo '</span>';
        echo '</div>';
        echo '</div>';
        }
        ?>
        <div class='row'>
        <div id='chapterSelector' class="focusify-enable">

            <?php echo '<b>Chapter Control</b> ' . $general->getChapterSelector($id)?>
        </div>
        </div>
        <div id='chapterSelectorMessage'></div>

        <div id='chapterSelectorControl' style='text-align: left; padding:4px; font-size:12px;'>
        <div class='row'>
            <div class='col-4'>
                
            </div>
            <div  class='col-1'>
                <i id='video-back' class="fas fa-step-backward"></i>
            </div>
            <div class='col-1'>
                <i id='video-start-pause' class="fas fa-play"></i>
            </div>
            <div  class='col-1'>
                <i id='video-stop' class="fas fa-stop"></i>
            </div>
            <div class='col-1'>
                <i id='video-forward' class="fas fa-step-forward"></i>
            </div>
            <div class='col-4'>
                
            </div>
        </div>
        <div class='row' style='text-align:right;'>
            <label class="container" style=''>Stop after chapter:
                    <input id="triggerStop" type="checkbox">
                    <span class="checkmark"></span>
                </label>
                
            </div>
        </div>
        <div id='row'>
            <div class='col-3 equalHeight' style='font-size:8px;'>Chapter progress:</div>
            <div class='col-9'>
                <div id="myProgress">
                    <div id="myBar"></div>
                </div>
            </div>
        </div>

    </div>


</div>

<div id="vimeoid" style="display:none;"><?php echo $general->getVimeoID($id);?></div>

<div id="videoChapterData" style="display:none;"><?php echo $general->getVideoAndChapterDatav1($id);?>
</div>

<div id="videoChapterTagData" style="display:none;"><?php echo $general->getVideoAndChapterData($id);?>
</div>

<div id="videoData" style="display:none;"><?php echo $general->getVideoData($id);?></div>


<div class='row' style="margin-top:10px;">

    <div class='col-9'>
        <div id='videoDisplay'>

        </div>

    </div>

    <div class='col-3 black whiteborder center' style="min-height:60%;">

        <div id='chapterInfo'>
            <div id='titleBar' class='gentBlue' style='padding:3px;'>
                <p id='videoTitle'><b></b></p>

                <p id='videoDescription'></p>
                <p id='videoAuthor' style='font-size:12px;'><b></b></p>
            </div>
            <p id='chapterHeading' style='padding:8px;padding-top:15px;'>Chapter information will appear
                here during the video</p>





        </div>

        <div id='buttons'></div>
    </div>
</div>




*/


var imagesPassed = "";

var videoDataDefined;

var vimeoID;

var videoLength;

var currentChapter;

var chapterLength;

var chapterpositon;

var chapterStartTime;

var inChapter = 0;

vimeoID = $("#vimeoid").text();



if (videoPassed == "") {

	var edit = 0;

	videoDataDefined = 0;

} else {

	var edit = 1;

	//$('#imageUpload').hide();

	videoDataDefined = 1;


	videoDisplay(vimeoID);



	//constructEditTable;

}

try {

	var videoChapterDataText = $("#videoChapterData").text();

	var videoChapterData = $.parseJSON(videoChapterDataText);

} catch (err) {

	////console.log('No video chapter data received');

}

try {

	var videoChapterTagDataText = $("#videoChapterTagData").text();

	var videoChapterTagData = $.parseJSON(videoChapterTagDataText);

} catch (err) {

	////console.log('No video chapter data received');

}

try {

	var TagDataPerChapter = $("#TagDataPerChapter").text();

	var TagDataPerChapter = JSON.parse(TagDataPerChapter);

} catch (err) {

	////console.log('No video chapter data received');

}



try {

	var videoDataText = $("#videoData").text();

	var videoData = $.parseJSON(videoDataText);

} catch (err) {

	////console.log('No video data received');

}

var files;

var imageID;

var singleTag;

var images = new Object();

var textAreas = new Object();

var selects = new Object();

var selects2 = new Object();

var selects3 = new Object();

var triggerStop = 0;

var chapterSelected = null;

var previousChapter = null;

var nextChapter = null;

var numberofChapters = videoChapterData.length;

var plays = 0;

var playSelectedChapters = null;

var selectedTag = null;

var requiredChapters = null;

var startedConnectedPlayback = null;

var singleInChapter = null;

var stopclicked = null;

var currentChapter = null;

var player = null;

function videoDisplay(url) {



	if (isNormalInteger(url) === true) {

		//can use ?muted=1 here if required

		$('#videoDisplay').html("<iframe id='videoChapter' class='video' src='https://player.vimeo.com/video/" + url + "' frameborder='0' allow='autoplay' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>");

		$('#submitimagefiles').prop('disabled', true);
		$('#video').prop('disabled', true);
		$('#resetVideoSubmit').show();
		$('#videoForm').show();
		$('#url').val(url);

		waitForFinalEvent(function() {
            //alert("Resize...");
                var $window = $(window);
                var $videoWrap = $(document).find('.video-wrap');
                console.log($videoWrap);
                var $video = $(document).find('.video');
                console.log($video);
				var videoHeight = $video.outerHeight();
				$video.css({top: '50%', left: '50%'});

                $window.on('scroll',  function() {
                var windowScrollTop = $window.scrollTop();
                var videoBottom = videoHeight + $videoWrap.offset().top - 200;
                
                if (windowScrollTop > videoBottom) {
					$videoWrap.height(videoHeight);
					$video.addClass('stuck');
					$video.css({top: 'auto', left: 'auto'});
					
                } else {
                    $videoWrap.height('auto');
					$video.removeClass('stuck');
					$video.css({top: '50%', left: '50%'});
                }
				});

				var iframe = document.querySelector('#videoChapter');
				
				player = new Vimeo.Player(iframe);

				player.on('loaded', function(data) {
					addCuePoints();
			
				
				});

            }, 100, 'Wrapper Video');



	} else {


		alert('Invalid vimeo id in record');

	}




}

function getKeyForChapterid(chapterid) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = null;

	$(videoChapterData).each(function (i, val) {

		if (val.chapterid == chapterid) {

			//console.log(i);
			requiredReturn = i;

		}



	})

	return requiredReturn;

}

function getChapterid(chapternumber) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = null;

	var arrayPosition = chapternumber - 1;

	$(videoChapterData).each(function (i, val) {

		if (i == arrayPosition) {

			//console.log(i);
			requiredReturn = val.chapterid;

		}



	})

	return requiredReturn;

}

function getChaptersForGivenTag(tagid) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = new Array;

	var x = 0;

	$(videoChapterTagData).each(function (i, val) {

		if (val.tagid == tagid) {

			//console.log(val.chapterid);

			//check that this chapter is not already in the list
			var n = requiredReturn.includes(val.chapterid);

			if (n == false) {
				requiredReturn[x] = val.chapterid;
			}

			x++;

		}



	})

	return requiredReturn;

}

function getTagsGivenChapter(chapterid) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = new Array;

	var x = 0;
	var y = 0;

	$(TagDataPerChapter).each(function (i, val) {

		if (val.chapterid == chapterid) {

			//console.log(val.chapterid);

			//check that this chapter is not already in the list
			var n = requiredReturn.includes(val.tagid);

			if (n == false) {
				requiredReturn[x] = val.tagid;
			}

			x++;

		}



	})

	return requiredReturn;

}



function getTagName(tagid) {

	//requires videoChapterData
	//gets the key for the required chapter id

	var requiredReturn = new Array;

	var x = 0;

	$(videoChapterTagData).each(function (i, val) {

		if (val.tagid == tagid) {

			//console.log(val.chapterid);

			//check that this chapter is not already in the list
			var n = requiredReturn.includes(val.tagName);

			if (n == false) {
				requiredReturn[x] = val.tagName;
			}

			x++;

		}



	})

	return requiredReturn;

}

function getVideoTime(chapterid, type) {

	$("#videoChapter").vimeo("getCurrentTime", function (data) {

		//$('#videoTime').html("<p class='p-2'>Current time is "+data+" seconds</p>");

		if (type == 0) { //from

			$('#chaptertimefrom' + chapterid).val(data);

		} else if (type == 1) { //from

			$('#chaptertimeto' + chapterid).val(data);
		}

		//console.log( "Current time", data ); 
	})





}

function jumpToTime(time) {


	$("#videoChapter").vimeo("seekTo", time);
	//$("#videoChapter").vimeo("play");

}

function getVideoTags(videoPassed) {


	//event.preventDefault();
	//check videopassed is integer
	
		//get the video start time for this option

		

					try {

						var JSONtoParse = $('#tagsData').text();
						var formData = $.parseJSON(JSONtoParse);

					} catch (error) {

						//console.log ('caught');

					}

					$(formData).each(function (i, val) {

						var id = val.id;
						var tagName = val.tagName;

						$('#tagsDisplay').append('<span class="badge badge-info mx-2 my-0 tagButton" id="tag' + id + '">' + tagName + '</span>');

					})
					//


				



			


		

	}



 //no still used

function getChapterSelectorv2(idSelector, ChapteridSelector) {


	var chapterObject = new Object();

	chapterObject = {
		'id': videoPassed,
	};

	var imagesObject = JSONStraightDataQuery(chapterObject, 'getChapterSelectorAll', 9);

	imagesObject.done(function (data) {

		//console.log(data);

		if (data) {

			if (data) {

				//do the tag thing foreach data

				//console.log(data);

				try {

					var formData = $.parseJSON(data);

				} catch (error) {

					//console.log ('caught');

				}

				var html = "<p>Select Chapter : </p><select id='chapterSelectorVideo" + chapterObject.id + "' class='chapterSelector' style='width:100%;'>";
				html += "<option value hidden selected></option>";

				$(formData).each(function (i, val) {

					var chapterid = val.chapterid;
					var name = val.chaptername;
					var number = val.number;
					//console.log(number + 'is number');
					//var tagName = val.tagName;

					

					html += "<option value='" + chapterid + "'>" + number + " - " + name + "</option>";

					


				})




				html += "</select>";

				$('#chapterSelector').html(html);

				$('#chapterSelectorMessage').html('<p class="small">Showing all chapters');

				$ //(".chapterSelector").fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);

				$('body').find("#chapterSelectorVideo" + idSelector + " option[value='" + ChapteridSelector + "']").prop('selected', true).trigger('change');

			} else {

				alert("Error, try again");

				//enableFormInputs("images");

			}



		}


	});




}  //old

function getChapterSelector(idSelector, ChapteridSelector) {




	var html = "<p>Select Chapter : </p><select id='chapterSelectorVideo" + videoChapterData.id + "' class='chapterSelector' style='width:100%;'>";
	html += "<option value hidden selected></option>";

	$(videoChapterData).each(function (i, val) {

		var chapterid = val.chapterid;
		var name = val.chaptername;
		var number = val.number;
		//var tagName = val.tagName;

		html += "<option value='" + chapterid + "'>" + number + " - " + name + "</option>";


	})




	html += "</select>";

	$('#chapterSelector').html(html);

	$('#chapterSelectorMessage').html('<p class="small">Showing all chapters');

	$ //(".chapterSelector").fadeIn(100).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);

	$('body').find("#chapterSelectorVideo" + idSelector + " option[value='" + ChapteridSelector + "']").prop('selected', true);






}  //old

function undoFilterByTag() {

	startedConnectedPlayback = null;

	playSelectedChapters = null;

	$('body').find('.greenButton, .tagButton').each(function () {

		$(this).removeClass('selectiveTag');

		$(this).removeClass('greenButton').removeClass('bg-gieqsGold').removeClass('text-dark').addClass('tagButton').addClass('bg-gray-800');


	})

	$('.tagFilterDisplayArea').removeClass('bg-gieqsGold').removeClass('text-dark').removeClass('text-sm'); //remove and add gentBlue

	$('body').find('.tagFilterDisplayArea').html('');

	$('.chapterSelector').find('option').each(function () {

		//first remove any previous addition

		if (($(this).text()).indexOf(' -- filtered by highlighted tag') >= 0) {

			//remove it 31

			var textToReplace = $(this).text();

			textToReplace = textToReplace.slice(0, -31);

			$(this).text(textToReplace);


		}



	})

	requiredChapters = null;

	selectedTag = null;

	hideTagBar();

	//window.localStorage.setItem('selectedTag', null);



}

function filterByTag(requestedTag){

	undoFilterByTag();

	requiredChapters = null;

	selectedTag = null;
		//remove all selected tags

		$("#videoChapter").vimeo("pause");

		$('body').find('.tagButton').each(function(){

			$(this).removeClass('selectiveTag');

		})

		//add selected tag to the tag with requestedtag data-tag-id

		$('body').find('.tagButton').each(function(){

			if ($(this).attr('data-tag-id') == requestedTag){

				$(this).addClass('.selectiveTag').addClass('bg-gieqsGold').addClass('text-dark').removeClass('bg-gray-800');

			}else{

				$(this).removeClass('bg-gieqsGold').removeClass('text-dark').addClass('bg-gray-800');

			}	
			
		})

		//set selected tag as requestedtag


		

		//$("#videoChapter").vimeo("pause");

		//set the play only these chapters tag
		playSelectedChapters = 1;


		//add an identifier that this is the tag we are going to show
		//here this is any tag that is associated with this tag

		


		
		//str = str.substring('tag'.length);
		selectedTag = requestedTag;
		//console.log(selectedTag);

		//WRITE THE SELECTED TAG TO LOCAL STORAGE

		showTagBar(selectedTag);

		//make the selected button green and all others blue

		

		//go through the videoChapterTagData object to identify which of these has the required tag, returning an array of chapter ids

		requiredChapters = getChaptersForGivenTag(selectedTag);

		//console.log(requiredChapters);

		//highlight these in red in the chapter selector

		$('.chapterSelector').find('option').each(function () {

			//first remove any previous addition

			if (($(this).text()).indexOf(' -- filtered by highlighted tag') >= 0) {

				//remove it 31

				var textToReplace = $(this).text();

				textToReplace = textToReplace.slice(0, -31);

				$(this).text(textToReplace);


			}

			//console.log($(this));

			if (requiredChapters.includes($(this).val()) === true) {

				$(this).append(' -- filtered by highlighted tag');

				$(this).attr('data', 'view');

			}


		})

		//some alert to the user that this has happened

		//$('.tagFilterDisplayArea').css('background-color', '#4CAF50');
		$('.tagFilterDisplayArea').addClass('bg-gieqsGold').addClass('text-dark').addClass('text-sm');

		if ($('body').find('.tagFilterDisplayArea').find('#taggedChapterDisplay').length == 0) {

			var tagName = getTagName(selectedTag);

			tagName = tagName.toString().toLowerCase();

			$('.tagFilterDisplayArea').append('#taggedChapterDisplay').html('<i style="float:right;" class="fas fa-times remove cursor-pointer"></i><span>Showing chapters tagged <br/>' + tagName + '</span>');

		} else {

			var tagName = getTagName(selectedTag);

			tagName = tagName.toString().toLowerCase();

			$('body').find('.tagFilterDisplayArea').append('#taggedChapterDisplay').html('<i style="float:right;" class="cursor-pointer fas fa-times remove"></i><span>Showing chapters tagged <br/>' + tagName + '</span>');
		}

		//skip the video to the start of the first chapter in the array

		var targetChapter = requiredChapters[0];

		//console.log(targetChapter);

		var targetChapterKey = getKeyForChapterid(targetChapter);

		var targetTime = videoChapterData[targetChapterKey].timeFrom;

		startedConnectedPlayback = 1;

		jumpToTime(targetTime);
		
		waitForFinalEvent(function(){
			
			
			$('#video-start-pause').trigger('click');


		  }, 1000, "play selected part of video");
	

}

function getNextChapter(currentChapterPassed){

	//if playselectedchapters, use requiredChapters array


	if (playSelectedChapters == 1) {


		//try to get next chapter

		var positionOfChapter = requiredChapters.indexOf(currentChapterPassed);

		if (positionOfChapter > 0){

			try {
				
				nextChapter = requiredChapters[positionOfChapter + 1];

				
			} catch (error) {

				nextChapter = null;

				
			}
		}else{

			nextChapter = null;
		}

	}else{

		try {
			
			nextChapter = videoChapterData[currentChapterPassed].chapterid;

		} catch (error) {
			
			nextChapter = null;

		}

	}

	return nextChapter;


		

}

function getPreviousChapter(currentChapterPassed){

	//if playselectedchapters, use requiredChapters array


	if (playSelectedChapters == 1) {


		//try to get next chapter

		var positionOfChapter = requiredChapters.indexOf(currentChapterPassed);

		if (positionOfChapter > 0){

			try {
				
				previousChapter = requiredChapters[positionOfChapter - 1];

				
			} catch (error) {

				previousChapter = null;

				
			}
		}else{

			previousChapter = null;
		}

	}else{

		try {
				
			previousChapter = videoChapterData[currentChapterPassed - 2].chapterid;

		} catch (error) {
			
			previousChapter = null;
		}

	}

	return previousChapter;


		

}

function updateChapterMarkers(currentChapterPassed){

	//when chapter changes or when a tag clicked




	//check if connectedplayback
	//if so make sure to check the other array
	//otherwise set the previousChapter and nextChapter flags

	//if (i > 0) {

		//if the chapter is a skip, skip to next chapter

		//var positionOfChapter = requiredChapters.indexOf(val.chapterid);





		if (playSelectedChapters == 1) {

			//console.log('in the loop');

			var positionOfChapter = requiredChapters.indexOf(currentChapterPassed);

			if (positionOfChapter < 0 && startedConnectedPlayback == null) {

				//this chapter is not in the array

				//skip the video to the first chapter of the array

				var targetChapter = requiredChapters[0];

				//console.log('target chapter for previousChapter '+ targetChapter);

				var targetChapterKey = getKeyForChapterid(targetChapter);

				//console.log('target chapter key for previousChapter ' + targetChapterKey);

				var targetTime = videoChapterData[targetChapterKey].timeFrom;

				//console.log('target start time for  previousChapter ' + targetTime);


				startedConnectedPlayback = 1;

				jumpToTime(targetTime);


			}

			if (positionOfChapter >= 0 && startedConnectedPlayback == 1) {

				if (positionOfChapter == 0) {

					previousChapter = null;

				} else {

					//console.log('positionOfChapter chapter for previousChapter ' + positionOfChapter);

					var requiredChapter = requiredChapters[positionOfChapter - 1];

					//console.log('target chapter for previousChapter ' + requiredChapter);

					var targetChapterKey = getKeyForChapterid(requiredChapter);

					//console.log('target chapter key for previousChapter ' + targetChapterKey);

					////console.log('required previous chapter is ' + requiredChapter);

					previousChapter = videoChapterData[targetChapterKey].chapterid;

					//console.log('previous chapter is ' + previousChapter);
				}

			}




		} else {

			try {
				
				previousChapter = videoChapterData[currentChapterPassed - 2].chapterid;

			} catch (error) {
				
				previousChapter = null;
			}


		}

	//} else {

	//	previousChapter = null;
	//xw}

	//if playSelectedChapters == 1 then should select the previous member of the array


	//if playSelectedChapters == null

		if (playSelectedChapters == 1) {

			var positionOfChapter = requiredChapters.indexOf(currentChapterPassed);

			if (positionOfChapter < 0 && startedConnectedPlayback == null) {

				//this chapter is not in the array

				//skip the video to the first chapter of the array

				var targetChapter = requiredChapters[0];

				////console.log(targetChapter);

				var targetChapterKey = getKeyForChapterid(targetChapter);

				var targetTime = videoChapterData[targetChapterKey].timeFrom;

				startedConnectedPlayback = 1;

				jumpToTime(targetTime);


			}

			if (positionOfChapter < 0 && startedConnectedPlayback == 1) {

				//this chapter is not in the array

				//skip the video to the first chapter of the array

				if (nextChapter) {

					var targetChapter = nextChapter;

					////console.log(targetChapter);

					var targetChapterKey = getKeyForChapterid(targetChapter);

					var targetTime = videoChapterData[targetChapterKey].timeFrom;

					jumpToTime(targetTime);

				} else {

					$("#videoChapter").vimeo("pause");
				}


			}

			if (positionOfChapter >= 0 && startedConnectedPlayback == 1) {

				//this chapter is in the array and the flag was started for connected playback

				var requiredChapter = requiredChapters[positionOfChapter + 1];

				if (requiredChapter) {

					var targetChapterKey = getKeyForChapterid(requiredChapter);

					////console.log('required next chapter is ' + requiredChapter);

					nextChapter = videoChapterData[targetChapterKey].chapterid;

				} else {

					//there is no next chapter in the array
					nextChapter = null;

					//set a flag that this is the end of the connected playback
				}



			}

		} else {


			try {
				
				nextChapter = videoChapterData[currentChapterPassed].chapterid;

			} catch (error) {
				
				nextChapter = null;
			}

		}

}

function addCuePoints(){


	$(videoChapterData).each(function(k,v){


		player.addCuePoint(
			v.timeFrom, 
			
			{id: v.chapterid,

			number: k+1,

			next: getNextChapter(k+1),

			previous: getPreviousChapter(k+1),

			tags: getTagsGivenChapter(v.chapterid)
			}
			
		);

	})

	player.on('cuepoint', function(data) {
		
		console.dir(data)

		//define the chapter number and key for videoChapterData
		var number = data.data.number;
		var key = number - 1;

		//write the headings to the page 
		var chaptername = videoChapterData[key].chaptername;
		var description = videoChapterData[key].description;
		description.replace(/\n/g, '<br>');

		console.log(chaptername);

		$('#chapterHeading').html(chaptername);
		$('#chapterDescription').html(description);
		$('#currentChapter').html(number);
		$('#totalChapters').html(numberofChapters);

		//handle tag changes
		var tags = data.data.tags;

			//handle skip logic
			if (tags.indexOf('254') > -1){

				try {

					var targetTimeSkip = videoChapterData[key+1].timeFrom;

					player.setCurrentTime(targetTimeSkip);
					
				} catch (error) {

					player.pause();
					
				}

				

			}

			//otherwise write tags 

			$(tags).each(function(k,v){

				//find all the tags on the page

				var tagid = v;

				$('body').find('.tagButton').each(function(){

					if ($(this).attr('data-tag-id') == tagid){
		
						$(this).addClass('bg-gieqsGold').addClass('text-dark').removeClass('bg-gray-800');
		
					}else{
		
						$(this).removeClass('bg-gieqsGold').removeClass('text-dark').addClass('bg-gray-800');
		
					}	
					
				})

				//function to highlight


			})




		//set text

		//var description = val.description;

				//var stripped = description.replace(/\n/g, '<br>');

				//////console.log(stripped);



				/* $('#chapterHeadingControl').html('Chapter '+val.number);
				
				$('#chapterDescription').html(stripped);

				$('#currentChapter').html(val.number);
				
				$('#totalChapters').html(numberofChapters); */

		//
		
		//change the chapter playing



	});

	player.on('play', function(data) {

		$('#video-start-pause').trigger('click');

		if ($('#video-start-pause').hasClass('fa-play') === true) {


            if (stopclicked == 1){

                stopclicked = null;

            }else{

                $('#video-start-pause').removeClass('fa-play').addClass('fa-pause');
            
            }

		}



	});

}

$(document).ready(function () {

	//getVideoTags(videoPassed);

	
	

    //writes the chapter heading, description and author information
    $(videoData).each(function (i, val) {

		//$('#videoTitle').html('<p class="veryNarrow" style="font-size:20px;"><b>'+val.name+'</b></p>');

		$('#videoDescription').html('' + val.description + '');

		if (val.centreName == null){
			val.centreName = '';
		}

		//cast centreName to int, if int then don't display TODO

		if (val.centreCountry == null){
			val.centreCountry = '';
		}

		$('#videoAuthor').html('<a class="text-muted" target="_blank" href="'+siteRoot+'pages/account/public-profile.php?id=' + val.authorid + '">' + val.author + ', ' + val.centreName + ', ' + val.centreCountry + '</a>');

	})

    $("body").on('click', '.remove', function () {


		undoFilterByTag();


	})
	
	

	
    
    $("body").on('click', '.tagButton', (function (event) {

		if ($(this).hasClass('selectiveTag') === true) {

			$("#videoChapter").vimeo("pause");
			undoFilterByTag();
			$(this).removeClass('selectiveTag').removeClass('bg-gieqsGold').removeClass('text-dark').addClass('tagButton').addClass('bg-gray-800');
			return;

		}else if ($(this).hasClass('selectiveTag') === false) {

			undoFilterByTag();

			requiredChapters = null;

			selectedTag = null;

			$("#videoChapter").vimeo("pause");

			//set the play only these chapters tag
			playSelectedChapters = 1;


			//add an identifier that this is the tag we are going to show

			$(this).addClass('selectiveTag');
			$('.tagButton').not(this).each(function () {



				$(this).removeClass('selectiveTag');

			})

			var str = $(this).attr('data-tag-id');
			//var str = $('.selectiveTag').prop('id');
			//str = str.substring('tag'.length);
			selectedTag = str;
			//console.log(selectedTag);

			//WRITE THE SELECTED TAG TO LOCAL STORAGE

			showTagBar(selectedTag);

			//make the selected button green and all others blue

			if ($(this).hasClass('tagButton') == true) {

				$(this).addClass('bg-gieqsGold').addClass('text-dark').removeClass('bg-gray-800');

			}

			$(this).siblings().each(function () {

				//console.log($(this));

				$(this).removeClass('bg-gieqsGold').removeClass('text-dark').addClass('bg-gray-800');


			})

			//go through the videoChapterTagData object to identify which of these has the required tag, returning an array of chapter ids

			requiredChapters = getChaptersForGivenTag(selectedTag);

			//console.log(requiredChapters);

			//highlight these in red in the chapter selector

			$('.chapterSelector').find('option').each(function () {

				//first remove any previous addition

				if (($(this).text()).indexOf(' -- filtered by highlighted tag') >= 0) {

					//remove it 31

					var textToReplace = $(this).text();

					textToReplace = textToReplace.slice(0, -31);

					$(this).text(textToReplace);


				}

				//console.log($(this));

				if (requiredChapters.includes($(this).val()) === true) {

					$(this).append(' -- filtered by highlighted tag');

					$(this).attr('data', 'view');

				}


			})

			//some alert to the user that this has happened

			//$('.tagFilterDisplayArea').css('background-color', '#4CAF50');
			$('.tagFilterDisplayArea').addClass('bg-gieqsGold').addClass('text-dark').addClass('text-sm');

			if ($('body').find('.tagFilterDisplayArea').find('#taggedChapterDisplay').length == 0) {

				var tagName = getTagName(selectedTag);

				tagName = tagName.toString().toLowerCase();

				$('.tagFilterDisplayArea').append('#taggedChapterDisplay').html('<i style="float:right;" class="fas fa-times remove cursor-pointer"></i><span>Showing chapters tagged <br/>' + tagName + '</span>');

			} else {

				var tagName = getTagName(selectedTag);

				tagName = tagName.toString().toLowerCase();

				$('body').find('.tagFilterDisplayArea').append('#taggedChapterDisplay').html('<i style="float:right;" class="cursor-pointer fas fa-times remove"></i><span>Showing chapters tagged <br/>' + tagName + '</span>');
			}

			//skip the video to the start of the first chapter in the array

			var targetChapter = requiredChapters[0];

			//console.log(targetChapter);

			var targetChapterKey = getKeyForChapterid(targetChapter);

			var targetTime = videoChapterData[targetChapterKey].timeFrom;

			startedConnectedPlayback = 1;

            jumpToTime(targetTime);
            
            $("#videoChapter").vimeo("play");


		}






    }));
    
    /* $('#triggerStop').change(function () {

		if ($(this).is(':checked')) {

			triggerStop = 1;

			chapterSelected = $('.chapterSelector').val();

		} else {
			triggerStop = 0;
		}

    }); */
    
    $('body').on("click", ".title-fold", (function (event) {

		if ($(this).hasClass('clicked') === false) {

			$(this).addClass('clicked');

			$(this).parent().parent().find('p').each(function () {

				$(this).hide();

			})

			$(this).removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down');

		} else {

			$(this).parent().parent().find('p').each(function () {

				$(this).show();

			})

			$(this).removeClass('clicked');

			$(this).removeClass('fa-chevron-circle-down').addClass('fa-chevron-circle-up');

		}


    }))
    
    $('#myProgress').on('click', function (e) {

		var posX = $(this).offset().left;
		var posWithinBar = e.pageX - posX;

		var lengthOfBar = $(this).width();
		var percentageBar = (posWithinBar / lengthOfBar) * 100;
		//alert(percentageBar);

		//seek video to that position

		/*if (videoLength){

			var percentage = videoLength / 100;

			var percentageVideoTarget = percentage * percentageBar;

			jumpToTime(percentageVideoTarget);


		}*/

		//seek to chapter position

		//globals chapterposition (=current time - starttime)
		//globals chapterlength



		if (videoLength && chapterLength && chapterStartTime) {

			//console.log('percentage bar clicked  ' + percentageBar);

			//console.log('video length is ' + videoLength + ' and chapterLength is '+ chapterLength  + ' and chapter start time is '+ chapterStartTime);


			var percentage = chapterLength / 100;

			var percentageVideoTarget = ((percentage * percentageBar) + parseFloat(chapterStartTime));

			//console.log('percentage is ' + percentage + ' and percentageVideoTarget is '+ percentageVideoTarget);

			jumpToTime(percentageVideoTarget);




		}




	});

    $("#videoChapter").on("pause", function () {

        //console.log('detected pause');

        $('#video-start-pause').removeClass('fa-pause').addClass('fa-play');
        
        

	})

	

	$("#videoChapter").on("playProgress", function (event, data) {
		////console.log( data );



		if ($('#video-start-pause').hasClass('fa-play') === true) {


            if (stopclicked == 1){

                stopclicked = null;

            }else{

                $('#video-start-pause').removeClass('fa-play').addClass('fa-pause');
            
            }

		}

		//if the video is within a known chapter, use that chapter data

		//check the chapter selector

		//chapterSelected = $('.chapterSelector').val();

		//ensure it is 		

		//otherwise first seek 


		singleInChapter = null; //back in a chapter
		//put chapter id as the key


		videoLength = data.duration;
		//console.log('x is '+inChapter);
		inChapter = 0;

		$(videoChapterData).each(function (i, val) {

			//detect if outside a chapter displayed, small function

			//TODO add here is skip tag applied to the chapter move to next chapter


			//skip the rest

			//no tags highlighted
			//no text displayed


			//if not within the chapters displayed alert and reset

			//if a selection of chapters displayed set a variable and skip between these one to the other

			if (val.timeTo != '') {
				if ((val.chapterid == chapterSelected) && (data.seconds >= (val.timeTo - 0.4)) && (triggerStop == 1)) {

					$("#videoChapter").vimeo("pause");

				}
			}



			if ((data.seconds >= val.timeFrom) && (data.seconds <= val.timeTo)) {

				inChapter = 1;

				currentChapter = val.chapterid;
				

				//updateChapterMarkers(currentChapter);


				//update previous and next chapters

				//if playSelectedChapters == null
				//index of this chapter, this chapter + 1 in array of requiredChapters
				if (i > 0) {

					//if the chapter is a skip, skip to next chapter

					//var positionOfChapter = requiredChapters.indexOf(val.chapterid);





					if (playSelectedChapters == 1) {

						//console.log('in the loop');

						var positionOfChapter = requiredChapters.indexOf(val.chapterid);

						if (positionOfChapter < 0 && startedConnectedPlayback == null) {

							//this chapter is not in the array

							//skip the video to the first chapter of the array

							var targetChapter = requiredChapters[0];

							//console.log('target chapter for previousChapter '+ targetChapter);

							var targetChapterKey = getKeyForChapterid(targetChapter);

							//console.log('target chapter key for previousChapter ' + targetChapterKey);

							var targetTime = videoChapterData[targetChapterKey].timeFrom;

							//console.log('target start time for  previousChapter ' + targetTime);


							startedConnectedPlayback = 1;

							jumpToTime(targetTime);


						}

						if (positionOfChapter >= 0 && startedConnectedPlayback == 1) {

							if (positionOfChapter == 0) {

								previousChapter = null;

							} else {

								//console.log('positionOfChapter chapter for previousChapter ' + positionOfChapter);

								var requiredChapter = requiredChapters[positionOfChapter - 1];

								//console.log('target chapter for previousChapter ' + requiredChapter);

								var targetChapterKey = getKeyForChapterid(requiredChapter);

								//console.log('target chapter key for previousChapter ' + targetChapterKey);

								////console.log('required previous chapter is ' + requiredChapter);

								previousChapter = videoChapterData[targetChapterKey].chapterid;

								//console.log('previous chapter is ' + previousChapter);
							}

						}




					} else {

						previousChapter = videoChapterData[i - 1].chapterid;

					}

				} else {

					previousChapter = null;
				}

				//if playSelectedChapters == 1 then should select the previous member of the array


				//if playSelectedChapters == null
				if (i < (numberofChapters - 1)) {

					if (playSelectedChapters == 1) {

						var positionOfChapter = requiredChapters.indexOf(val.chapterid);

						if (positionOfChapter < 0 && startedConnectedPlayback == null) {

							//this chapter is not in the array

							//skip the video to the first chapter of the array

							var targetChapter = requiredChapters[0];

							////console.log(targetChapter);

							var targetChapterKey = getKeyForChapterid(targetChapter);

							var targetTime = videoChapterData[targetChapterKey].timeFrom;

							startedConnectedPlayback = 1;

							jumpToTime(targetTime);


						}

						if (positionOfChapter < 0 && startedConnectedPlayback == 1) {

							//this chapter is not in the array

							//skip the video to the first chapter of the array

							if (nextChapter) {

								var targetChapter = nextChapter;

								////console.log(targetChapter);

								var targetChapterKey = getKeyForChapterid(targetChapter);

								var targetTime = videoChapterData[targetChapterKey].timeFrom;

								jumpToTime(targetTime);

							} else {

								$("#videoChapter").vimeo("pause");
							}


						}

						if (positionOfChapter >= 0 && startedConnectedPlayback == 1) {

							//this chapter is in the array and the flag was started for connected playback

							var requiredChapter = requiredChapters[positionOfChapter + 1];

							if (requiredChapter) {

								var targetChapterKey = getKeyForChapterid(requiredChapter);

								////console.log('required next chapter is ' + requiredChapter);

								nextChapter = videoChapterData[targetChapterKey].chapterid;

							} else {

								//there is no next chapter in the array
								nextChapter = null;

								//set a flag that this is the end of the connected playback
							}



						}

					} else {


						nextChapter = videoChapterData[i + 1].chapterid;

					}
				} else {

					nextChapter = null;
				}

				//if playSelectedChapters == 1 then should select the next member of the array



				var tagName = val.tagName;

				//$('#buttons').html('');

				/* var description = val.description;

				var stripped = description.replace(/\n/g, '<br>');

				//////console.log(stripped);


				$//('#chapterHeading').html(val.chaptername);

				$('#chapterHeadingControl').html('Chapter '+val.number);
				
				$('#chapterDescription').html(stripped);

				$('#currentChapter').html(val.number);
				
				$('#totalChapters').html(numberofChapters); */

				

				/*
			    	
			    	////console.log('tagid is' +val.tagid);
			    	
			    	////console.log('tagName is' +val.tagName);
			    	
					//videoChapterTagData each match the video id and chapter id, get any tags required, highlight them in green

					*/

				if (playSelectedChapters != 1) { //if we are showing specific chapters don't apply this logic as the video plays

					$(videoChapterTagData).each(function (i2, val2) {

						//match this array to the other
						if (val.chapterid == val2.chapterid) {

							//console.log('chapters matched');

							
							//console.log(val2);
							//console.log('tag id'+val2.tagid+' matched and being shown');

							//skip any tag id 254

							if (val2.tagid == '254'){

								//skip detected

								//console.log('tag 90 detected');
								//get the current chapter, skip to the next

								//var targetChapterSkip = positionOfChapter + 1;

								//val contains current chapter data		

								//var targetChapterKeySkip = getKeyForChapterid(targetChapterSkip);

								var targetTimeSkip = videoChapterData[i+1].timeFrom;

								//get time of targetSkip

								jumpToTime(targetTimeSkip);

								//		

							}

							

							//console.log('tag id'+val2.tagid+' matched and being shown');

							var desiredTag = '#tag' + val2.tagid;

							//suggest var desiredTag = $(document).find('.tagButton').find('')

							//console.log(desiredTag);

							$('body').find(desiredTag).addClass('bg-gieqsGold').addClass('text-dark').removeClass('bg-gray-800');



							//copy tag to . tagsActive
							//$('body').find('.tagsActive').prepend('<span class="badge badge-info mx-2 my-2 tagButton" id="tagMirror' + val2.tagid + '">' + val2.tagName + '</span>');
							//console.log(val2.tagid);

							if (!($('body').find('.tagsActive').find('#tagMirror' + val2.tagid).length)){
								//if (val2.tagid == selectedTag){
							$('body').find('.tagsActive').prepend('<span class="badge mx-2 mb-1 bg-dark-dark text-white" data-tag-id="' + val2.tagid + '" id="tagMirror' + val2.tagid + '">' + val2.tagName + '</span>');
								//}else{
								//	$('body').find('.tagsActive').prepend('<span class="badge mx-2 mb-1 bg-gray-800 gieqsGold" id="tagMirror' + val2.tagid + '">' + val2.tagName + '</span>');


								}
							//}

							//TODO HIGHLIGHT THE CLICKED TAG


						} else {

							var desiredTag = '#tag' + val2.tagid;

							

							$('body').find(desiredTag).removeClass('bg-gieqsGold').removeClass('text-dark').addClass('bg-gray-800');


							//remove tag crom tagsActive
							if ($('body').find('.tagsActive').find('#tagMirror' + val2.tagid).length){

								$('body').find('.tagsActive').find('#tagMirror' + val2.tagid).remove();
							}

						}

					})
				}else{

					$(videoChapterTagData).each(function (i2, val2) {

						//macth this array to the other
						if (val.chapterid == val2.chapterid) {

							//console.log('chapters matched');

							
							//console.log(val2);
							////console.log('tag id'+val2.tagid+' matched and being shown');

							//skip any tag id 254

							if (val2.tagid == '254'){

								//skip detected

								//console.log('tag 90 detected');
								//get the current chapter, skip to the next

								//var targetChapterSkip = positionOfChapter + 1;

								//val contains current chapter data		

								//var targetChapterKeySkip = getKeyForChapterid(targetChapterSkip);

								var targetTimeSkip = videoChapterData[i+1].timeFrom;

								//get time of targetSkip

								jumpToTime(targetTimeSkip);

								//		

							}

							

							//console.log('tag id'+val2.tagid+' matched and being shown');

							var desiredTag = '#tag' + val2.tagid;

							//console.log(desiredTag);

							$('body').find(desiredTag).addClass('bg-gieqsGold').addClass('text-dark').removeClass('bg-gray-800');



							//copy tag to . tagsActive
							//$('body').find('.tagsActive').prepend('<span class="badge badge-info mx-2 my-2 tagButton" id="tagMirror' + val2.tagid + '">' + val2.tagName + '</span>');

							if (!($('body').find('.tagsActive').find('#tagMirror' + val2.tagid).length)){

								//IF THE TAG IS THE CLICKED TAG HIGHLIGHT FURTHER

									if (selectedTag != null){

										if (val2.tagid == selectedTag){

											$('body').find('.tagsActive').prepend('<span class="badge mx-2 mb-1 bg-dark-dark gieqsGold" id="tagMirror' + val2.tagid + '">' + val2.tagName + '</span>');


										}else{

											$('body').find('.tagsActive').prepend('<span class="badge mx-2 mb-1 bg-dark-dark text-white" id="tagMirror' + val2.tagid + '">' + val2.tagName + '</span>');
										
											}
									}else{

										$('body').find('.tagsActive').prepend('<span class="badge mx-2 mb-1 bg-dark-dark text-white" id="tagMirror' + val2.tagid + '">' + val2.tagName + '</span>');
									
										}
							}


						} else {

							var desiredTag = '#tag' + val2.tagid;

							

							$('body').find(desiredTag).removeClass('bg-gieqsGold').removeClass('text-dark').addClass('bg-gray-800');


							//remove tag crom tagsActive
							if ($('body').find('.tagsActive').find('#tagMirror' + val2.tagid).length){

								$('body').find('.tagsActive').find('#tagMirror' + val2.tagid).remove();
							}

						}

					})

				}

				/*
			    	
			    	if ($('#buttons').find('#'+val.tagid+'').length == 0){
			    	
			    	//console.log('no button');
			    	
			    	var button = '<button type = "button" id="' + val.tagid + '" class="tagButton">' + tagName + '</button>';
			    	
			    	//console.log(button);
			    	
			    	$('#buttons').append('<button id="' + val.tagid + '" class="tagButton">' + tagName + '</button>');
			    	
			    	}*/

				//$('body').find("#chapterSelectorVideo"+val.id+" option:selected").prop("selected",false);

				//check the selector shows the data for the chapter being displayed

				var chapterTime = val.timeTo - val.timeFrom;

				var currentTime = data.seconds;

				var chapterPercent = ((currentTime - val.timeFrom) / chapterTime) * 100;

				$('#myBar').css('width', chapterPercent + '%');

				//$('#myBar').text(Math.round(chapterPercent) * 1 + '%');

				chapterLength = chapterTime;

				chapterPosition = currentTime - val.timeFrom;

				chapterStartTime = val.timeFrom;

				$('#currentChapterTime').text(Math.round(chapterPercent) * 1 + '%');

				//$('#totalChapterTime').text(Math.round(chapterTime));

				//console.log(chapterStartTime);

				var chapterExists = $('body').find("#chapterSelectorVideo" + val.id + " option[value='" + val.chapterid + "']").length;

				////console.log('chapter exists is' +chapterExists);

				if (chapterExists == 0) {


					//$('.tagButton').removeClass('tagbutton').addClass('greenButton');

					$('.tagButton').removeClass('bg-gieqsGold').removeClass('text-dark').removeClass('text-dark').addClass('bg-gray-800');


					//getChapterSelector(val.id, val.chapterid);

				} else {


					$('body').find("#chapterSelectorVideo" + val.id + " option[value='" + val.chapterid + "']").prop('selected', true);
					//$('body').find("#chapterSelectorVideo" + val.id).trigger('change');

					chapterSelected = val.chapterid;

					//each tagButton
					//check if the tag is in this chapter
					//if so highlight green
					//$('.tagButton').removeClass('greenButton').addClass('tagButton');
					/*
					$('#tagsDisplay').find('button').each(function(){

						var desiredTag = 'tag'+val.tagid;							

						if ($(this).attr('id') == desiredTag){

							$(this).addClass('greenButton').removeClass('tagButton');

							

						}else{

							$(this).removeClass('greenButton').addClass('tagButton');
						}



					})
					*/


				}
				//$('.chapterSelector').val('')

			} else {

				//outside a defined chapter

				currentChapter = null;


			}

		})

		if (inChapter == 0) {


			//console.log(chapterSelected + 'is Chapter selected');

			if (singleInChapter === null) {

				previousChapter = chapterSelected;

				//chapterSelected = null;

				singleInChapter = 1;


			}

			//no match found for chapter

			//set all tags as blue if this is not connected playback

			if (playSelectedChapters === null) {

				$('#tagsDisplay').find('button').each(function () {


					$(this).removeClass('bg-gieqsGold').removeClass('text-dark').addClass('bg-gray-800');



				})

			}



			//add a blank line to the top of the chapter selector and select it

			var chapterselector = "#chapterSelectorVideo" + videoChapterData[0].id;

			var xyz = 0;

			//is there a blank line at the top of the chapter selector		

			$('body').find(chapterselector).find('option').each(function () {

				//console.log($(this).text());

				if ($(this).text() == '(not in a chapter)') {

					xyz++;
				}


			})

			//if there is a blank line don't add another
			//in any event deselect the selected value and go to the blank line

			if ($(chapterselector + " option:selected").text() != '(not in a chapter)') {

				//first discovery that we are not in a chapter

				//change chapterSelected to null

				//previousChapter = chapterSelected;

				//chapterSelected == null;




				//add previousChapter and nextChapter

				//console.log(chapterselector);
				//console.log("xyz is " + xyz);
				if (xyz == 0) {
					$('body').find(chapterselector).prepend("<option value='(not in a chapter)' selected='selected'>(not in a chapter)</option>");
				} else {

					$('body').find(chapterselector).prop('selectedIndex', 0);
				}

			}

			//set chapter progress bar to 0

			$('#myBar').css('width', '0%');

			$('#myBar').text('0%');

			//disable the forward, backward buttons -- done above



			//stop button causes a play button to be shown -- done above

			//remove text from chapter display area

			$('#chapterHeading').html("<p style='text-align:left;'></p><br><p style='text-align:justify;'></p>");

			if (playSelectedChapters == 1) {

				$("#videoChapter").vimeo("pause");

			}




		}



		//create a function

		//gets dataobject including text, chapter number, timefrom and time to

		//somehow compare the object to the data.seconds and display correct chapter

		//serach array of chapter times

		//first > match display this chapter data

    });
    
    $('#video-back').on('click', function (event) {

		event.preventDefault();

		//get current chapter

		//get start of that chapter

		//jump to that time

		if (previousChapter) {

			var previousChapterKey = getKeyForChapterid(previousChapter);

			var previousChapterStartTime = videoChapterData[previousChapterKey].timeFrom;

			//console.log(previousChapterKey);

			var wasChecked = null;

			if ($('#triggerStop').prop('checked') === true) {

				wasChecked = 1;

				$('#triggerStop').prop('checked', false);

				triggerStop = 0;

			}



			jumpToTime(previousChapterStartTime);

			if (wasChecked == 1) {
				$('#triggerStop').prop('checked', true);

				triggerStop = 1;

				chapterSelected = previousChapter;
			}



		}

		//if (inChapter == 1){

		//jumpToTime(chapterStartTime);

		//}


	})

	$('#video-start-pause').on('click', function (event) {

		//first time  

		if (plays == 0) {
			$('#videoChapter').vimeoLoad();
			plays++;
		}

		event.preventDefault();

		if ($(this).hasClass('fa-play') === true) {

			$("#videoChapter").vimeo("play");

			$(this).removeClass('fa-play').addClass('fa-pause');

		} else if ($(this).hasClass('fa-pause') === true) {

			$("#videoChapter").vimeo("pause");

			$(this).removeClass('fa-pause').addClass('fa-play');

		}

		//$('#triggerStop').prop('checked', false);

		//triggerStop = 0;

		plays++;


	})

	$('#video-forward').on('click', function (event) {

		event.preventDefault();

		//get next chapter time

		if (nextChapter) {

			var nextChapterKey = getKeyForChapterid(nextChapter);

			var nextChapterStartTime = videoChapterData[nextChapterKey].timeFrom;

			//console.log(nextChapterStartTime);

			var wasChecked = null;

			if ($('#triggerStop').prop('checked') === true) {

				wasChecked = 1;

				$('#triggerStop').prop('checked', false);

				triggerStop = 0;

			}





			jumpToTime(nextChapterStartTime);

			if (wasChecked == 1) {
				$('#triggerStop').prop('checked', true);

				triggerStop = 1;

				chapterSelected = nextChapter;
			}

		}

		//var nextChapterStartTime = Math.round(chapterStartTime) + Math.round(chapterLength);

		//if (inChapter == 1){




		//}


	})

	$('#video-stop').on('click', function (event) {

		event.preventDefault();

		//get next chapter time

        if (startedConnectedPlayback != null || playSelectedChapters != null){

            undoFilterByTag();

        }

        stopclicked = 1;

        var targetTime = videoChapterData[0].timeFrom;
		
        
        jumpToTime(targetTime);

        $("#videoChapter").vimeo("pause");

        
		


    })
    
    $('body').find('.equalHeight').each(function () {

		var height = $(this).siblings().first().height();
		//console.log(height);
		$(this).css('line-height', height + 'px');


    })

    $('body').on("change", ".chapterSelector", (function (event) {

		//event.preventDefault();

		////console.log('changed');

		var option = $(this).val();

		undoFilterByTag();

		if (option != '(not in a chapter)') {

			//console.log('changed chapter selected value to ' + $(this).val());
			chapterSelected = $(this).val();

			var targetChapterKey = getKeyForChapterid(option);

			var nextChapterStartTime = videoChapterData[targetChapterKey].timeFrom;

			jumpToTime(nextChapterStartTime);

			$("#videoChapter").vimeo("play");

		}

		

		/*
		//get the video start time for this option

		var imagesObject = JSONStraightDataQuery(option, 'getTime', 9);

		imagesObject.done(function (data) {

			////console.log(data);

			if (data) {

				if (data) {

					jumpToTime(data);

				} else {

					alert("Error, try again");

					//enableFormInputs("images");

				}



			}


		});



		//////console.log(tagRow);

		*/


	}));

	$('body').on("click", ".chapterSkip", (function (event) {

		//event.preventDefault();

		////console.log('changed');

		var option = $(this).attr('data-id');

		undoFilterByTag();

		//if (option != '(not in a chapter)') {

			console.log('changed chapter selected value to ' + $(this).attr('data-id'));
			
			chapterSelected = $(this).attr('data-id');

			var targetChapterKey = getKeyForChapterid(option);

			var nextChapterStartTime = videoChapterData[targetChapterKey].timeFrom;

			jumpToTime(nextChapterStartTime);

			$("#videoChapter").vimeo("play");

		//}

		

		/*
		//get the video start time for this option

		var imagesObject = JSONStraightDataQuery(option, 'getTime', 9);

		imagesObject.done(function (data) {

			////console.log(data);

			if (data) {

				if (data) {

					jumpToTime(data);

				} else {

					alert("Error, try again");

					//enableFormInputs("images");

				}



			}


		});



		//////console.log(tagRow);

		*/


	}));
    
    


})