import java.awt.event.*;
import java.awt.*;
import javax.swing.*;

public class myFrame extends JFrame implements ActionListener {
   
    myPanel panel;
    JButton button;
    JLabel label;

    myFrame() {
        label = new JLabel("Color Game");
        label.setFont(new Font("Comic Sans MS", Font.BOLD, 50));
        label.setForeground(Color.BLACK);
        label.setHorizontalAlignment(JLabel.CENTER);
        
        button = new JButton("Start");
        button.setBackground(new Color(100, 100, 255)); // Custom background color
        button.setForeground(Color.WHITE); // Text color
        button.setFont(new Font("Comic Sans MS", Font.BOLD, 20)); // Font style
        button.setBorder(BorderFactory.createLineBorder(Color.WHITE, 2)); // Custom border
        button.addActionListener(this);
        
        panel = new myPanel();
        panel.setPreferredSize(new Dimension(800, 600)); // Set the preferred size of the game panel

        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setExtendedState(JFrame.MAXIMIZED_BOTH); // Set the frame to full-screen mode
        this.setLayout(new GridBagLayout()); // Use GridBagLayout to center components

        GridBagConstraints gbc = new GridBagConstraints();
        gbc.gridx = 0;
        gbc.gridy = 0;
        gbc.insets = new Insets(20, 20, 20, 20);
        gbc.anchor = GridBagConstraints.CENTER;
        gbc.fill = GridBagConstraints.HORIZONTAL;

        this.add(label, gbc);

        gbc.gridy++;
        this.add(button, gbc);

        this.setVisible(true);
    }

    public void actionPerformed(ActionEvent e) {
        if (e.getSource() == button) {
            this.getContentPane().removeAll();
            this.add(panel, new GridBagConstraints());
            this.revalidate();
            this.repaint();
        }
    }
    }
