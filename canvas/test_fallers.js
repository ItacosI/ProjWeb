let bloc;

function setup() {
  createCanvas(500, 350);
  rectMode(CENTER,CENTER);
  bloc = new fallers(2*width/7, 30);
}




class fallers {
  constructor(xi, dyi){
    this.x = xi;
    this.y = 0;
    this.vy = 1;
    this.dy = dyi;
  }

  move(){
    this.vy = this.vy +1;
    this.y = min(this.y + this.vy, height-this.dy/2);
  }
  
  display(){
    rect(this.x, this.y, this.dy, width/8);
  }
}


function draw() {
  background(0);
  bloc.move();
  bloc.display();
  stroke(255);
  strokeWeight(1);
  for(let i=0; i<6; i++){
    line((i+1)*width/7, 0, (i+1)*width/7, height);
  }
}
