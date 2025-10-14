//Pvector Particle Assignment
// Juliette Bricker
// Comp Sci 30
// Help from Mr. Harms

//Generate new particles in a list
ArrayList <Particle> particles = new ArrayList<Particle>();
boolean cycle = true;

void setup() {
  size(600, 600);
  noStroke();
  rectMode(CENTER);
}

void draw() {
  background(230,230,230);
  // continually add new particles
  particles.add(new Particle());                               
  for ( int i = 0; i< particles.size(); i++) {
// remove particles after lifetime runs out
    if (particles.get(i).isAlive()==false) {
      particles.remove(i);
    }
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
