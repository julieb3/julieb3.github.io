<?php
if(!empty($_POST["send"])) {
	$name = $_POST["userName"];
	$email = $_POST["userEmail"];
	$subject = $_POST["subject"];
	$content = $_POST["content"];

	$conn = mysqli_connect("localhost", "root", "test", "blog_samples") or die("Connection Error: " . mysqli_error($conn));
	mysqli_query($conn, "INSERT INTO tblcontact (user_name, user_email,subject,content) VALUES ('" . $name. "', '" . $email. "','" . $subject. "','" . $content. "')");
	$insert_id = mysqli_insert_id($conn);
	//if(!empty($insert_id)) {
	   $message = "Your contact information is saved successfully.";
	   $type = "success";
	//}
}
require_once "contact.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juliette Bricker | Toronto & Saskatoon Based Designer</title>
    <link rel="icon" href="../icons/favicon.png">
    <link href="https://fast.fonts.net/cssapi/7b6fce8a-1d50-49d6-9271-b3b14a0ac385.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/flexboxgrid.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/processing.js"></script>
    <script src="../js/jquery.lettering.js"></script>
    <script src="../js/circletype.min.js"></script>
  </head>
  <body>

      <header>
        <nav>
          <ul class="nav-list flexin">
              <a href="../index.html#my-work"><li>work</li></a>
              <a href="about.html"><li>about</li></a>
              <li class="current">contact</li>
            </ul>
        </nav>
      </header>

      <main class="container-fluid">
        <div class="form-container">
            <form name="frmContact" id="" frmContact"" method="post"
                action="" enctype="multipart/form-data"
                onsubmit="return validateContactForm()">

                <div class="input-row">
                    <label style="padding-top: 20px;">Name</label> <span
                        id="userName-info" class="info"></span><br /> <input
                        type="text" class="input-field" name="userName"
                        id="userName" />
                </div>
                <div class="input-row">
                    <label>Email</label> <span id="userEmail-info"
                        class="info"></span><br /> <input type="text"
                        class="input-field" name="userEmail" id="userEmail" />
                </div>
                <div class="input-row">
                    <label>Subject</label> <span id="subject-info"
                        class="info"></span><br /> <input type="text"
                        class="input-field" name="subject" id="subject" />
                </div>
                <div class="input-row">
                    <label>Message</label> <span id="userMessage-info"
                        class="info"></span><br />
                    <textarea name="content" id="content"
                        class="input-field" cols="60" rows="6"></textarea>
                </div>
                <div>
                    <input type="submit" name="send" class="btn-submit"
                        value="Send" />

                    <div id="statusMessage">
                            <?php
                            if (! empty($message)) {
                                ?>
                                <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js"
            type="text/javascript"></script>
        <script type="text/javascript">
            function validateContactForm() {
                var valid = true;

                $(".info").html("");
                $(".input-field").css('border', '#e0dfdf 1px solid');
                var userName = $("#userName").val();
                var userEmail = $("#userEmail").val();
                var subject = $("#subject").val();
                var content = $("#content").val();

                if (userName == "") {
                    $("#userName-info").html("Required.");
                    $("#userName").css('border', '#e66262 1px solid');
                    valid = false;
                }
                if (userEmail == "") {
                    $("#userEmail-info").html("Required.");
                    $("#userEmail").css('border', '#e66262 1px solid');
                    valid = false;
                }
                if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
                {
                    $("#userEmail-info").html("Invalid Email Address.");
                    $("#userEmail").css('border', '#e66262 1px solid');
                    valid = false;
                }

                if (subject == "") {
                    $("#subject-info").html("Required.");
                    $("#subject").css('border', '#e66262 1px solid');
                    valid = false;
                }
                if (content == "") {
                    $("#userMessage-info").html("Required.");
                    $("#content").css('border', '#e66262 1px solid');
                    valid = false;
                }
                return valid;
            }
      </script>
      </main>



      <footer>
        <div class="footback">
          <div class="foot-content container-fluid">
            <div class="row">
              <div class="spotify col-xs-6 col-md-4">
                <a href="https://open.spotify.com/playlist/2813ULlef6p7grEXxzQD3w?si=JGbz-wp6S6alJkpEZl4vlA" target="_blank" rel="noopener noreferrer"><img src="../images/spotify.png" alt="Spotify scan code" ></a>
              </div>
            </div>
            <div class="foot-text row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <p class="padme">Want to talk or know more? Email me at <a class="secondary">juliette.bricker@gmail.com</a></p>
                  <!-- <p class="contact-foot">juliette.bricker@gmail.com</p> -->
              </div>
            </div>
            <div class="row flexin">
              <div class="socials flexin col-xs-6">
                <a class="my-icon" href="https://www.linkedin.com/in/juliette-bricker-a51b43160/" target="_blank" rel="noopener noreferrer"><img src="../icons/link.png" alt="Linkedin Link" ></a>
                <a class="my-icon" href="https://the-dots.com/users/juliette-bricker-862649" target="_blank" rel="noopener noreferrer"><img src="../icons/dots.png" alt="The Dots Link" ></a>
                <a class="my-icon" href="https://www.instagram.com/juliette.bricker/" target="_blank" rel="noopener noreferrer"><img src="../icons/insta.png" alt="Instagram link" ></a>
              </div>
              <p class="credit end-xs col-xs-6 ">Coded with endless cups of Earl Grey tea. <br> © Juliette Bricker 2021</p>
            </div>
          </div>
        </div>

      </footer>
    <script src="../js/scripts.js" defer></script>
    <!-- Processing Background -->
    <div>
      <script type="text/processing">
      ArrayList <Particle> particles = new ArrayList<Particle>();//Generate new particles in a list
      boolean cycle = true;
      void setup() {
        size(2000, 5000);
        noStroke();
        rectMode(CENTER);
      }
      void draw() {
        background(255,255,255);
        // continually add new particles
        particles.add(new Particle());
        for ( int i = 0; i< particles.size(); i++) {
          if (particles.get(i).isAlive()==false) {
            particles.remove(i);
          }// remove particles after lifetime runs out
          particles.get(i).display();
          particles.get(i).move();//return a particle object
        }
      }
      void mouseClicked(){
        if( cycle == true){
          cycle = false;
        }
        else{
          cycle = true;
        }
      }
      class Particle{
        //Properties
        PVector location;
        PVector velocity;
        int size;// dimensions AKA size of particle
        boolean alive; // Boolean used to detect whether a particle is alive and if not remove it
        float LIFETIME = random(10,600); // how many frames a particle lives
        int steps;// counts frames
        //Constructor
        Particle(){
          velocity = new PVector(random(-1,1), random(-1,1));
          location = new PVector(random(0,width), random(0,height)); //location initialized
          size = 20;
          steps = 0;
          alive = true;// when created the particle is alive
        }
        //Functions
        void move(){
          location.add(velocity);
          steps++;// increase steps each time draw loops
          if(steps> LIFETIME){// kill it when it hits life time
            alive = false;
          }
        }
        void display(){
          // push and pop so rotation axis is in the middle of the square not the top corner
          pushMatrix();
          translate(location.x, location.y);
          if (cycle == true){
            fill(255,205,225,map(steps,0,LIFETIME,200,0));
          }
          else{
            fill(255,205,120,map(steps,0,LIFETIME,200,0));
          }

          scale(map(steps,0,LIFETIME,0,2));
          //rotate(radians(steps*2));// spin the degrees of steps times 2
          ellipse(0,0,size,size);
          popMatrix();
        }

        boolean isAlive(){
          return alive;
        }
      }
      </script>
      <canvas id="sketch" ></canvas>
    </div>
  </body>
</html>
