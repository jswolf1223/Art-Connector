/**
 * 
 */
$(document)
    .ready(
        function(e) {
            
            
            /*
             * Makes Ajax call to findclosecolor.php.  Returns 10 images with closest dominant rgb values.
             */
            $('#findSimColors').live('click', function(e) {
                e.preventDefault();
                
                $.ajax({
                    url: 'findclosecolor.php',
                    type: 'POST',
                    data: {
                        'rgb': stuff[0]['rgb'],
                    },
                    success: function(data) {

                        stuff = $.parseJSON(data);
                        $('#tester').empty();
                        $('html, body').animate({
                            'scrollTop': $('#tester').offset().top - 50
                        }, 600, 'swing');
                        for (x = 1; x < 11; x++) {
                            $('#tester').append('<div class="thumbs" > <img class="img-responsive"' +
                                stuff[x]["ratio"] + '" id=' + x + ' src="' + stuff[x]['imgpath'] + '">');

                        }
                    }
                })
            });

           
            /*
             *  Displays image clicked on in tester div with emotion and color data.
             */
            $('.img-responsive').live('click', function() {
                $('#mainpic').attr('src', this.src);
                var id = [this.id];
                var idnum = +id;
                stuff[0] = stuff[idnum];
                $('#dominant').html('<h1> Dominant Color:</h1><div style="background-color:rgb(' + stuff[0]["rgb"] + ')">' +
                    '</h1>');
                mainInfo(stuff[0]['firstname'], stuff[0]['lastname'], stuff[0]['title']);
                level(stuff[0]);
                $('html, body').animate({
                    'scrollTop': $('#mainpic').offset().top - 50
                }, 800, 'swing');
                getColors();
                
            });

           
            /*
             * Creates voteForm form for emotion rating.
             */
            $('#submitVote').live('click', function() {
                $('#ranker').append('<div id="voteContain"><img class="columns eight" id="overPic"  src=' +
                    $('#mainpic').attr("src") + '><form name="voteForm" class="columns four" id="voteForm"' +
                    ' method="post" enctype="multipart/form-data"><div id="x">X</div>');
                getEmo($("#voteForm"));
                $('#voteForm').append('<button class="submit submit-vote"' +
                    'id="submitVote2" type="submit">Submit</button></form></div>');
            });

           
            /*
             * Makes Ajax call to vote-on.php.  Passes voteForm ratings to the database.
             */
            $('#submitVote2').live('click', function(e) {
                e.preventDefault();
                var add = $('#maininfo > h1').text().slice(1,-1);
                var form = $('#voteForm').serializeArray()
                form.push({
                    name: 'title',
                    value: add
                });
                $('body').addClass('wait');
                $.ajax({
                    url: "vote-on.php",
                    type: "POST",
                    data: form,
                    success: function(data) {
                        $('#voteContain').remove();
                        var returned = $.parseJSON(data);
                        level(returned);
                        getColors();
                    }
                });
                setTimeout(function() {
                    $('body').removeClass('wait');
                }, 3000);

            });
            
            /*
             * Closes voteContain div when x is clicked.
             */
            $('#x').live('click', function(e) {
                $('#voteContain').remove();
            });
            
          
            /*
             * Makes Ajax call to find-sim.php. Returns 10 most similar artworks to the image displayed 
             * in the app mainpic image with all of their data. Displays the similar images in the 
             * tester div.
             */
            $('#findSim').live('click', function(e) {

                e.preventDefault();
                $('body').addClass('wait');
                $.ajax({
                    url: "find-sim.php",
                    type: "POST",
                    data: {
                        'x': stuff[0]['x'],
                        'y': stuff[0]['y']
                    },
                    success: function(data) {
                        stuff = $.parseJSON(data);
                        $('#tester').empty();
                        getColors();
                        for (x = 1; x < 11; x++) {
                            $('#tester').append('<div class="thumbs" > <img id=' + x +
                                ' class="img-responsive ' + stuff[x]['ratio'] + '" src="' +
                                stuff[x]['imgpath'] + '">');
                        }

                        $('html, body').animate({
                            'scrollTop': $('#tester-container').offset().top - 50
                        }, 600, 'swing');
                    }
                })
                setTimeout(function() {
                    $('body').removeClass('wait');
                }, 3000);
            });
            
           
            $('#findDist').live('click', function(e) {

                e.preventDefault();
                $('body').addClass('wait');
                $.ajax({
                    url: "euclid-diff.php",
                    type: "POST",
                    data: {
                        'imgpath': stuff[0]['imgpath'],
                    },
                    success: function(data) {
                        stuff = $.parseJSON(data);
                        $('#tester').empty();
                        getColors();
                        for (x = 1; x < 11; x++) {
                            $('#tester').append('<div class="thumbs" > <img id=' + x +
                                ' class="img-responsive ' + stuff[x]['ratio'] + '" src="' +
                                stuff[x]['imgpath'] + '">');
                        }

                        $('html, body').animate({
                            'scrollTop': $('#tester-container').offset().top - 50
                        }, 600, 'swing');
                    }
                })
                setTimeout(function() {
                    $('body').removeClass('wait');
                }, 3000);
            });
            
            
            /*
             *  Makes Ajax call to getemotion.php. On success returns 11 images with data on emotional ranking,
             *  dominant color, and palette. Displays images and data in the main app.
             * */
            $('.overlay').click(function(e) {
                e.preventDefault();
                $('body').addClass('wait');   
                $('#main').show();			  // Shows main app window.
                $.ajax({
                    url: "getemotion.php",
                    type: "POST",
                    data: {
                        'emotion': this.id    // Overlay element clicked.
                    },
                    success: function(data) {
                        stuff = $.parseJSON(data);
                        $('#app').html('<img id="mainpic" src=""> <div id="maininfo" class="centered"></div>');
                        $('#mainpic').attr('src', stuff[0]['imgpath']);
                        $('#arrow').html('<img src="images/arrow.svg">')
                        $('#vote').html('<button class="submit full-width submit-vote" id="submitVote" ' +
                            'type="submit">Vote</button><br><button class="submit full-width submit-vote"' +
                            'id="findSim" type="submit">Match by Emotion Wheel </button><br><button class="submit full-width submit-vote"' +
                            'id="findDist" type="submit">Match by Distance </button>');
                        mainInfo(stuff[0]['firstname'], stuff[0]['lastname'], stuff[0]['title']);
                        $('#levels').empty();
                        level(stuff[0]);
                        $('#tester').empty();
                        getColors();
                        $('html, body').animate({
                            'scrollTop': $('#mainpic').offset().top - 50
                        }, 800, 'swing');
                        for (x = 1; x < 11; x++) {
                            $('#tester').append('<div class="thumbs" > <img id=' + x + ' class="img-responsive ' +
                                stuff[x]['ratio'] + '" src="' + stuff[x]['imgpath'] + '">');
                        }
                    }
                })
                setTimeout(function() {
                    $('body').removeClass('wait');
                }, 4000);
            });

            
            /*
             * Takes values from form (image object,first name, last name, title, and users emotion rating for the image )
             * Calls colorThief to find dominant color and palette. 
             * Makes Ajax call to loadimage.php to store data.
             */
            $('#entryForm').submit(
                function(e) {
                    e.preventDefault();
                    var first = $('#fname').val().toLowerCase();
                    var last = $('#lname').val().toLowerCase();
                    var title = $('#title').val().toLowerCase();
                    var ratings = "";
                    var mist = [];
                    $('#emotions').children('input').each(
                        function() {
                            mist.push(this);
                            ratings.concat(this.value);
                        });
                    var sortem = mist.sort(function(obj1,
                        obj2) {
                        return obj1.value - obj2.value;
                    });

                    if (ratings == "33333333") {
                        $('#message').html('<p id="error">Please Rank the artwork</p>');
                        return false;
                    };

                    if ((first == "") || (first == "Artist's First Name")) {
                        $('#message').html('<p id="error">Please Enter a valid First Name</p>');
                        return false;
                    };

                    if ((last == "") || (last == "Artist's Last Name")) {
                        $('#message').html('<p id="error">Please Enter a valid Last Name</p>');
                        return false;
                    };

                    if ((title == "") || (first == "Artwork's Title")) {
                        $('#message').html('<p id="error">Please Enter a valid Artwork Title</p>');
                        return false;
                    };

                    var myImage = document.getElementById("artpic");
                    var colorThief = new ColorThief();		   
                    var palette = JSON.stringify(colorThief.getPalette(myImage, 6));  //  Finds six main rgb values in image. 
                    var rgb = colorThief.getColor(myImage);							  //  Finds dominant rgb value in image.
                    var avgRgb = getAverageColourAsRGB(myImage);
                    var avg = ("" + avgRgb.r + "," + avgRgb.g + "," + avgRgb.b + "");
                    var ratio = "";
                    if (myImage.width < myImage.height)        						  //  Determines aspect ratio of image.
                        ratio = "portrait";
                    var formData = new FormData($(this)[0]);						  //  Takes data from form.
                    formData.append('rgb', rgb);
                    formData.append('ratio', ratio);
                    formData.append('palette', palette);
                    formData.append('avg', avg);
                    $('body').addClass('wait');
                    $
                        .ajax({
                            url: "load-image.php",  			 // Stores formdata in database.
                            type: "POST",
                            data: formData,

                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(data) {
                            	alert(data);
                                $('#main').show();
                                $('#loading').hide();
                                if (!window.stuff) {            //  Creates stuff array if it exists
                                    stuff = [];					
                                }
                                stuff[0] = $.parseJSON(data);	//  Places data returned in the global stuff array.
                                getColors();					//  Gets color data from main image.
                                var mist = [];
                                $('emotions').empty();
                                $('#emotions').children('input').each(function() {
                                    mist.push(this);
                                });
                                var sortem = mist.sort(function(obj1, obj2) {
                                    return obj1.value - obj2.value;
                                });
                                sortem.reverse();
                                $('#levels').empty();
                                $.each(sortem, function(key, value) {
                                    $('#levels').append('<h1 class=' + value.id.toLowerCase() +
                                        '>' + value.id + ': ' + value.value + '</h1>');
                                });
                                $('#message').html(stuff[0].title + 'loaded successfully');
                                $('#vote').html('<button class="submit full-width submit-vote" id="submitVote" ' +
                                        'type="submit">Vote</button><br><button class="submit full-width submit-vote"' +
                                        'id="findSim" type="submit">Match by Emotion Wheel </button><br><button class="submit full-width submit-vote"' +
                                        'id="findDist" type="submit">Match by Distance </button>');
                                 $('#app').html('<img id="mainpic" src=""> <div id="maininfo" class="centered"></div>')
                                $('#artpic').attr('src', 'images/noimg.png');
                                $('#mainpic').attr('src', stuff[0].imgpath);
                                $('#arrow').html('<img alt="" src="images/arrow.svg">');
                                $('#mainpic')[0].scrollIntoView(true);
                                $('#maininfo').html('<h1> \"' + $('#title').val().toLowerCase() + '\"</h1>' + '<h2>' +
                                    $('#fname').val().toLowerCase() + ' ' + $('#lname').val().toLowerCase() + '</h2>');

                            }

                        });
                    setTimeout(function() {
                        $('body').removeClass('wait');
                    }, 3000);

                })
            
                
            /*
             * Validates image type
             */
            $(function() {
                $('#file').change(function() {
                    $('#message').empty();
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match = ["image/jpeg", "image/png", "image/jpg"];

                    if (!((imagefile == match[0]) || (imagefile == match[1]) ||
                            (imagefile == match[2]))) {
                        $('#artpic').attr('src', 'noimg.png');
                        $('#message').html(
                            '<p id="error">Please Select A valid Image File</p>' +
                            '<h4>Note</h4><span id="error_message">' +
                            'Only jpeg, jpg and png Images type allowed</span>');
                        return false;
                    } else {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader
                            .readAsDataURL(this.files[0]);

                    }
                });
            });
            
            
            /*
             * Displays image loaded by the user.
             */
            function imageIsLoaded(e) {
                $('#emotions').empty();
                $('#ent,#spacer').remove();
                $('#image_preview').removeClass('four').addClass('eight');
                $('#fileToUpload').css("color", "green");
                $('#image_preview').css("display", "block");
                $('#artpic').attr('src', e.target.result);
                $('#image_preview').append('<h1 class="twelve columns" id="ent">' +
                    'What Emotions do you want your work to evoke?</h1>');
                getEmo($('#emotions'));
                $('#emotions').append('<button class="submit full-width" id="submitArt"' +
                    'type="submit">Submit</button>');
            }

            
            /*
             *  Sorts emotions in descending order.
             */
            function sortObj(object) {
                var sortable = [
                    ["sadness", object['sadness']],
                    ["joy", object['joy']],
                    ["disgust", object['disgust']],
                    ["fear", object['fear']],
                    ["anticipation", object['anticipation']],
                    ["anger", object['anger']],
                    ["surprise", object['surprise']],
                    ["trust", object['trust']]];
                sortable.sort(function(a, b) {
                    return a[1] - b[1];
                });
                sortable.reverse();

                return (sortable);

            }
            
            
            /*
             * Displays emotions with their ranking in descending order.  Emotion's div background
             * color sync with plutchik wheel color.
             */
            function level(value) {
                $('#levels').empty();
                var sorted = sortObj(value);
                for (x = 0; x < 8; x++) {
                    $('#levels').append('<h1 class=' + sorted[x][0].toLowerCase() +
                        '>' + sorted[x][0] + ': ' + sorted[x][1] + '</h1>');
                };


            };
            
            
            /*
             *  Displays artwork title, artist's first name and last name. 
             */
            function mainInfo(first, last, title) {
                $('#maininfo').html('<h1>"' + title + '"</h1><h2>' +
                    first + ' ' + last + '</h2>');
            }

            
            /*
             * Displays emotion wheel with central emotion calculated and denoted by circle position on the wheel. 
             * Displays Dominant color and palette of image.
             */
            function getColors() {

                var palette = $.parseJSON(stuff[0]['palette']);

                $('#dominant').html('<div style="position:relative;" class="columns twelve"' +
                    'id="wheel-container"><img style="position:absolute;top:0px;left:0px"' +
                    'id="wheel" src="images/circlegogradient.svg" style="padding:0">');

                var x = $('#wheel').width() / 2 + ((stuff[0]['x'] / 9) * 100)-12;						// Calculates horizontal position of dot on emotion wheel.
                var y = $('#wheel').width() / 2 + ((stuff[0]['y'] / -9) * 100)-12;						// Calculates vertical position of dot on emotion wheel.
                $('#wheel-container').append('<img src="images/circle.svg" style="height:25px;' +   // Places circle on central emotion on the wheel.
                    'position:absolute;left:' + x + 'px;width:px;top:' + y + 'px;">');
                $('#dominant').append('<div id="colors"><h1> Dominant Color:</h1>' +				// Displays dominant color.
                    '<div style="background-color:rgb(' + stuff[0]['rgb'] + ')"></div>' +
                    '<h1>Palette:</h1>');
                
                for (var x = 0; x < 6; x++) {														// Displays palette.
                    $('#colors').append('<div style=background-color:rgb(' + palette[x] + ');' +    
                        'width:16.65%;float:left;height:60px;></div>');
                }
                $('#colors').append( '<div id="average"><h1>Average Color:</h1><div style="background-color:rgb(' + stuff[0]['rgbavg'] + ')"></div></div>');
                $('#dominant').append('</div>');

                $('#colors').append('<button class="submit submit-vote" id="findSimColors" type="submit">Match By Color</button>');
            }
        });