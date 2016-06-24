<!DOCTYPE html>
<!--[if lt IE 8 ]><html class="no-js ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="no-js ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- Basic Page Needs
   ================================================== -->
    <meta charset="utf-8">
    <title>Art Connector</title>
    <meta name="description" content="Art-Connector categorizes art by the emotions an artwork evokes.">
    <meta name="author" content="Sam Wolf">

    <!-- Mobile Specific Metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/media-queries.css">
   
    <!-- Art-Connector Customized Styles 
    ================================================= -->
    <link rel="stylesheet" href="css/custom.css">			
   
    <!-- Script
   =================================================== -->
    <script src="js/modernizr.js"></script>

    <!-- Favicons
	=================================================== -->
    <link rel="shortcut icon" href="favicon.png">
    
     <!-- Font
	=================================================== -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="homepage">

    <div id="preloader">
        <div id="status">
            <img src="images/loader.gif" height="60" width="60" alt="">
            <div class="loader">Loading...</div>
        </div>
    </div>


    <!-- Header
   =================================================== -->
    <header id="main-header">

        <div class="row header-inner">

            <div class="logo">
                <a class="smoothscroll" href="#hero">Art Connector.</a>
            </div>

            <nav id="nav-wrap">

                <a class="mobile-btn" href="#nav-wrap" title="Show navigation"> 
                	<span class='menu-text'>Show Menu</span> <span class="menu-icon"></span>
                </a>
                <a class="mobile-btn" href="#" title="Hide navigation"> <span class='menu-text'>Hide Menu</span> 
                	<span class="menu-icon"></span>
                </a>

                <ul id="nav" class="nav">
                    <li class="current"><a class="smoothscroll" href="#hero">Home.</a></li>
                    <li><a class="smoothscroll" href="#work">Works.</a></li>
                    <li><a class="smoothscroll" href="#about">About.</a></li>
                    <li><a class="smoothscroll" href="#contact">Submit Art.</a></li>
                    <li><a class="smoothscroll" href="#footer">Contact.</a></li>
                </ul>

            </nav>
            <!-- /nav-wrap -->

        </div>
        <!-- /header-inner -->

    </header>


    <!-- Hero
   =================================================== -->
    <br>

    <section id="hero">

        <div class="row hero-content">

            <div class="twelve columns flex-container">

                <div id="hero-slider" class="flexslider">

                    <ul class="slides">

                        <!-- Slide -->
                        <li>
                            <div class="flex-caption">
                                <h1>Art Connector.</h1>
                                <p>
                                    <a class="button stroke smoothscroll" href="#about">More About
										Us</a>
                                </p>
                            </div>
                        </li>

                        <!-- Slide -->
                        <li>
                            <div class="flex-caption wide">
                                <h1>Find artwork that inspires you.</h1>
                                <p>
                                    <a class="button stroke smoothscroll" href="#emote">Browse
										work.</a>
                                </p>
                            </div>
                        </li>

                        <!-- Slide -->
                        <li>
                            <div class="flex-caption wide">
                                <h1>Find similar artwork to your own.</h1>
                                <p>
                                    <a class="button stroke smoothscroll" href="#contact">Upload
										your work</a>
                                </p>
                            </div>
                        </li>

                    </ul>

                </div>
                <!-- .flexslider -->

            </div>
            <!-- .flex-container -->

        </div>
        <!-- .hero-content -->

    </section>
    <!-- #hero -->


    <!-- Portfolio
   ================================================== -->
    <section id="portfolio">

        <div class="row section-head">

            <div class="twelve columns">

                <h1>
					How it works<span>.</span>
				</h1>

                <hr />

                <p>Art Connector categorizes artwork by the emotions that they evoke.
                 The emotions used are based on Robert Plutchik's wheel of emotion, 
                 which diagrams eight basic emotions and their opposites
				 (joy-sadness, trust-disgust, fear-anger and surprise-anticipation).
				 Plutchik theorized that the spectrum of emotions can be diagramed, much like a color wheel.
				 These base emotions would mix with each other and form other more nuanced emotions.
				 Art Connector's categorization is a result of the online communities voting.
				 Connections are formed through similar scoring on the emotion wheel.
				</p>

            </div>

        </div>
        <div class="twelve columns" id="main">
            <div id="levels-container" class="three columns">
                <div id="levels" class="nine columns"></div>
                <div id="arrow" class="three columns"></div>
                <div id="vote" class="twelve columns"></div>
            </div>
            <div id="app" class="six columns">
                <!-- <img id="mainpic" src="">
				<div id="maininfo" class="centered"></div>   -->
            </div>
            <div id="ranker" class="three columns">
                <div id="dominant"></div>
            </div>

            <div class="twelve columns" id="tester-container">
                <div id="tester"></div>
            </div>
        </div>
        <section id="work">
            <h1 class="twelve columns emointro">
				Click to find work that evokes strong emotions of<span class="orange">...</span>
			</h1>

            <div class="row items">

                <div class="twelve columns" id="emote">

                    <div id="portfolio-wrapper" class="bgrid-fourth s-bgrid-third mob-bgrid-half group">

                        <div class="bgrid item">
                            <h5 class="ontop">JOY</h5>
                            <div class="item-wrap">

                                <img src="images/portfolio/birthday.jpg" alt="Chagall">
                                <div class="overlay joy" id="joy">
                                    <div class="portfolio-item-meta">
                                        <h5>JOY</h5>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /item -->

                        <div class="bgrid item">
                            <h5 class="ontop">TRUST</h5>
                            <div class="item-wrap">

                                <img src="images/portfolio/klimt.jpg" alt="Klimt">
                                <div class="overlay trust" id="trust">
                                    <div class="portfolio-item-meta">
                                        <h5>TRUST</h5>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /item -->

                        <div class="bgrid stack item">
                            <h5 class="ontop">FEAR</h5>
                            <div class="item-wrap">

                                <img src="images/portfolio/meat.jpeg" alt="Bacon">
                                <div class="overlay fear" id="fear">
                                    <div class="portfolio-item-meta">
                                        <h5>FEAR</h5>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /item -->

                        <div class="bgrid item">
                            <h5 class="ontop">SURPRISE</h5>
                            <div class="item-wrap">

                                <img src="images/portfolio/apple.jpg" alt="Magritte">
                                <div class="overlay surpise" id="surprise">
                                    <div class="portfolio-item-meta">
                                        <h5>SURPRISE</h5>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /item -->

                        <div class="bgrid item">
                            <h5 class="ontop">SADNESS</h5>
                            <div class="item-wrap">

                                <img src="images/portfolio/frida.jpg" alt="Frida">
                                <div class="overlay sadness" id="sadness">
                                    <div class="portfolio-item-meta">
                                        <h5>SADNESS</h5>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /item -->

                        <div class="bgrid item">
                            <h5 class="ontop">DISGUST</h5>
                            <div class="item-wrap">

                                <img src="images/portfolio/freud.jpg" alt="Freud">
                                <div class="overlay disgust" id="disgust">
                                    <div class="portfolio-item-meta">
                                        <h5>DISGUST</h5>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- /item -->

                        <div class="bgrid item">
                            <h5 class="ontop">ANGER</h5>
                            <div class="item-wrap">

                                <img src="images/portfolio/goya.jpg" alt="Goya">
                                <div class="overlay anger" id="anger">
                                    <div class="portfolio-item-meta">
                                        <h5>ANGER</h5>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /item -->

                        <div class="bgrid item">
                            <h5 class="ontop">ANTICIPATION</h5>
                            <div class="item-wrap">

                                <img src="images/portfolio/wyeth.jpg" alt="Wyeth">
                                <div class="overlay anticipation" id="anticipation">
                                    <div class="portfolio-item-meta">
                                        <h5>ANTICIPATION</h5>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- item end -->

                    </div>
                    <!-- /portfolio-wrapper -->

                </div>
                <!-- /twelve -->

            </div>
            <!-- /row -->
        </section>
    </section>
    <!-- /Portfolio -->





    <!-- About Section
   ================================================== -->
    <section id="about">


        <div class="row section-head">

            <div class="twelve columns">

                <h1>
					About<span>.</span>
				</h1>

                <hr />

                <p>
                 Art Connector is the hobby project of web developer and artist Sam Wolf.
                 The site's goal is to categorize artwork, not by artistic style or medium, 
                 but through the multidimensional spectrum of human emotion.
                 Although it is impossible to quantify something as subjective as emotion, 
                 an approximation can be made by averaging the reactions of a larger sample group.
                 Robert Plutchik believed that, like the primary colors on the color wheel,
                 there are eight base emotions that can interact to create new emotions. 
                 Each base emotion also has an opposite, much like each color has a complimentary color,
                 that cancels it out. An algorithm emulating Plutchik's Wheel,was developed to group 
                 artwork that evokes similar emotions. The user input data on the base emotions is used 
                 to find a central emotion. As the database of artwork and community of voters grows the
                 effectiveness of this categorization method will become apparent. So, please feel free
                 to vote and upload as much of your (or others) artwork as possible.
                </p>
            </div>

        </div>
        <div class="columns twelve emointro">More on the base emotions<span class="orange">.</span></div>

        <hr class="gohr" />

        <div class="row about-content">

            <div class="mob-whole six columns left">
                <img src="images/joy.svg" class="men three columns">
                <div class="nine columns">
                    <h2>joy</h2>
                    <p>/joi/</p>
                    <p>the emotion of great delight or happiness caused by something exceptionally 
                    good or satisfying; keen pleasure; elation:</p>
                    <p><span class='orange'>Spectrum:</span> <span class='mild'>serenity</span> -> 
                    <span class='med'>joy</span> -> <span class='strong'>ecstasy</span>.</p>
                    <p><span class='orange'>Opposite:</span><span class='black'> sadness</span></p>
                    <p>Combines with <span class='black'>trust</span> to create <span class='black'>love</span> 
                    and <span class='black'>anticipation</span> to create <span class='black'>optimism</span>.
                </div>
            </div>
            <!-- /left -->

            <div class="mob-whole six columns right">
                <img src="images/sadness.svg" class="men three columns">
                <div class="nine columns">
                    <h2>sad&#8729;ness</h2>
                    <p>/'sadn<span style=font-size:1.2em>&#x0258;</span>s/</p>
                    <p>an emotional pain associated with, or characterized by, feelings of disadvantage,
					loss, despair, grief, helplessness, disappointment and sorrow.</p>
                    <p><span class='orange'>Spectrum:</span> <span class='mild'>pensiveness</span> -> 
                    	<span class='med'>sadness</span> -> <span class='strong'>grief</span>.</p>
                    <p><span class='orange'>Opposite:</span><span class='black'> joy</span></p>
                    <p>Combines with <span class='black'>disgust</span> to create <span class='black'>remorse</span>
                     	and <span class='black'>surprise</span> to create <span class='black'>disapproval</span>.</p>
                </div>
            </div>
            <!-- /right -->
        </div>
        <!-- /row -->

        <div class="row about-content">

            <div class="mob-whole six columns left">
                <img src="images/trust.svg" class="men three columns">
                <div class="nine columns">
                    <h2>trust</h2>
                    <p>/tr<span style=font-size:1.2em>&#x0258;</span>st/</p>
                    <p>firm belief in the integrity, strength, ability, surety, etc., of a person or thing; confidence.</p>
                    <p><span class='orange'>Spectrum:</span> <span class='mild'>acceptance</span> ->
                    	 <span class='med'>trust</span> -> <span class='strong'>admiration</span>.</p>
                    <p><span class='orange'>Opposite:</span><span class='black'> disgust</span></p>
                    <p>Combines with <span class='black'>joy</span> to create <span class='black'>love</span> and 
                   		<span class='black'>fear</span> to create <span class='black'>submission</span>.</p>
                </div>
            </div>

            <!-- /left -->

            <div class="mob-whole six columns right">
                <img src="images/disgust.svg" class="men three columns">
                <div class="nine columns">
                    <h2>dis&#8729;gust</h2>
                    <p>/dis'g<span style=font-size:1.2em>&#x0258;</span>st/</p>
                    <p>a feeling of revulsion or profound disapproval aroused by something unpleasant or offensive.</p>
                    <p><span class='orange'>Spectrum:</span> <span class='mild'>boredom</span> -> 
                    	<span class='med'>disgust</span> -> <span class='strong'>loathing</span>.</p>
                    <p><span class='orange'>Opposite:</span><span class='black'> trust</span></p>
                    <p>Combines with <span class='black'>sadness</span> to create <span class='black'>remorse</span> and 
                    	<span class='black'>anger</span> to create <span class='black'>contempt</span>.</p>
                </div>

            </div>
            <!-- /right -->

        </div>
        <!-- /row -->
        <div class="row about-content">

            <div class="mob-whole six columns left">
                <img src="images/fear.svg" class="men three columns">
                <div class="nine columns">
                    <h2>fear</h2>
                    <p>/'fir/</p>
                    <p>an unpleasant emotion caused by the belief that someone or something is dangerous,
                    	 likely to cause pain, or a threat.</p>
                    <p><span class='orange'>Spectrum:</span> <span class='mild'>apprehension</span> -> 
                   		 <span class='med'>fear</span> -> <span class='strong'>terror</span>.</p>
                    <p><span class='orange'>Opposite:</span><span class='black'> anger</span></p>	
                    <p>Combines with <span class='black'>surprise</span> to create <span class='black'>awe</span>
                    	 and <span class='black'>trust</span> to create <span class='black'>submission</span>.</p>
                </div>

            </div>
            <!-- /left -->

            <div class="mob-whole six columns right">
                <img src="images/anger.svg" class="men three columns">
                <div class="nine columns">
                    <h2>an&#8729;ger</h2>
                    <p>/'aNGg<span style=font-size:1.2em>&#x0258;</span>r/</p>
                    <p>a strong feeling of annoyance, displeasure, or hostility.</p>
                    <p><span class='orange'>Spectrum:</span> <span class='mild'>annoyance</span> ->
                    	 <span class='med'>anger</span> -> <span class='strong'>rage</span>.</p>
                    <p><span class='orange'>Opposite:</span><span class='black'> fear</span></p>
                    <p>Combines with <span class='black'>anticipation</span> to create <span class='black'>aggressiveness</span> and 
                    	<span class='black'>disgust</span> to <span class='black'>create contempt</span>.</p>
                </div>

            </div>
            <!-- /right -->

        </div>
        <!-- /row -->
        <div class="row about-content">

            <div class="mob-whole six columns left">
                <img src="images/surprise.svg" class="men three columns">
                <div class="nine columns">
                    <h2>sur&#8729;prise</h2>
                    <p>/s<span style=font-size:1.2em>&#x0258;</span>(r)'pr&imacr;z/</p>
                    <p>a feeling of mild astonishment or shock caused by something unexpected.</p>
                    <p><span class='orange'>Spectrum:</span> <span class='mild'>distraction</span> ->
                    	 <span class='med'>surprise</span> -> <span class='strong'>amazement</span>.</p>
                    <p><span class='orange'>Opposite:</span><span class='black'> anticipation</span></p>
                    <p>Combines with <span class='black'>sadness</span> to create <span class='black'>disapproval</span> and
                    	 <span class='black'>fear</span> to create <span class='black'>awe</span>.</p>
                </div>


            </div>
            <!-- /left -->

            <div class="mob-whole six columns right">
                <img src="images/anticipation.svg" class="men three columns">
                <div class="nine columns">
                    <h2>an&#8729;tic&#8729;i&#8729;pa&#8729;tion</h2>
                    <p>/an,tis<span style=font-size:1.2em>&#x0258;</span>'p&amacr;SH(
                    	<span style=font-size:1.2em>&#x0258;</span>)n/</p>
                    <p>an emotion involving pleasure, excitement, and sometimes anxiety in considering some expected
                    	 or longed-for good event.</p>
                    <p><span class='orange'>Spectrum:</span> <span class='mild'>interest</span> ->
                    	 <span class='med'>anticipation</span> -> <span class='strong'>vigilance</span>.</p>
                    <p><span class='orange'>Opposite:</span><span class='black'> surprise</span></p>
                    <p>Combines with <span class='black'>joy</span> to create <span class='black'>optimism</span> and
                    	 <span class='black'>anger</span> to create <span class='black'>aggressiveness</span>.</p>
                </div>


            </div>
            <!-- /right -->

        </div>
        <!-- /row -->

        <!-- journal
   =================================================== -->

        <section id="contact">
            <div class="twelve columns">

                <div class="row section-head">
                    <h1>
						Submit Work<span>.</span>
					</h1>
                    <hr />
                    <p>Upload one of your own pieces and see what emotions it evokes in others!
                    </p>

                </div>

            </div>


            <div class="row form-section">


                <div id="contact-form" class="twelve columns">

                    <form name="entryForm" id="entryForm" method="post" action="portfolio.php" enctype="multipart/form-data">

                        <fieldset>

                            <div class="row">

                                <div class="four columns mob-whole">
                                    <label for="fname">Artist's First Name <span class="required">*</span></label>
                                    <input name="fname" type="text" id="fname" placeholder="Artist's First Name" value="" />
                                </div>

                                <div class="four columns mob-whole">
                                    <label for="lname">Artist's Last Name <span class="required">*</span></label>
                                    <input name="lname" type="text" id="lname" placeholder="Artist's Last Name" value="" />
                                </div>

                                <div class="four columns mob-whole">
                                    <label for="title">Artwork's Title <span class="required">*</span></label>
                                    <input name="title" type="text" id="title" placeholder="Artwork's Title" value="" />
                                </div>
                            </div>

                            <div class="twelve columns mob-whole">
                                <label for="fileToUpload">Submit Artwork File <span
									class="required">*</span></label> <input name="file" type="file" id="file" required>
                            </div>

                            <div class="four columns" id="spacer"></div>
                            <div class="four columns" id="image_preview">
                                <img class="twelve columns" src="images/noimg.png" id="artpic" alt="no image">

                            </div>


                            <div class="four columns" id="emotions"></div>
                            <div>
                                <div class="ten columns" id="message"></div>
                                <div class="ten columns" id="buttoncont"></div>


                            </div>

                        </fieldset>

                    </form>

                </div>


            </div>

        </section>
        <!-- /blog -->




        <!-- Footer
   ================================================== -->
        <section id="footer">
            <footer>

                <div class="row">

                    <div class="six columns tab-whole footer-about">

                        <h3 style="color:black">Contact us</h3>

                        <p>Get in touch to find out more about Art-Connector, or about having 
                        	a custom site built by Sam Wolf Web Designs .</p>


                    </div>
                    <!-- /footer-about -->

                    <div class="six columns tab-whole right-cols">

                        <div class="row">

                            <div class="columns">
                                <h3 class="address">Contact Us</h3>
                                <p>
                                    6461 Come About Way<br> Awendaw, SC<br> 29429 US
                                </p>

                                <ul>
                                    <li><a href="tel:8439917498">843.991.7498</a></li>

                                    <li><a href="mailto:jswolf1223@gmail.com">jswolf1223@gmail.com</a></li>
                                </ul>
                            </div>
                            <!-- /columns -->


                            <!-- /columns -->

                        </div>
                        <!-- /Row(nested) -->

                    </div>

                    <p class="copyright">
                        &copy; Copyright 2016 Art-Connector. Design by <a href="http://www.samwolfart.com/">Sam Wolf.</a>
                    </p>

                    <div id="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#hero"><span>Top</span><i
							class="fa fa-long-arrow-up"></i></a>
                    </div>

                </div>
                <!-- /row -->

            </footer>
        </section>
        <!-- /footer -->


        <!-- Java Script
   ================================================== -->
        <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
         crossorigin="anonymous"></script>
        <script>
            window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')
        </script>
        <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/jquery.fittext.js"></script>
        <script src="js/backstretch.js"></script>
        <script src="js/waypoints.js"></script>
        <script src="js/main.js"></script>
       
       
        <!--  Art-Connector customised script and dependencies.
    ================================================ -->
		<script src="js/custom.js"></script>      
		<script src="js/color-thief.js"></script>         
</body>

</html>