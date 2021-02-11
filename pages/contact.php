
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
        <?php
     if ($_POST['message']) {
       $message = $_POST['message'];
       $email = $_POST['email'];
       $name = $_POST['name'];
       $headers = "From: ".$name."<".$email.">";

       mail('juliette.bricker@gmail.com', "Contact from RRR", $message, $headers)

       echo "Thanks for contacting us!<br /><br />";
     }
   ?>

   <form action="" method="post">

     Name<br />
     <input type="text" name="name" /> <br />

     Email<br />
     <input type="text" name="email" /><br /><br />

     Message<br />
     <textarea name="message" cols="50" rows="5"></textarea>
     <p><input type="submit" value="Send it!"></p>

   </form>
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
