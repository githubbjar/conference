<?php
    include "../archives/_viewUtilities.php";
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $collapse = "collapse";
        if (streamingLogin($username,$password)) {
    		session_start();
    		$_SESSION['username'] = $username;
            $collapse = "collapse show";
    		$landingText = '<center><h3 id="about">The 2021 <em>Touchstone</em> Conference</h3><p class="intro">Welcome, '. $username .', we are glad you are joining us!</p>
    		<a type="button" class="btn btn-primary btn-lg" href="https://www.youtube.com/playlist?list=PL0Ctn8Z_Aah-iuc-QDBYqBBLRKY4hmDgH">Proceed to videos</a><br /><br />
            <p class="intro"><a href="https://www.touchstonemag.com/archives/logout.php">Logout</a></p>
            <p class="intro">Please note: As a livestream attendee, you will also have access to the talks when they are posted on the <em>Touchstone </em>website in the coming weeks.</p><br /><br /><br /></center>';
    	    } else {
                header("Location: https://www.touchstonemag.com/archives/login/login-fail.php");
        };	
    };
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--GOOGLE FONT ADDITION-->
    <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet"> 
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.touchstonemag.com/conference/conference.css" />
    
    <meta property="og:type" content="article" />
	<meta property="og:image" content="https://www.touchstonemag.com/conference/social-pic.png" />
	<meta property="og:site_name" content="Touchstone: A Journal of Mere Christianity"/>
	<meta property="fb:app_id" content="1928159247435390" />
    <meta property="og:title" content="No Neutral Ground: The Cost of Discipleship in a Secular Age"/>
    <meta property="og:description" content="The 2021 Touchstone Conference"/>
    <meta property="og:url" content="https://www.touchstonemag.com/conference/index.php"/>
    <!--https://github.com/githubbjar/conference-->

    <title>The 2021 Touchstone Conference</title>
  </head>
  <body>
      
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=1928159247435390&autoLogAppEvents=1" nonce="DqHX3A84"></script>

    <!-- Primary Navigation -->
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #2a465c">
  <div class="container-fluid">
    <a class="navbar-brand" href="https://www.touchstonemag.com/index.php">
        <img src="https://www.touchstonemag.com/bs-components/ts-logo-bootstrap-nav.png" width="350px" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            The 2021 Conference</a>
          </a>
          <ul class="dropdown-menu smooth-scroll" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#about">About</a></li>
            <li><a class="dropdown-item" href="#speakers">Speakers</a></li>
            <li><a class="dropdown-item" href="#venue">Venue</a></li>
            <li><a class="dropdown-item" href="#lodging">Lodging</a></li>
            <li><a class="dropdown-item" href="#tickets">Tickets</a></li>
            <li><a class="dropdown-item" href="#program">Program</a></li>
            <li><a class="dropdown-item" href="https://www.touchstonemag.com/conference/sponsorship.pdf">Sponsorship <img src="pdf-logo-gray.png" /></a></li>
            <li><a class="dropdown-item" href="#contact">Contact</a></li>

          </ul>
        </li>
        
      </ul>
      <form class="d-flex">
        <a class="btn btn-light" data-bs-toggle="collapse" href="#collapseExample" role ="button" aria-expanded="false" aria-controls="collapseExample">Livestream Login</a>
      </form>
    </div>
  </div>
</nav>
    <div class="container">
    <div class="
        <?php 
            if ($_SESSION['username']) {
             echo "collapse show";   
            } else {
              echo "collapse";  
            };
        ?>
        collapse" id="collapseExample">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                <?php 
                echo $landingText;
                
                if (!$_SESSION['username']) {
                
                    echo '
                    <h3 id="about">&#8212; Livestream Login &#8212;</h3>
                    
                    <form name="form1" method="post" action="index.php">
                        <div class="form-group">
    						<p class="date">Email</p>
                            <input  name="username" 
                                    type="text" 
                                    type="email" 
                                    class="form-control" 
                                    id="exampleInputEmail1" 
                                    aria-describedby="emailHelp" 
                                    placeholder="Enter your email address"
                            >
                            <small id="emailHelp" class="form-text text-muted">
                            </small>
                        </div>  
                        <div class="form-group">
                            <p class="date">Password</p>
                            <input  input name="password" 
                                    type="text" 
                                    type="password" 
                                    class="form-control" 
                                    id="exampleInputPassword1" 
                                    placeholder="Enter your password"
                            >
                        </div>
                        <center>
                        <br /><br />
                        <button class="btn btn-primary" name="submit" type="submit" id="submit" value="Log In">Submit</button>
                        </center>
                    </form>
                    <br /><br />'; 
                    
                }; ?>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 copy-box">
                <center>
                    <p class="date"><big><strong>October 14&ndash;16</strong></big><br />
                    Trinity International University&#8212;Deerfield, IL</p>
                    <h1>No Neutral Ground</h1>
                    <h2>The Cost of Discipleship in a Secular Age</h2>
                    
                    <h3 id="about">&#8212; About &#8212;</h3>
                    <p class="intro">The <em>Touchstone </em>conference brings together Protestant, Roman Catholic, and Eastern Orthodox Christians, a tradition-bound gathering of what C. S. Lewis called "Mere Christianity." 
</p>
                    <img src="speakers-trinity.jpg" width="100%" />
                </center>
            </div>        
            <div class="col-sm-6">
                <br />
                   <center>
                    <!--Twitter button-->
                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <!--Facebook button-->
                    <div class="fb-like" data-href="https://www.touchstonemag.com/conference/index.php" data-width="200" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                   </center>
                <a href="https://www.touchstonemag.com/newimages/_conf.jpg" target="_blank" ><img src="https://www.touchstonemag.com/newimages/_conf.jpg" class="poster" /></a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <h3 id="speakers">&#8212; Speakers &#8212;</h3>
            </div>
        </div>
    
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
               <p class="speaker">Hans Boersma</p> 
               <p class="author-intro">is the Saint Benedict Servants of Christ Chair in Ascetical Theology at Nashotah House Theological Seminary, Wisconsin. His work centers upon the retrieval of a sacramental ontology. His books include <em>Heavenly Participation: The Weaving of a Sacramental Tapestry</em> and, most recently, <em>Five Things Theologians Wish Biblical Scholars Knew. </em>Hans and his wife Linda have five children and thirteen grandchildren. He is a Deacon in the Anglican Church in North America and a contributing editor of <em>Touchstone.</em></p>
               <p class="past-talks"><a href="https://www.touchstonemag.com/archives/author.php?id=339">&#9658; Articles from this speaker in <em>Touchstone</em>.</a></p>
            </div>
            <div class="col-sm-4">
                <p class="speaker">Allan Carlson</p>   
                <p class="author-intro">earned his Ph.D. in Modern European History from Ohio University. In 1997 he launched The World Congress of Families, which has since held fifteen major international pro-family and pro-life assemblies, most recently in Verona, Italy. He is also the Founder and President Emeritus of the Howard Center for Family, Religion & Society in Rockford, Illinois, now rebranded as The International Organization for the Family. He continues to serve as Editor of its publication, <em>The Natural Family: An International Journal of Research and Policy</em>.
                <p class="author-intro">Dr. Carlson is the author of fifteen books on questions of family and society. These include: <em>Godly Seed: American Evangelicals Confront Birth Control 1873-1973 </em>(Routledge); <em>The ‘American Way’: Family and Community in the Shaping of the American Identity </em>(Intercollegiate Studies Institute); and <em>The Natural Family Where It Belongs: New Agrarian Essays </em>(Taylor and Francis). His essays have appeared in <em>The Washington Post, Modern Age, The Wall Street Journal, The Journal of Social Issues, Society, The San Diego Law Review, The Chesterton Review, Communio, The University Bookman, </em>and over sixty anthologies. He has been a frequent guest on ABC, CBS, MSNBC, PBS, BBC, and CBC broadcasts and for many other national and international media outlets. He is a senior editor of <em>Touchstone.</em></p>
                <p class="past-talks"><a href="https://www.touchstonemag.com/conferences/christian-pro-family-governments-allan-carlson.php">&#9658; Talks from past <em>Touchstone </em> conferences.</a></p>
                <p class="past-talks"><a href="https://www.touchstonemag.com/archives/author.php?id=110">&#9658; Articles from this speaker in <em>Touchstone</em>.</a></p>
            </div>
            <div class="col-sm-2"></div>
        </div>
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
               <p class="speaker">Rod Dreher</p>
               <p class="author-intro">is the author of <em>Live Not By Lies: A Manual for Christian Dissidents,</em> one of the fastest selling Christian titles of 2020. He also wrote one of the best-selling books of 2018, <em>The Benedict Option: A Strategy for Christians in a Post-Christian Nation.</em></p>

                <p class="author-intro">He is a senior editor at <em>The American Conservative,</em> and has written and edited for <em>Touchstone, </em>the <em>New York Post, The Dallas Morning News, National Review,</em> the <em>South Florida Sun-Sentinel,</em> the <em>Washington Times,</em> and the <em>Baton Rouge Advocate.</em> Rod’s commentary has been published in <em>The Wall Street Journal, Commentary, The Weekly Standard,</em> among other publications. </p>
                <p class="past-talks"><a href="https://www.touchstonemag.com/conferences/st-benedict-rod-dreher.php">&#9658; Talks from past <em>Touchstone </em> conferences.</a></p>
                <p class="past-talks"><a href="https://www.touchstonemag.com/archives/author.php?id=75">&#9658; Articles from this speaker in <em>Touchstone</em>.</a></p>
            </div>
            <div class="col-sm-4">
               <p class="speaker">Anthony Esolen</p>
               <p class="author-intro">is a professor at Magdalene College of the Liberal Arts in Warner, New Hampshire, and the author of many books, including <em>Sex and the Unreal City: The Demolition of the Western Mind</em> (Ignatius), <em>Life Under Compulsion </em>(ISI Books), <em>Real Music: A Guide to the Timeless Hymns of the Church </em>(Tan, with a CD), <em>Out of the Ashes: Rebuilding American Culture </em>(Regnery), and <em>The Hundredfold: Songs for the Lord </em>(Ignatius Press, 2019). Previously he has taught at UNC and Furman University. Dr. Esolen's other publications include: <em>Ten Ways to Destroy the Imagination of Your Child</em> (ISI Press), <em>The Politically Incorrect Guide to Western Civilization </em>(Regnery Press) and <em>Ironies of Faith </em>(ISI Press), and <em>Life Under Compulsion: Ten Ways to Destory the Humanity of Your Child </em>(ISI Press). He is a regular contributor to <em>Touchstone, The Claremont Review, Chronicles, Crisis, American Greatness, Inside the Vatican, Catholic World Report, Magnificat, </em>and <em>Latin Mass.</em> He is also the commentator on the new English translation for the Roman Missal Companion, <em>The Beauty of the Word, </em>which is published by Magnificat.</p>

              <p class="author-intro">Dr. Esolen has dedicated much of his career to a study of the classics. He has translated Dante's <em>Divine Comedy </em>(Random House), Lucretius' <em>On the Nature of Things </em>(John Hopkins University Press), and Torquato Tasso's <em>Jerusalem Delivered </em>(John Hopkins University Press).</p>
                <p class="past-talks"><a href="https://www.touchstonemag.com/conferences/no-option-anthony-esolen.php">&#9658; Talks from past <em>Touchstone </em> conferences.</a></p>
                <p class="past-talks"><a href="https://www.touchstonemag.com/archives/author.php?id=108">&#9658; Articles from this speaker in <em>Touchstone</em>.</a></p>
            </div>
            <div class="col-sm-2"></div>
        </div>
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <p class="speaker">S. M. Hutchens</p>   
                <p class="author-intro">served as a reference librarian for twenty years, retiring in 2015 to become <em>Touchstone</em>'s book review editor. He has been Chairman of the Fellowship of Saint James and is a senior editor of <em>Touchstone, </em>in which most of his writing appears.  He has also published essays and reviews in <em>The New Oxford Review, The Congregationalist, The Southern Baptist Journal of Theology, The Religion and Society Report, The Evangelical Catholic, Sursum Corda, Books and Culture, </em>and <em>The New Atlantis.</em> He and his wife Mary live near Racine, Wisconsin, and have two daughters.</em></p>
                <p class="past-talks"><a href="https://www.touchstonemag.com/conferences/the-benedicine-preacher-s-m-hutchens.php">&#9658; Talks from past <em>Touchstone </em> conferences.</a></p>
                <p class="past-talks"><a href="https://www.touchstonemag.com/archives/author.php?id=37">&#9658; Articles from this speaker in <em>Touchstone</em>.</a></p>
            </div>
            <div class="col-sm-4">
               <p class="speaker">Peter J. Leithart</p>
               <p class="author-intro">is President of the Theopolis Institute in Birmingham, Alabama, and serves as Teacher at Trinity Presbyterian Church (CREC) in Birmingham. He is author, most recently, of <em>Baptism </em>(Lexham, 2021). He and his wife Noel have ten children and fifteen grandchildren. He is a contributing editor of <em>Touchstone.</em></p>
               <p class="past-talks"><a href="https://www.touchstonemag.com/archives/author.php?id=39">&#9658; Articles from this speaker in <em>Touchstone</em>.</a></p>
            </div>
            <div class="col-sm-2"></div>
        </div>
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <p class="speaker">Patrick Henry Reardon</p>
                <p class="author-intro">is a retired pastor in the Orthodox Church who resides in Chicago with his wife Denise. Educated many decades ago at Southern Baptist Theological Seminary in Louisville, St Anselm's College and the Pontifical Biblical Institute in Rome, and St. Tikhon's Orthodox Seminary in South Canaan, PA, he taught at several colleges and two seminaries over the years and pastored congregations in Florida, Oklahoma, Pennsylvania, and Illinois. He has published eleven books and numerous articles, reviews, and editorials in several journals. His most recent book is <em>Out of Step with God: Orthodox Christian Reflections on the Book of Numbers </em>(Ancient Faith Publishing, 2019).</p>
                <p class="past-talks"><a href="https://www.touchstonemag.com/archives/author.php?id=20">&#9658; Articles from this speaker in <em>Touchstone</em>.</a></p>
                <p class="past-talks"><a href="https://www.touchstonemag.com/conferences/fatherhood-and-the-holy-trinity-reardon.php">&#9658; Talks from past <em>Touchstone </em> conferences.</a></p>
            </div>
            <div class="col-sm-4">
                    <p class="speaker">Carl Trueman</p>   
                    <p class="author-intro">(PhD, University of Aberdeen) is professor of biblical and religious studies at Grove City College. He previously served as the William E. Simon Visiting Fellow in Religion and Public Life at Princeton University. Trueman has authored or edited more than a dozen books, including <em>The Creedal Imperative; Luther on the Christian Life;</em> and <em>The Rise and Triumph of the Modern Self.</em></p>
                    <p class="past-talks"><a href="https://www.touchstonemag.com/archives/article.php?id=34-04-043-b">&#9658; Review of <em>The Rise &amp; Triumph of the Modern Self</em> from <em>Touchstone</em></a></p>
                    <p class="past-talks"><a href="https://www.touchstonemag.com/archives/article.php?id=34-05-020-v">&#9658; Articles from this speaker in <em>Touchstone</em>.</a></p>
                </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h3 id="venue">&#8212; Venue &#8212;</h3>
                <center>
                <p class="trinity">Trinity International University</p>
                <p class="trinity-address" >2065 Half Day Road, Deerfield, IL 60015</p>
                <p class="trinity-address">[ <a href="trinityMap.pdf">download detailed campus map, complete with walking paths, parking information, building locations.</a> ]
                </center>
            </div>
            <div class="col-sm-2"></div>
        </div>
        
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-6">
                <img src="trinity-logo.png" width="100%" />
            </div>
            <div class="col-sm-4">
                <img src="trinity-map.png" width="100%" />
            </div>
            <div class="col-sm-1"></div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <h3 id="lodging">&#8212; Lodging &#8212;</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                
            <p class="ticket-info"><em>Rooms at the nearby La Quinta Inn have sold out but you can still book rooms at our conference rate at the following hotels:</em></p>

            <p class="ticket-info"><strong>Homewood Suites </strong>($119/night)<br />
            This hotel is a short walk from Olson Chapel. Call 847-945-9300 and let them know that you want to book a room for the <em>Touchstone </em>conference.</p>

            <p class="ticket-info"><strong>Hampton Inn </strong>($92/night)</br />
            The Hampton Inn is a five minute drive from the Olson Chapel. Please call 847-478-1400 and request a room for the <em>Touchstone</em> conference (booking code: TMC), or you can book your room online by clicking <a href="https://www.hilton.com/en/book/reservation/rooms/?ctyhocn=LINHSHX&arrivalDate=2021-10-14&departureDate=2021-10-16&room1NumAdults=1&cid=OM%2CWW%2CHILTONLINK%2CEN%2CDirectLink">here</a>.</p>

            </div>
            <div class="col-sm-2"></div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <h3 id="tickets" >&#8212; Tickets &#8212;</h3>
                
                <center>
                    
                    <p class="ticket-info">$249 per person for entire access to the conference.</p>
                    <a type="button" class="btn btn-primary btn-lg" href="https://interland3.donorperfect.net/weblink/WebLink.aspx?name=E350987&id=16" >Register today!</a>
                    <p class="ticket-info"><br />Ticket pricing breakdown below.<br /><em>NOTE: Regular Rate &amp; Student Rate registrations cannot be completed in the same transaction. <br />Please register students at the Student Rate separately.</em></p>
                </center>
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8">
                
                <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Type</th>
                          <th scope="col">Price</th>
                          <th scope="col">Rate Ends</th>
                          <th scope="col">Included</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!--<tr>
                          <th scope="row">
                              <a class="btn btn-primary btn-sm" href="https://interland3.donorperfect.net/weblink/WebLink.aspx?name=E350987&id=9">Buy</a>
                              Super Early Bird Rate</th>
                          <td>$179</td>
                          <td>July 16</td>
                          <td>Full access / meals / entire conference</td>
                        </tr> --> 
                        <!--<tr>
                          <th scope="row"><a class="btn btn-primary btn-sm" href="https://interland3.donorperfect.net/weblink/WebLink.aspx?name=E350987&id=13">Buy</a> Early Bird Rate</th>
                          <td>$199</td>
                          <td>September 30</td>
                          <td>Full access / meals / entire conference</td>
                        </tr>-->
                        <tr>
                          <th scope="row"><a class="btn btn-primary btn-sm" href="https://interland3.donorperfect.net/weblink/WebLink.aspx?name=E350987&id=16">Buy</a> Regular Rate</th>
                          <td>$249</td>
                          <td>October 15</td>
                          <td>Full access / meals / entire conference</td>
                        </tr>
                        <tr>
                          <th scope="row">
                              <a class="btn btn-primary btn-sm" href="https://interland3.donorperfect.net/weblink/WebLink.aspx?name=E350987&id=12">Buy</a>
                              Student Rate</th>
                          <td>$19</td>
                          <td>October 16</td>
                          <td>Full access / meals / entire conference</td>
                        </tr>
                        <tr>
                          <th scope="row"><a class="btn btn-primary btn-sm" href="https://interland3.donorperfect.net/weblink/WebLink.aspx?name=E350987&id=17">Buy</a> Thursday Only</th>
                          <td>$75</td>
                          <td>October 14</td>
                          <td>Access to single day / no meals</td>
                        </tr>
                        <tr>
                          <th scope="row"><a class="btn btn-primary btn-sm" href="https://interland3.donorperfect.net/weblink/WebLink.aspx?name=E350987&id=19">Buy</a> Friday Only</th>
                          <td>$150</td>
                          <td>October 15</td>
                          <td>Access to single day / no meals</td>
                        </tr>
                        <tr>
                          <th scope="row"><a class="btn btn-primary btn-sm" href="https://interland3.donorperfect.net/weblink/WebLink.aspx?name=E350987&id=18">Buy</a> Saturday Only</th>
                          <td>$75</td>
                          <td>October 16</td>
                          <td>Access to single day / no meals</td>
                        </tr>
                        <tr>
                          <th scope="row"><a class="btn btn-primary btn-sm" href="https://interland3.donorperfect.net/weblink/WebLink.aspx?name=E350987&id=20">Buy</a> Virtual Access</th>
                          <td>$100</td>
                          <td>October 16</td>
                          <td>Live-streaming access / entire conference</td>
                        </tr>
                      </tbody>
                    </table>
                
            </div>
            <div class="col-sm-2">
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <h3 id="program">&#8212; Program Schedule &#8212;</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <center><p class="ticket-info"><br /><a href="2021TouchstoneConferenceProgram.pdf"><img src="program-thumbnail.jpg" width="250px" /></a></p></center>
                
                <p class="ticket-info">&#8226; Please click the thumbnail above to view a pdf of the program. </p>

                <p class="ticket-info">&#8226; Registration opens at 4 p.m. on  Thursday, the 14th, and the conference should be all wrapped up by 11:30 a.m. on Saturday the 16th.</p>
                
            </div>
            <div class="col-sm-2"></div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <h3 id="contact" >&#8212; Contact &#8212;</h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <center>
                   
                   <p class="ticket-info"><em>Check back for more information as it becomes available.</em></p>
                   
                    <p class="ticket-info">Questions? Contact <u>conference@touchstonemag.com</u>.</p>
                    
                     <p class="ticket-info">NOTE: <em>We do not anticipate that the state of Illinois will impose capacity restrictions relating to COVID-19 into October 2021. However, in the event of such restrictions we will issue a full refund beginning with the most recently purchased tickets until we meet capacity requirements.</em></p>
                     
                     <p><br /></p>
                </center>
            </div>
            <div class="col-sm-3"></div>
        </div>
        
    </div>
    
        
    
    
    <?php include ("../bs-components/footer.php"); ?>

    <!-- JavaScript Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>
