import javax.swing.*;
import java.awt.event.*;
import java.awt.*;
import java.util.HashMap;
import java.util.Map;
import java.util.Random;
import javax.swing.border.Border;
import javax.swing.border.BevelBorder;
import java.io.File;
import java.io.IOException;
import javax.sound.sampled.AudioInputStream;
import javax.sound.sampled.AudioSystem;
import javax.sound.sampled.Clip;


public class myPanel extends JPanel implements ActionListener {
    JTextField textField2;
    JPanel ColorButtons;
    JPanel revealedColor;
    JPanel chosenColor;
    Map<JButton, Integer> buttonClickCounts;
    Map<JPanel, Color> chosenColorMap;
    Map<JPanel, JTextField> colorBetMap;
    String[] colorForButtons = {"Red", "Blue", "Yellow", "Green", "Orange", "White"};
    Color[] color;
    JTextField textField;
    JLabel label1;
    JLabel label2;
    JLabel coinLabel;
    JLabel coin;
    JLabel scoreLabel;
    JLabel totalWinsLabel;
    JLabel totalLossesLabel;
    JButton roll;
    int clickedCount = 0;
    Color addColor;
    JPanel revealedColor1;
    JPanel revealedColor2;
    JPanel revealedColor3;
    Timer timer;
    int delay = 100;
    int count1;
    int count2;
    int count3;
    int maxCount = 24;
    Random random = new Random();
    JPanel pickedPanel;
    String inputBet;
    String pCoin;
    int intBet;
    int intCoinValue;
    String[] trying = new String[3];
    JPanel newPanel;
    String addText;
    Boolean win;
    int intCoin = 100; // initial coins
    JLabel score;
    int scores = 0;  // Initialize scores to 0
    String str = String.valueOf(scores);
    int totalLose;
    int totalWin; 
    int totalWins = 0;
    int totalLosses = 0; 

    // File paths for sound effects
    String winSoundPath = "Win Sound Effect.wav";
    String loseSoundPath = "Lose Sound Effect.wav";

    

    Border border = BorderFactory.createSoftBevelBorder(
            BevelBorder.RAISED,
            Color.WHITE,
            Color.GRAY,
            Color.DARK_GRAY,
            Color.BLACK
    );
    Border border2 = BorderFactory.createLineBorder(Color.white, 2);
    Border border3 = BorderFactory.createLineBorder(Color.black, 2);

    myPanel() {
        setPreferredSize(new Dimension(800, 600)); // Set the preferred size of the panel
        setLayout(new GridBagLayout());
        GridBagConstraints gbc = new GridBagConstraints();
        gbc.insets = new Insets(10, 10, 10, 10);
        gbc.fill = GridBagConstraints.BOTH;

        chosenColorMap = new HashMap<>();
        colorBetMap = new HashMap<>();  // Initialize the map

        pickedPanel = new JPanel();
        pickedPanel.setLayout(new GridLayout(1, 3));

        setBackground(new Color(50, 50, 50));

        textField2 = new JTextField();
        textField2.setEditable(false);
        textField2.setBorder(border2);
        textField2.setFont(new Font("Comic Sans", Font.PLAIN, 15));
        textField2.setHorizontalAlignment(JTextField.CENTER);
        textField2.setPreferredSize(new Dimension(200, 30));  // Set preferred size

        ColorButtons = new JPanel();
        ColorButtons.setLayout(new GridLayout(3, 2));
        ColorButtons.setBorder(border);
        ColorButtons.setBackground(new Color(50, 50, 50));

        roll = new JButton("Roll");
        roll.setBackground(new Color(100, 100, 255));
        roll.setForeground(Color.WHITE);
        roll.setFont(new Font("Comic Sans", Font.BOLD, 20));
        roll.addActionListener(this);

        label1 = new JLabel("Pick a Color:");
        label1.setFont(new Font("Comic Sans", Font.PLAIN, 20));
        label1.setForeground(Color.WHITE);

        buttonClickCounts = new HashMap<>();

        chosenColor = new JPanel();
        chosenColor.setBorder(border);
        chosenColor.setLayout(new GridLayout(1, 3));
        chosenColor.setBackground(new Color(50, 50, 50));

        label2 = new JLabel("Revealed Color:");
        label2.setFont(new Font("Comic Sans", Font.PLAIN, 20));
        label2.setForeground(Color.WHITE);

        revealedColor = new JPanel();
        revealedColor.setLayout(new GridLayout(1, 3));
        revealedColor.setBorder(border);
        revealedColor.setBackground(new Color(50, 50, 50));

        coinLabel = new JLabel("Coins: ");
        coinLabel.setFont(new Font("Comic Sans", Font.PLAIN, 20));
        coinLabel.setForeground(Color.WHITE);

        coin = new JLabel("100");
        coin.setFont(new Font("Comic Sans", Font.PLAIN, 20));
        coin.setForeground(Color.WHITE);

        scoreLabel = new JLabel("Score: ");
        scoreLabel.setFont(new Font("Comic Sans", Font.PLAIN, 20));
        scoreLabel.setForeground(Color.WHITE);

        score = new JLabel(str);
        score.setFont(new Font("Comic Sans", Font.PLAIN, 20));
        score.setForeground(Color.WHITE);

        totalWinsLabel = new JLabel("You Win: 0");
        totalWinsLabel.setFont(new Font("Comic Sans", Font.PLAIN, 20));
        totalWinsLabel.setForeground(Color.WHITE);

        totalLossesLabel = new JLabel("You Lose: 0");
        totalLossesLabel.setFont(new Font("Comic Sans", Font.PLAIN, 20));
        totalLossesLabel.setForeground(Color.WHITE);

        color = new Color[colorForButtons.length];

        for (int i = 0; i < colorForButtons.length; i++) {
            switch (colorForButtons[i]) {
                case "Red":
                    color[i] = Color.RED;
                    break;
                case "Blue":
                    color[i] = Color.BLUE;
                    break;
                case "Yellow":
                    color[i] = Color.YELLOW;
                    break;
                case "Green":
                    color[i] = Color.GREEN;
                    break;
                case "Orange":
                    color[i] = Color.ORANGE;
                    break;
                case "White":
                    color[i] = Color.WHITE;
                    break;
            }
        }

        for (int i = 0; i < 6; i++) {
            JButton button = new JButton();
            button.setText(colorForButtons[i]);
            button.setBackground(color[i]);
            button.setFocusable(false);
            button.setFont(new Font("Comic Sans", Font.PLAIN, 20));
            button.setBorder(border3);
            button.addActionListener(this);
            button.addMouseListener(new clickListener());
            buttonClickCounts.put(button, 0);
            ColorButtons.add(button);
        }

        gbc.gridx = 0;
        gbc.gridy = 0;
        gbc.gridwidth = 2;
        gbc.weightx = 1;
        gbc.weighty = 0;
        add(textField2, gbc);

        gbc.gridy++;
        gbc.gridwidth = 1;
        gbc.weighty = 0.5;
        add(label1, gbc);

        gbc.gridx = 1;
        add(label2, gbc);

        gbc.gridx = 0;
        gbc.gridy++;
        gbc.weighty = 1;
        add(ColorButtons, gbc);

        gbc.gridx = 1;
        add(revealedColor, gbc);

        gbc.gridx = 0;
        gbc.gridy++;
        add(pickedPanel, gbc);

        gbc.gridx = 1;
        add(chosenColor, gbc);

        gbc.gridx = 0;
        gbc.gridy++;
        gbc.gridwidth = 1;
        add(coinLabel, gbc);

        gbc.gridx = 1;
        gbc.gridwidth = 1;
        add(coin, gbc);

        gbc.gridx = 0;
        gbc.gridy++;
        gbc.gridwidth = 1;
        add(scoreLabel, gbc);

        gbc.gridx = 1;
        gbc.gridwidth = 1;
        add(score, gbc);

        gbc.gridx = 0;
        gbc.gridy++;
        gbc.gridwidth = 1;
        add(totalWinsLabel, gbc);

        gbc.gridx = 1;
        gbc.gridwidth = 1;
        add(totalLossesLabel, gbc);

        gbc.gridx = 0;
        gbc.gridy++;
        gbc.gridwidth = 2;
        add(roll, gbc);
    }

    public void actionPerformed(ActionEvent e) {
        if (e.getSource() instanceof JButton) {
            JButton clickedButton = (JButton) e.getSource();

            if (clickedButton != roll) {
                clickedCount++;
                addColor = clickedButton.getBackground();
                addText = clickedButton.getText();
                newPanel = new JPanel();
                newPanel.setBackground(addColor);
                newPanel.addMouseListener(new clickListener());

                // Add bet field for each chosen color
                JTextField betField = new JTextField();
                betField.setColumns(5);
                betField.setPreferredSize(new Dimension(50, 30));  // Set preferred size for bet fields
                JPanel colorWithBet = new JPanel();
                colorWithBet.setLayout(new BorderLayout());
                colorWithBet.add(newPanel, BorderLayout.CENTER);
                colorWithBet.add(betField, BorderLayout.SOUTH);

                chosenColor.add(colorWithBet);
                chosenColor.revalidate();
                chosenColor.repaint();

                chosenColorMap.put(newPanel, addColor);
                colorBetMap.put(newPanel, betField);  // Add to map

                updatePickedPanel();

                if (clickedCount == 3) {
                    disableAllButtons();
                }
                
            }
            if (clickedButton == roll){
                totalWins = 0;
                totalLosses = 0;
               totalWinsLabel.setText("You Win: 0");
                totalLossesLabel.setText("You Lose: 0");
               
            }
        }
        if (e.getSource() == roll) {
            win = false;
            pCoin = coin.getText();
            intCoinValue = Integer.parseInt(pCoin);
           

            if (chosenColor.getComponentCount() < 1) {
                textField2.setText("Please pick a color first");
                textField2.revalidate();
                textField2.repaint();
            } else {
                int totalBet = 0;
                for (JTextField betField : colorBetMap.values()) {
                    if (betField.getText().isEmpty()) {
                        textField2.setText("Please enter bet for each color!");
                        textField2.revalidate();
                        textField2.repaint();
                        return;
                    }

                    try {
                        inputBet = betField.getText();
                        intBet = Integer.parseInt(inputBet);
                        totalBet += intBet;

                        if (totalBet > intCoinValue) {
                            textField2.setText("You don't have enough Coins");
                            textField2.revalidate();
                            textField2.repaint();
                            return;
                        }
                    } catch (NumberFormatException nve) {
                        textField2.setText("Invalid input");
                        textField2.revalidate();
                        textField2.repaint();
                        return;
                    }
                }

                roll.setEnabled(true);
                textField2.setText("Good Luck!");
                textField2.revalidate();
                textField2.repaint();

                revealedColor.removeAll();
                revealedColor1 = new JPanel();
                revealedColor2 = new JPanel();
                revealedColor3 = new JPanel();

                revealedColor.add(revealedColor1);
                revealedColor.add(revealedColor2);
                revealedColor.add(revealedColor3);

                revealedColor.revalidate();
                revealedColor.repaint();

                roll.setEnabled(false);

                count1 = 0;
                count2 = 0;
                count3 = 0;

                timer = new Timer(delay, new ActionListener() {
                    public void actionPerformed(ActionEvent evt) {
                        String colorName = colorForButtons[random.nextInt(colorForButtons.length)];
                        Color randomColor = getColorByName(colorName);

                        if (count1 < maxCount) {
                            count1++;
                            revealedColor1.setBackground(randomColor);
                        } else if (count2 < maxCount) {
                            count2++;
                            revealedColor2.setBackground(randomColor);
                        } else if (count3 < maxCount) {
                            count3++;
                            revealedColor3.setBackground(randomColor);
                        } else {
                            timer.stop();
                            roll.setEnabled(true);
                            enableAllButtons();
                            clickedCount = 0;
                            checkWinorLose();
                            GameOver();
                        }
                    }
                });
                timer.start();
            }
        }
    }

    private Color getColorByName(String colorName) {
        switch (colorName) {
            case "Red":
                return Color.RED;
            case "Blue":
                return Color.BLUE;
            case "Yellow":
                return Color.YELLOW;
            case "Green":
                return Color.GREEN;
            case "Orange":
                return Color.ORANGE;
            case "White":
                return Color.WHITE;
            default:
                return Color.BLACK;
        }
    }

    public void disableAllButtons() {
        for (JButton button : buttonClickCounts.keySet()) {
            button.setEnabled(false);
        }
    }

    public void enableAllButtons() {
        for (JButton button : buttonClickCounts.keySet()) {
            button.setEnabled(true);
        }
    }

    private class clickListener extends MouseAdapter {
        public void mouseClicked(MouseEvent e) {
            if (e.getSource() instanceof JPanel) {
                JPanel clickedPanel = (JPanel) e.getSource();
                chosenColor.remove(clickedPanel.getParent());
                chosenColorMap.remove(clickedPanel);
                colorBetMap.remove(clickedPanel);
                chosenColor.revalidate();
                chosenColor.repaint();
                clickedCount--;
                enableAllButtons();
                updatePickedPanel();
            }
        }
    }

 public void checkWinorLose() {
    Color[] revealedColors = new Color[3];
    revealedColors[0] = revealedColor1.getBackground();
    revealedColors[1] = revealedColor2.getBackground();
    revealedColors[2] = revealedColor3.getBackground();

    totalWin = 0;
    int currentLoss = 0; // Initialize currentLoss for this round

    for (Map.Entry<JPanel, Color> entry : chosenColorMap.entrySet()) {
        JPanel panel = entry.getKey();
        Color chosenColor = entry.getValue();
        JTextField betField = colorBetMap.get(panel);
        int betAmount = Integer.parseInt(betField.getText());

        boolean isColorMatched = false;
        for (Color revealedColor : revealedColors) {
            if (chosenColor.equals(revealedColor)) {
                totalWin += betAmount;
                isColorMatched = true;
            }
        }

        if (!isColorMatched) {
            currentLoss += betAmount; // Add to current loss
            intCoinValue -= betAmount;
            
        }
    }

    if (totalWin > 0) {
        intCoinValue += totalWin;
        scores += totalWin;
        totalWins += totalWin;
        totalLosses += currentLoss;  
    }else {
    totalWins += totalWin;
    totalLose += currentLoss;
    totalLosses += totalLose;
    }  
    if (totalWin > currentLoss){
      showWinMessage();
    }else{
         showLoseMessage();
    }

    coin.setText(String.valueOf(intCoinValue));
    totalWinsLabel.setText("You Win: " + totalWins);
    totalLossesLabel.setText("You Lose: " + totalLosses);

    chosenColorMap.clear();
    colorBetMap.clear();
    chosenColor.removeAll();
    chosenColor.revalidate();
    chosenColor.repaint();
    enableAllButtons();
    clickedCount = 0;

    
      }
      
        
      
      public void showWinMessage() {
      int winner = totalWins - totalLosses;
          playSound(winSoundPath);
          textField2.setText("You Win :)");
          score.setText(String.valueOf(scores));
          JOptionPane.showMessageDialog(this, "You Win! Total Win: " + winner, "Result", JOptionPane.INFORMATION_MESSAGE);
      }
      
      public void showLoseMessage() {
      int loser = totalLosses - totalWins;
          playSound(loseSoundPath);
          textField2.setText("You Lose :(");
          score.setText(String.valueOf(scores));
          JOptionPane.showMessageDialog(this, "You Lose. Total Loss: " + loser, "Result", JOptionPane.INFORMATION_MESSAGE);
          
      }

      private void playSound(String soundFilePath) {
              try {
                  File soundFile = new File(soundFilePath);
                  AudioInputStream audioIn = AudioSystem.getAudioInputStream(soundFile);
                  Clip clip = AudioSystem.getClip();
                  clip.open(audioIn);
                  clip.start();
              } catch (Exception ex) {
                  ex.printStackTrace();
              }
    }


    public void GameOver() {
        if (intCoinValue == 0) {
            JOptionPane.showMessageDialog(null, "Your Score : " + String.valueOf(scores), "Game Over", JOptionPane.INFORMATION_MESSAGE);

            int response = JOptionPane.showConfirmDialog(null, "Try again?", "Game Over", JOptionPane.YES_NO_OPTION);

            if (response == JOptionPane.YES_OPTION) {
                intCoinValue = 100;
                coin.setText("100");
                textField2.setText("You have received 100 coins");
            } else {
                System.exit(0);
            }
        }
    }

    private void updatePickedPanel() {
        pickedPanel.removeAll();

        for (Map.Entry<JPanel, Color> entry : chosenColorMap.entrySet()) {
            JPanel colorPanel = new JPanel();
            colorPanel.setBackground(entry.getValue());
            pickedPanel.add(colorPanel);
        }

        pickedPanel.revalidate();
        pickedPanel.repaint();
    }
}
