<?php include "../inc/dbinfo.inc";?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>CSE 412 Videogames Database</title>
  </head>
  <body>
    <h1>
      <img src="VideoGameBanner.jpg" alt="VideoGameBanner" width="1024" height="300"/>
    </h1>
    <div>
      <h1>CSE 412 Videogames</h1>
    </div>
    <div class="Tabs">
      <div onclick="switchTabs(this)" class="tab">Home</div>
      <div onclick="switchTabs(this)" class="tab">Add</div>
      <div onclick="switchTabs(this)" class="tab">Delete</div>
      <div onclick="switchTabs(this)" class="tab">Search</div>
    </div>

    <div class="tab_content_container">
        <div class="tab_content inactive active" id="Home-TabContent">
            <div class="tab_grid_layout">
              <div class="tab_section">
		<h2>Welcome to the Video Game Database</h2>
		<h4>
		  There are several different functions here like:
		</h4>
		<h4>
		  Add - Enter some information and add a new video game to our database!
		</h4>
		<h4>
		  Delete - Found a mistake? Delete it! Just enter some information.
		</h4>
		<h4>
		  Search - Looking for something specific? Enter the ID and BOOM! There you go!
		</h4>
		<h4>
		  Below, hit "submit" to get a list of the current video games in the database.
		</h4>
                <ul>
		  <form name="login" action="Login.php" method="POST">
                    <li><input type="submit" name="submitLogin" /></li>
                  </form>
                </ul>
              </div>
            </div>
        </div>
        <div class="tab_content inactive" id="Add-TabContent">
            <div class="tab_grid_layout">
              <div class="tab_section">
                <h2>Enter Information Here</h2>
                <ul>
                  <form name="insert" action="Login.php" method="POST">
                    <li>Video Game ID: <input type="text" name="vgID" /></li>
                    <li>Video Game Name: <input type="text" name="vgName" /></li>
                    <li>Video Game Engine: <input type="text" name="vgEngine" /></li>
                    <li>Video Game Franchise: <input type="text" name="vgFranchise" /></li>
                    <li>Video Game Description: <input type="text" name="vgDescription" /></li>
                    <li><input type="submit" name="submitAdd"/></li>
                  </form>
                </ul>
              </div>
            </div>
        </div>
        <div class="tab_content inactive" id="Delete-TabContent">
            <div class="tab_grid_layout">
              <div class="tab_section">
                <ul>
                  <form name="delete" action="Login.php" method="POST">
                    <li>Video Game ID: <input type="text" name="vgIDDelete" /></li>
                    <li><input type="submit" name="submitDelete" /></li>
                  </form>
                </ul>
              </div>
            </div>
        </div>
        <div class="tab_content inactive" id="Search-TabContent">
            <div class="tab_grid_layout">
              <div class="tab_section">
                <ul>
                  <form name="search" action="Login.php" method="POST">
                    <li>Videogame ID: <input type="text" name="vgIDSearch" /></li>
                    <li><input type="submit" name="submitSearch" /></li>
                  </form>
                </ul>
              </div>
            </div>
        </div>
    </div>


    <script>
      function initialize()
      {
        //the following function sets all tabs to not display only AFTER they have loaded onto the screen
        //this allows the display to render properly
        var i;

        //this inactivates all tab content once it has loaded and the width has been properly calcualted by the browser
        var tab_contents = document.getElementsByClassName("tab_content");
        for (i = 0; i < tab_contents.length; i++)
        {
                tab_contents[i].classList.add("inactive");
        }

        //this activates the first tab
        var tabs = document.getElementsByClassName("tab");
        for (i = 0; i < tabs.length; i++)
        {
                if(i == 0)
                {
                        tabs[i].classList.add("active");
                        document.getElementById(tabs[i].innerHTML + "-TabContent").classList.add("active");
                }
        }

        document.getElementById("logo_darkmode").classList.toggle("hidden"); //hides darkmode logo
      }

      function switchTabs(element)
      {
        var i;

        var tab; //will be set, this is the element that is the tab being clicked

        if(element.classList.contains("tab")) //tab element being referred to is the passed in element
        {
                tab = element;
        }
        else if(element.nodeName == "TR") //need to find the tab element that is being referred to
        {
                var tab_name = element.getElementsByTagName("td")[0].innerHTML; //get tab_name from innerHTML
                var tabs = document.getElementsByClassName("tab"); //sort through tabs and find corresponding tab element
                for(i=0;i<tabs.length;i++)
                {
                        if(tabs[i].innerHTML == tab_name)
                        {
                                tab = tabs[i]; //sets tab element
                        }
                }
        }

        //removes active class from all tabs
        var tabs = document.getElementsByClassName("tab");
        for(i=0;i<tabs.length;i++)
        {
                tabs[i].classList.remove("active")
                if(tabs[i].innerHTML == tab_name)
                {
                        tab = tabs[i]; //sets tab element
                }
        }

        //removes active class from all tab_contents
        var tab_contents = document.getElementsByClassName("tab_content");
        for (i = 0; i < tab_contents.length; i++)
        {
                tab_contents[i].classList.remove("active");
                tab_contents[i].classList.add("inactive");
        }


        tab.classList.add("active"); //activates clicked tab
        document.getElementById(tab.innerHTML + "-TabContent").classList.add("active"); //finds and activates associated tab_content
      }
      </script>
  </body>
</html>

