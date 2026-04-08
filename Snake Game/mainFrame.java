import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class mainFrame extends JFrame implements ActionListener{
   
   GamePanel gamePanel;
   
   JLabel label;
   JLabel label2;
   int highScore = 0;
   
   JButton button;
   JPanel panel;
   JPanel panel2;
   JPanel panel3;
   
      
   mainFrame(){
   
         
            
      panel2 = new JPanel();
      panel2.setPreferredSize(new Dimension(140,100));
      panel2.setLayout(new FlowLayout(FlowLayout.LEFT));
      
      panel3 = new JPanel();
      panel3.setPreferredSize(new Dimension(140,100));
      
      label2 = new JLabel("HighScore: "+ String.valueOf(highScore));
      label2.setForeground(Color.black);
      label2.setFont(new Font("Comic Sans", Font.PLAIN, 17));
      
      panel2.add(label2);
      
      
         
      this.setSize(600,600);
      this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
      this.setResizable(false);
      this.setLayout(new BorderLayout());
      
      panel = new JPanel();
      panel.setPreferredSize(new Dimension(500,200));
      panel.setLayout(new FlowLayout(FlowLayout.CENTER, 0, 30));
     
      
      label =  new JLabel();
      label.setText("Snake Game");
      label.setFont(new Font("Comic Sans", Font.PLAIN, 50));
      label.setForeground(Color.black);
      
      button = new JButton("Start Game");
      button.setFocusable(false);
      button.setFont(new Font("Comic Sans", Font.PLAIN, 30));
      button.setBackground(Color.white);
      button.setForeground(Color.black);
      button.addActionListener(this);
      
      panel.add(label);
      panel.add(button);
      
      
      this.add(panel, BorderLayout.CENTER);
      this.add(panel2, BorderLayout.EAST);
      this.add(panel3, BorderLayout.WEST);
      this.setLocationRelativeTo(null);
      this.setVisible(true);
      
      
   }
   public void actionPerformed(ActionEvent e){
      
      if(e.getSource()==button){
         new GameFrame();
         
      
      }
      
   }
   // public void compareScore(){
//       if(gamePanel.appleEaten > highScore){
//          highScore = gamePanel.appleEaten;
//       }
//       
//    }
   public static void main(String[] args){
      new mainFrame();
   }
   
}
      