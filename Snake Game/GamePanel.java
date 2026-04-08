import java.awt.*;
import java.awt.event.*;
import javax.swing.*;
import java.util.Random;
import java.util.ArrayList;


public class GamePanel extends JPanel implements ActionListener{
   
   private final int SCREEN_WIDTH = 600;
   private final int SCREEN_HEIGHT = 600;
   private final int UNIT_SIZE = 25;
   private final int GAME_UNIT = (SCREEN_WIDTH * SCREEN_HEIGHT) / UNIT_SIZE;
   Random random;
   int DELAY = 100;
   char keyChar;
   char direction;
   char currentDirection;
   ArrayList<Point> snakeBody;
   int appleX;
   int appleY;
   boolean running = false;
   Timer timer;
   JLabel label;
   int keyCode; 
   boolean run = false;
   int appleEaten;
   int response;
   static boolean SWITCH = false;
   
   GamePanel(){
      
      this.setPreferredSize(new Dimension(SCREEN_WIDTH, SCREEN_HEIGHT));
      this.setBackground(new Color(0,100,0));
      this.setFocusable(true);
      this.addKeyListener(new myKeyAdapter());
      label = new JLabel();
      random = new Random();
      
      snakeBody = new ArrayList<>();
      snakeBody.add(new Point(300,300));
      
      startGame();
      
      
   }
   public void startGame(){
      
      newApple();
      running = true;
      timer = new Timer(DELAY, this);
      timer.start();
      direction = 'e';
      currentDirection = 'e';
      
      
   }
   public void actionPerformed(ActionEvent e){
     
   
      if(running){
      move();
      checkCollision();
      repaint();
      }
   }
   
   
   public void paintComponent(Graphics g){
      super.paintComponent(g);
      
      snake(g);
      apple(g);
      makingGridLines(g);
      
      
   }
   
   public void makingGridLines(Graphics g){
   
      Graphics2D g2D = (Graphics2D) g;
      
      for(int i = 0; i < SCREEN_HEIGHT/UNIT_SIZE; i++){
         //g2D.drawLine(0, i*UNIT_SIZE, SCREEN_WIDTH, i*UNIT_SIZE);   
         //g2D.drawLine(i*UNIT_SIZE, 0, i*UNIT_SIZE, SCREEN_HEIGHT);  
  }
  }
  public void snake(Graphics g) {
    Graphics2D g2D = (Graphics2D) g;

    // Draw the head of the snake
    Point head = snakeBody.get(0);
    g2D.setColor(new Color(0, 200, 0));
    g2D.fillOval(head.x, head.y, UNIT_SIZE, UNIT_SIZE);

    // Draw the rest of the snake body
    for (int i = 1; i < snakeBody.size(); i++) {
        Point p = snakeBody.get(i);
        g2D.setColor(Color.green);
        g2D.fillOval(p.x, p.y, UNIT_SIZE, UNIT_SIZE);
    }
}

  public void apple(Graphics g){
      Graphics2D g2D = (Graphics2D) g;
      
      g2D.setColor(Color.red);
      g2D.fillOval(appleX, appleY, UNIT_SIZE, UNIT_SIZE);
  }
  public void newApple(){
      appleX = random.nextInt((int) (SCREEN_WIDTH/UNIT_SIZE)) * UNIT_SIZE;
      appleY = random.nextInt((int) (SCREEN_HEIGHT/UNIT_SIZE)) * UNIT_SIZE;
  }
  public void Trees(){
  
  }
  public void grow(){
      Point tail = snakeBody.get(snakeBody.size() - 1);
      snakeBody.add(new Point(tail.x, tail.y));
  
  }
  public void move(){
      Point head = snakeBody.get(0);
      Point newHead = new Point(head.x, head.y);
      
      if(direction == 'w'){
         newHead.y -= UNIT_SIZE;      
      }
      if(direction == 's'){
         newHead.y += UNIT_SIZE;      
      }
      if(direction == 'a'){
         newHead.x -= UNIT_SIZE;      
      }
      if(direction == 'e'){
         newHead.x += UNIT_SIZE;      
      }
      
      
      snakeBody.add(0, newHead);
      snakeBody.remove(snakeBody.size() - 1);
      
      if(newHead.x == appleX && newHead.y == appleY){
         grow();
         newApple();
         appleEaten++;
      }
      
  
  }
  public void checkCollision(){
      Point head = snakeBody.get(0);
         for (int i = 2; i < snakeBody.size(); i++) {
        if (head.equals(snakeBody.get(i))) {
            System.out.println("Self-collision detected at: " + head);
            running = false;
            break;
               
        }
    }
      if(head.x < 0 || head.x >= SCREEN_WIDTH || head.y < 0 || head.y >= SCREEN_HEIGHT){
         running = false;
         System.out.println("Something wrong with wall collision");
         
      }
      if(!running){
         gameOver();
      }
  
  }
  public void gameOver(){
      snakeBody.clear();
      JOptionPane.showMessageDialog(null, "DumbAss your score is only "+appleEaten,null, JOptionPane.ERROR_MESSAGE);
      response = JOptionPane.showConfirmDialog(null, "Try Again?", "Game Over", JOptionPane.YES_NO_OPTION);
      
         if(response == JOptionPane.YES_OPTION){
            snakeBody.clear();
            snakeBody.add(new Point(300,300));
            running = true;
            
         }
         else{
            snakeBody.clear();
            snakeBody.add(new Point(300,300));
            SWITCH = true;
            
         }
         
      
  }
  
  
  
  
  public class myKeyAdapter extends KeyAdapter{
      
      //@Override
        public void keyPressed(KeyEvent e) {
            keyChar = e.getKeyChar();
            keyCode  = e.getKeyCode();
            
            char newDirection = keyChar;

            // Check if the new direction is not opposite to the current direction
            if ((currentDirection == 'w' && newDirection != 's') ||
                (currentDirection == 's' && newDirection != 'w') ||
                (currentDirection == 'a' && newDirection != 'e') ||
                (currentDirection == 'e' && newDirection != 'a')) {
                direction = newDirection;
                currentDirection = newDirection;
                
                
            }
                        
            
            
             
            
        }
     }
    

   
   
   
   
   
   
   
}