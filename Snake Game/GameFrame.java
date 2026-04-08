import javax.swing.*;
import java.awt.event.*;
public class GameFrame extends JFrame{
      
      GamePanel panel = new GamePanel();
      
   GameFrame(){
      
      
      
      
      this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
      this.add(panel);
      this.pack();
      this.setDefaultLookAndFeelDecorated(false);
      this.setResizable(false);
      this.setLocationRelativeTo(null);
      this.setVisible(true);
      
      Timer timer = new Timer(100, new ActionListener() {
         public void actionPerformed(ActionEvent e){
            if(panel.SWITCH){
               panel.SWITCH = false;
               dispose();
            }
           
         }
      });
      timer.start();
      
   }
   
   
   edddd)d
  
      
}