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
      fill(80,75,232,map(steps,0,LIFETIME,200,0));
    }
    else{
      fill(254,255,193,map(steps,0,LIFETIME,200,0));
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
